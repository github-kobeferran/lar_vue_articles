<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Article;
use Carbon\Carbon;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    
        $articles = Article::all();

        // $articles = $articles->map(function ($article, $key) {
        //     return $article->date_to_string;
        // });

        foreach($articles as $article){
            $article->date_to_string;
        }

        return $articles;

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = new Article;

        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:articles,title|max:100',
            'body' => 'required',
        ]);

        if ($validator->fails()) {
            return response('Bad Request', 400);
        }


        $article->title = $request->input('title');
        $article->body = $request->input('body');

        $article->save();

        return response('Article Created', 201)
            ->header('Content-Type', 'text/application');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return Article::findOrFail($id);
        $article = Article::findOrFail($id);

        $article->date_to_string;

        return $article;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $article = Article::findOrFail($id);

        $oldName = $article->title;

        $request->validate([
            'title' => "unique:articles,title,{$id}|max:100",
        ]);

        $article->title = $request->input('title');
        $article->body = $request->input('body');

        $article->save();

        return response("Article {$oldName} is updated", 200)
            ->header('Content-Type', 'text/application');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);

        $oldName = $article->title;

        $article->delete();

        return response("Article {$oldName} is deleted", 200)
            ->header('Content-Type', 'text/application');
    }
}
