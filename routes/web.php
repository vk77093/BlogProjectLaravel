<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
 Route::auth();
 Route::get('/post/{id}',['as'=>'home.post','uses'=>'AdminPostController@post']);
 Route::get('/logout','Auth\LoginController@logout');

Route::group(['middleware'=>'admin','as'=>'admin.'],function(){
Route::resource('admin/users','AdminUserController');
Route::resource('admin/posts','AdminPostController');
Route::resource('admin/category','AdminCategoryController');
Route::resource('admin/media','AdminMediaController');
Route::resource('admin/comments','PostCommentsController');
Route::resource('admin/comments/replies','PostCommentsRepliesConroller');
Route::get('/home', 'HomeController@index');
Route::get('/admin','AdminUserController@index');
});
Route::group(['middleware'=>'auth'],function(){
  Route::post('comments/reply','PostCommentsRepliesConroller@createReply');
});
