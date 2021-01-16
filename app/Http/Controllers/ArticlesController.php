<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\Tag;

class ArticlesController extends Controller
{
    // Render a list of a resource.
    public function index() {
        if (request('tag')) {
            $articles = Tag::where('name', request('tag'))->firstOrFail()->articles;
        } else {
            $articles = Article::latest()->get();
        }

        return view('articles.index', ['articles' => $articles]);

    }

    // Render a single resource.
    public function show(Article $article) {

        return view('articles.show', ['article' => $article]);
    }

    // Show a view to create a new resource.
    public function create() {
        return view('articles.create', [
            'tags' => Tag::all()
        ]);

    }

    // Persist the new resource.
    public function store() {
        $this->validateArticle();

        $article = new Article(request(['title', 'excerpt', 'body']));
        $article->user_id = 1; // Hard coding for now but will learn about auth()->id() soon
        $article->save();


        $article->tags()->attach(request('tags')); // [1,2,3]

        return redirect(route('articles.index'));

    }

    // Show a view to edit an exiting resource.
    public function edit(Article $article) {

        return view('articles.edit', ['article' => $article]);

    }

    // Persist the edited resource.
    public function update(Article $article) {

        $article->update($this->validateArticle());

        return redirect($article->path());

    }

    // Delete the resource.
    public function distroy() {

    }

    protected function validateArticle() {
        return request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'tags' => 'exists:tags,id'
        ]);
    }
}
