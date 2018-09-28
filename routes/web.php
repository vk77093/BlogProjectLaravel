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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/dashbord',function(){
//   return view('/dashbord');
// });
Route::get('/', 'HomeController@index');
Route::get('/attendence',function(){
  return view ('admin.users.attendence');
});
// Route::get('/dashbord','AdminController@index');
 Route::auth();

 Route::get('/post/{id}',['as'=>'home.post','uses'=>'AdminPostController@post']);
 Route::get('/user/post/{id}',['as'=>'user.name','uses'=>'AdminUserController@userView']);
 Route::get('/logout','Auth\LoginController@logout');
Route::get('/dashbord','AdminController@index');
Route::group(['middleware'=>'admin','as'=>'admin.'],function(){

Route::resource('admin/users','AdminUserController');
//Route::get('admin/users','AdminUserController@attend');
Route::resource('admin/posts','AdminPostController');
Route::resource('admin/category','AdminCategoryController');
Route::resource('admin/media','AdminMediaController');
Route::delete('/delete/media','AdminMediaController@deleteMedia');
Route::resource('admin/comments','PostCommentsController');
Route::resource('admin/comments/replies','PostCommentsRepliesConroller');
//Route::get('/home', 'HomeController@index');
 // Route::get('/admin','AdminUserController@dashbord');

});
Route::group(['middleware'=>'auth'],function(){
  Route::post('comments/reply','PostCommentsRepliesConroller@createReply');
});
