<?php

namespace App\Http\Controllers\Apis;

use Illuminate\Http\Request;
use App\Sliders;
use App\Http\Controllers\AppBaseController;

class SlidersController extends AppBaseController
{
    public function index()
    {
        return Sliders::orderBy('id','DESC')->paginate(15);
    }

    public function show(Sliders $article)
    {
        return $article;
    }

    public function store(Request $request)
    {
        $article = Sliders::create($request->all());

        return response()->json($article, 201);
    }

    public function update(Request $request, Sliders $article)
    {
        $article->update($request->all());

        return response()->json($article, 200);
    }

    public function delete(Sliders $article)
    {
        $article->delete();

        return response()->json(null, 204);
    }
}
