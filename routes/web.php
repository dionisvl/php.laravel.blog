<?php

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

use Illuminate\Support\Facades\Redirect;

Route::get('/', function () {
//    dd(storage_path());
    //return view('welcome');
    return redirect('/news', 302);
});


Route::get('/news', 'TopicController@index');
Route::get('/news/{topic}', 'TopicController@show');
Route::get('/news/{topic}/{post_id}-{post_slug}.html', 'PostController@show');
