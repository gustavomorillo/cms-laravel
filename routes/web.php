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











// Route::get('/', 'FrontController@index');


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');


Route::get('/post/{id}', ['as'=>'home.post', 'uses'=>'HomeController@post']);

Route::group(['middleware'=>'admin'], function(){

Route::get('/admin', 'AdminController@index');

Route::resource('admin/users', 'AdminUsersController');

Route::resource('admin/posts', 'AdminPostsController');

Route::resource('admin/categories', 'AdminCategoriesController');

Route::resource('admin/photos', 'AdminPhotosController');

Route::resource('admin/comments', 'PostCommentsController');

Route::resource('admin/comment/replies', 'CommentRepliesController');

Route::get('admin/photo_delete/{photo_id}', 'AdminPhotosController@destroy');

});

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');


Route::group(['middleware'=>'auth'], function(){

    Route::post('comment/reply', 'CommentRepliesController@createReply');

});
