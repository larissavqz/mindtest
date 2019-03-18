<?php
use App\Posts;
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

/*Route::get('/', function () {
    return view('home');
});*/

Route::post('/new-post', 'PostController@create');
Route::get('/', 'PostController@index');
Route::get('/view-post/{post_id}', 'PostController@view');
Route::get('/edit-post/{post_id}', 'PostController@edit');
Route::post('/edit-post/{post_id}', 'PostController@update');
Route::get('/delete-post/{post_id}', 'PostController@destroy');


Route::get('/new-post', function () {
    return view('post.new-post');
});
