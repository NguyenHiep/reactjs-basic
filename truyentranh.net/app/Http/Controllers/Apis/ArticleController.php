<?php

namespace App\Http\Controllers\Apis;

use Illuminate\Http\Request;
use App\Article;
use App\Http\Controllers\AppBaseController;

class ArticleController extends AppBaseController
{
    public function index()
    {
        return Article::paginate(15);
    }

    public function show(Article $article)
    {
        return $article;
    }

    public function store(Request $request)
    {
        $article = Article::create($request->all());

        return response()->json($article, 201);
    }

    public function update(Request $request, Article $article)
    {
        $article->update($request->all());

        return response()->json($article, 200);
    }

    public function delete(Article $article)
    {
        $article->delete();

        return response()->json(null, 204);
    }
}
