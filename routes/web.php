<?php

use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\InlineHTML;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome', function () {
    return 'Hello World!';
});

Route::get('/json', function () {
    return ['foo' => 'bar'];
});

Route::get('/test', function() {
    return view('test');
});

Route::get('/', function() {
    $name = request('name');
    return $name;
});

Route::get('/', function() {
    return view('test', [
        'name' => request('name')
    ]);
});

Route::get('/posts/{post}', function($post) {

    $posts = [
        'my-first-post' => 'Hello! This is my first post!',
        'my-second-post' => 'Hello! This is my second post!'
    ];

    if (! array_key_exists($post, $posts)) {
        abort(404, 'Sorry, that post was not found.');
    }

    return view('post', [
        'post' => $posts[$post]
    ]);
});

