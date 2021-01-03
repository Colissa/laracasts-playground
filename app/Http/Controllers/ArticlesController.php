<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    // Render a list of a resource.
    public function index() {
        $articles = Article::latest()->get();

        return view('articles.index', ['articles' => $articles]);

    }

    // Render a single resource.
    public function show($id) {
        $article = Article::find($id);

        return view('articles.show', ['article' => $article]);
    }

    // Show a view to create a new resource.
    public function create() {
        return view('articles.create');

    }

    // Persist the new resource.
    public function store() {

        request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required'
        ]);

        $article = new Article();
        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');
        $article->save();

        return redirect('/articles');

    }

    // Show a view to edit an exiting resource.
    public function edit($id) {
        $article = Article::find($id);

        return view('articles.edit', ['article' => $article]);

    }

    // Persist the edited resource.
    public function update($id) {

        request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required'
        ]);

        $article = Article::find($id);
        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');
        $article->save();

        return redirect('/articles/' . $article->id);

    }

    // Delete the resource.
    public function distroy() {

    }
}
