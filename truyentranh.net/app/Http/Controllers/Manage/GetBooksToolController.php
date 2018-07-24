<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\ManageController;
use App\Models\BooksLeech;
use App\Models\ChaptersLeech;
use App\Traits\ToolLeechTrait;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Manage\SourceBooks\BooksDataFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class GetBooksToolController extends ManageController
{
    use ToolLeechTrait;
    protected $book_data;
    protected $book_leech;
    protected $chapters_leech;
    protected $fileds_search_chapters = [];

    public function __construct(BooksDataFactory $book_data, BooksLeech $books_leech, ChaptersLeech $chapters_leech) {
        $this->book_data  = $book_data;
        $this->book_leech = $books_leech;
        foreach ($this->book_leech->getFillable() as $filed) {
            $this->fields_search[] = $this->search_prefix . $filed;
        }
        $this->chapters_leech = $chapters_leech;
        foreach ($this->chapters_leech->getFillable() as $filed) {
            $this->fileds_search_chapters[] = $this->search_prefix . $filed;
        }
    }

    protected static function validator(array $data)
    {
        return Validator::make($data, [
            'leech_source_id'  => 'required|integer|min:1|max:5',
            'leech_book_url'   => 'required|url|unique:books',
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
                if (in_array($key, $this->fields_search)) {
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
        $data['books'] = $this->book_leech->get_option_list();
        return view('manage.getbookstool.create', $data);
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
                if (in_array($key, $this->fileds_search_chapters)) {
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

        $source = $this->book_data->getSource($inputs['leech_source_id'], $inputs['leech_book_url']);
        $info_book_leach                    = $source->getInfoBook($source->getDom());
        $info_book_leach['created_by']      = Auth::id();
        $info_book_leach['slug']            = str_slug($info_book_leach['name']);
        $info_book_leach['leech_source_id'] = $inputs['leech_source_id'];
        $info_book_leach['leech_book_url']  = $inputs['leech_book_url'];

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
                $chapters[$key]['leech_source_id']    = $inputs['leech_source_id'];
                $chapters[$key]['leech_chapter_url']  = $key;
                $chapters[$key]['flag_leech_content'] = ChaptersLeech::STATUS_OFF;
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

    public function createLinkAll()
    {
        $book_data      = new BooksDataFactory();
        $book_leech     = new BooksLeech();
        $files = file_get_contents('list_link.txt');
        if ($files == false || empty($files)) {
            //$this->error('Link not found');
            return 'Link not found';
        }
        //$datas = explode(PHP_EOL, $files);
        $datas  = preg_split("/\R/", $files);
        $chucks = array_chunk($datas, 40);
        $total  = count($chucks);
        try {
            DB::beginTransaction();
            $info_book_leach = [];
            do{
                $chucks = array_chunk($datas, 40);
                foreach ($chucks as $items){
                    foreach ($items as $key => $book_link){
                        // Do some things
                        $source     = $book_data->getSource(1, $book_link);
                        $book_leach = $source->getInfoBook($source->getDom());
                        $info_book_leach[$key]['image_link']      = $book_leach['image_link'];
                        $info_book_leach[$key]['name']            = $book_leach['name'];
                        $info_book_leach[$key]['content']         = $book_leach['content'];
                        $info_book_leach[$key]['created_by']      = Auth::id();
                        $info_book_leach[$key]['slug']            = str_slug($book_leach['name']);
                        $info_book_leach[$key]['leech_source_id'] = 1;
                        $info_book_leach[$key]['leech_book_url']  = $book_link;
                        //$this->info('--- No: ' . $key);
                    }
                }
                $total--;
            }while($total > 0);

            $book_leech::insert($info_book_leach);
            DB::commit();

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error([$e->getMessage(), __METHOD__]);
        }

        /*$files_link = fopen("list_link.txt", "w");
        $list_link = [];
        for ($i = 1; $i <= 155; $i++) {
            $list_link[] = 'http://truyentranh.net/danh-sach.tall.html?p=' . $i;
        }
        $data_range = range(1,155);
        //$collection_link = collect($data_range);
        //$midData = $collection_link->chunk(10)->toArray();
        $tags_link = [];
        foreach ($data_range as $range) {
            $link = 'http://truyentranh.net/danh-sach.tall.html?p='.$range;
            $html = $this->getDom($link);
            foreach ($html->find('#loadlist a') as $element) {
                if (in_array($element->href, $tags_link)) {
                    continue;
                }
                $tags_link[] = $element->href;
                $tag_a = $element->href . PHP_EOL;
                fwrite($files_link, $tag_a);
            }

        }
        fclose($files_link);*/
        //return view('manage.getbookstool.input-link');
    }

    public function storelinkall(Request $request)
    {

    }

    public function getFileResults()
    {
        $data       = file_get_contents('list.txt');
        $data       = explode("\n", $data);
        $data_old   = file_get_contents('old-book.txt');
        $data_old   = explode("\n", $data_old);
        $results    = array_diff($data,$data_old);
        $files_link = fopen("list_link.txt", "w");
        foreach ($results as $link){
            fwrite($files_link, $link);
        }
        fclose($files_link);
    }

    public function ajaxShowInfoBook(Request $request)
    {
        if($request->ajax()){
            $book_id = intval($request->book_id);
            $model = $this->book_leech->where('id', $book_id)
                ->orderBy('name', 'desc')
                ->first();
            if (empty($model)) {
                return $this->responseJsonAjax(
                    $this->AJAX_RESULT['FAIL'],
                    'Id ' . $book_id . ' items not found'
                );
            }
            return $this->responseJsonAjax(
                $this->AJAX_RESULT['SUCCESS'],
                'Get id ' . $book_id . ' items success',
                $model
            );
        }

    }
}
