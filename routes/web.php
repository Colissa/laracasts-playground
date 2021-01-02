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

Route::get('/about', function () {
    return view('about', [
        'articles' => \App\Models\Article::latest()->get()
    ]);
});

//******** Original Homework Solution (WRONG) ********//

// Route::get('/articles', function () {
//     return view('articles', [
//         'articles' => \App\Models\Article::latest()->get()
//     ]);
// });


//******** Correct Homework Solution ********//
Route::get('/articles', 'App\Http\Controllers\ArticlesController@index');


Route::get('/articles/{article}', 'App\Http\Controllers\ArticlesController@show');
