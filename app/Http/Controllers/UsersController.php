<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        return Users::all();
    }

    public function show(Users $article)
    {
        return $article;
    }

    public function store(Request $request)
    {
        $article = Users::create($request->all());

        return response()->json($article, 201);
    }

    public function update(Request $request, Users $article)
    {
        $article->update($request->all());

        return response()->json($article, 200);
    }

    public function delete(Users $article)
    {
        $article->delete();

        return response()->json(null, 204);
    }
}
