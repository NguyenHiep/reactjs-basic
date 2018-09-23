<?php

namespace App\Http\Controllers\Apis;

use App\Repositories\BooksRepository;
use App\Models\Categories;
use App\Http\Controllers\ApiBaseController;
use App\Transformers\Frontend\BooksApiTransformer;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use Spatie\Fractal\Fractal;
use App\Transformers\CustomSerializer;

class BooksController extends ApiBaseController
{

    protected $books;
    protected $categories;
    protected $fractal;
    protected $booksTransformer;

    public function __construct(
        BooksRepository $books,
        Categories $categories,
        Manager $fractal,
        BooksApiTransformer $booksTransformer
    ) {
        $this->books            = $books;
        $this->categories       = $categories;
        $this->fractal          = $fractal;
        $this->fractal->setSerializer(new CustomSerializer());
        $this->booksTransformer = $booksTransformer;
    }

  /**
   * @SWG\Get(
   *      path="/getbookupdate",
   *      operationId="getBooksUpdate",
   *      tags={"Books update"},
   *      summary="Get list books update",
   *      description="Returns list of books",
   *      @SWG\Response(
   *          response=200,
   *          description="successful operation"
   *       ),
   *       @SWG\Response(response=400, description="Bad request"),
   *       security={
   *           {"passport": {}}
   *       }
   *     )
   *
   * Returns list of projects
   */
    public function getBooksUpdate()
    {
        $books = $this->books->getBooksUpdate();
        $books = new Collection($books, $this->booksTransformer);
        $books = $this->fractal->parseIncludes('chapters')->createData($books)->toArray();
       /* C2:
       $books = Fractal::create()
            ->collection($books)
            ->transformWith($this->booksTransformer)
            ->parseIncludes(['chapters'])
            ->toArray();*/
        return $this->responseJsonAjax(
            $this->AJAX_RESULT['SUCCESS'],
            'Get data books update success',
            $books
        );
    }

    public function getBooksNew()
    {
        $books = $this->books->getBooksNew();
        $books = new Collection($books, $this->booksTransformer);
        $books = $this->fractal->parseIncludes('chapters')->createData($books)->toArray();
        return $this->responseJsonAjax(
            $this->AJAX_RESULT['SUCCESS'],
            'Get data books new success',
            $books
        );
    }

    public function getBooksHot()
    {
        $books = $this->books->getBooksShowSlider();
        $books = new Collection($books, $this->booksTransformer);
        $books = $this->fractal->parseIncludes('chapters')->createData($books)->toArray();
        return $this->responseJsonAjax(
            $this->AJAX_RESULT['SUCCESS'],
            'Get data books hot success',
            $books
        );
    }

    public function index()
    {
        $books_new = $this->books->getBooksNew();
        $ids = [];
        if (!empty($books_new)) {
            foreach ($books_new as $book) {
                $ids[] = $book->id;
            }
        }
        $data = [
            'categories'   => $this->categories->get_option_list(),
            'books_new'    => $books_new,
            'books_update' => $this->books->getBooksUpdate($ids),
            'show_slider'  => $this->books->getBooksShowSlider(),
        ];
        return $this->responseJsonAjax(
            $this->AJAX_RESULT['SUCCESS'],
            'Get data home success',
            $data
        );
    }
}
