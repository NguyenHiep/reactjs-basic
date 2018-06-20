<?php

namespace App\Http\Controllers\Manage;

use App\BooksLeech;
use App\ChaptersLeech;
use App\Http\Controllers\AppBaseController;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Manage\SourceBooks\BooksDataFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class GetBooksToolController extends AppBaseController
{
    protected $book_data;
    protected $book_leech;
    protected $chapters_leech;
    protected $fileds_seach = [];
    protected $fileds_seach_chapters = [];

    public function __construct(BooksDataFactory $book_data, BooksLeech $books_leech, ChaptersLeech $chapters_leech) {
        $this->book_data  = $book_data;
        $this->book_leech = $books_leech;
        foreach ($this->book_leech->getFillable() as $filed) {
            $this->fileds_seach[] = $this->search_prefix . $filed;
        }
        $this->chapters_leech = $chapters_leech;
        foreach ($this->chapters_leech->getFillable() as $filed) {
            $this->fileds_seach_chapters[] = $this->search_prefix . $filed;
        }
    }

    protected static function validator(array $data)
    {
        return Validator::make($data, [
            'url_domain'  => 'required|integer|min:1|max:5',
            'url_book'    => 'required|url',
            'url_chapter' => 'nullable|string|url',
        ]);
    }

    protected static function validator_books_leech(array $data){
        return Validator::make($data, [
            'name'       => 'required|string|max:255|unique:books,name',
            'slug'       => 'string|max:255',
            'image'      => 'nullable|url|string|max:255',
            'content'    => 'required|string',
            'created_by' => 'integer|max:4',
        ]);
    }

    public function index()
    {
        $get_params = request()->query();
        $model      = BooksLeech::query();
        if (!empty($get_params)) {
            $this->setSearch = [];
            foreach ($get_params as $key => $val) {
                if (in_array($key, $this->fileds_seach)) {
                    $key = substr($key, strlen($this->search_prefix));
                    $this->setSearch[$key] = $val;
                }
            }
            $model = BooksLeech::SearchAdvanced($this->setSearch);
        }
        $limit = 15;
        $data['records']      = $model->orderBy('id', 'DESC')->paginate($limit);
        $data['page_total']   = $data['records']->total();
        $offset               = $limit;
        $data['display_to']   = $offset;
        $data['display_from'] = 1;
        if($data['records']->currentPage() > 1)
        {
            $offset = min($limit * $data['records']->currentPage(), $data['page_total']) ;
            $data['display_to']   = min($offset +  $data['records']->perPage(), $data['page_total']);
            $data['display_from'] = min($offset , $data['display_to']);
        }

        return view('manage.getbookstool.index', $data);
    }

    public function create()
    {
        return view('manage.getbookstool.create');
    }

    public function chapters()
    {
        // Get all books
        $data['books'] = BooksLeech::get_option_list(true);
        $get_params = request()->query();
        $model      = ChaptersLeech::query();
        if (!empty($get_params)) {
            $this->setSearch = [];
            foreach ($get_params as $key => $val) {
                if (in_array($key, $this->fileds_seach_chapters)) {
                    $key = substr($key, strlen($this->search_prefix));
                    $this->setSearch[$key] = $val;
                }
            }
            $model = ChaptersLeech::SearchAdvanced($this->setSearch);
        }
        $limit = 30;
        $data['records']      = $model->orderBy('id', 'DESC')->paginate($limit);
        $data['page_total']   = $data['records']->total();
        $offset               = $limit;
        $data['display_to']   = $offset;
        $data['display_from'] = 1;
        if($data['records']->currentPage() > 1)
        {
            $offset = min($limit * $data['records']->currentPage(), $data['page_total']) ;
            $data['display_to']   = min($offset +  $data['records']->perPage(), $data['page_total']);
            $data['display_from'] = min($offset , $data['display_to']);
        }
        return view('manage.getbookstool.chapters', $data);
    }

    public function store(Request $request)
    {
        $inputs = $request->all();
        $validator = self::validator($inputs);
        if ($validator->fails()) {
            // Write log error
            $errors = $validator->errors();
            $list_message = '';
            foreach ($errors->all() as $message) {
                $list_message .= $message . PHP_EOL;
            }
            Log::error($list_message);
            return redirect()->back()->withErrors($validator)->withInput($inputs);
        }

        // Create a user agent so websites don't block you
        $source = $this->book_data->getSource($request->get('url_domain'), $request->get('url_book'));
        $info_book_leach = $source->getInfoBook($source->getDom());
        $info_book_leach['created_by'] = Auth::id();
        $info_book_leach['slug']       = str_slug($info_book_leach['name']);

        // TODO: How to don't working
        $validator_leech = self::validator_books_leech($info_book_leach);
        if ($validator_leech->fails()) {
            // Write log error
            $errors = $validator_leech->errors();
            $list_message = '';
            foreach ($errors->all() as $message) {
                $list_message .= $message . PHP_EOL;
            }
            Log::error($list_message);
            return redirect()->back()->withErrors($validator_leech)->withInput($info_book_leach);
        }

        try {
            DB::beginTransaction();
            $this->book_leech->fill($info_book_leach);
            $this->book_leech->save();
            // Begin insert chapters
            $model_chapter = new ChaptersLeech();
            $list_chapters = $source->getListChapters($source->getDom());
            $chapters = [];
            foreach ($list_chapters as $key => $items) {
                $arr_episodes = explode('/', $key);
                $episodes     = str_replace('-', ' ', end($arr_episodes));
                $chapters[$key]['book_id']     = $this->book_leech->id;
                $chapters[$key]['name']        = $items;
                $chapters[$key]['episodes']    = $episodes;
                $chapters[$key]['slug']        = str_slug($items);
                $chapters[$key]['source_book'] = $key;
                $chapters[$key]['created_by']  = Auth::id();
            }
            $model_chapter::insert($chapters);
            DB::commit();
            return redirect()->route('getbookstool.index')->with([
                'message' => __('system.message.create'),
                'status'  => self::CTRL_MESSAGE_SUCCESS,
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error([$e->getMessage(), __METHOD__]);
        }
        return redirect()->back()->withInput($inputs)->with([
            'message' => __('system.message.errors', ['errors' => 'Save books is failed']),
            'status'  => self::CTRL_MESSAGE_ERROR,
        ]);
    }

}
