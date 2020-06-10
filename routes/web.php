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

Auth::routes();
Route::get('/','HomeController')->name('home');


//profile

Route::get('/profile/{user}','ProfileController@show')->name('profile.show');
Route::get('/profile/{id}/edit','ProfileController@edit')->name('profile.edit');
Route::patch('/profile/{id}','ProfileController@update')->name('profile.update');
//post
Route::get('/post/create','PostController@create')->name('post.create');
Route::get('/post/{p}','PostController@show')->name('post.show');
Route::post('/post','PostController@store')->name('post.store');


//follow
Route::get('/follow/{id}','FollowController@store')
    ->middleware('auth')
    ->name('follow.store');
Route::get('/following/{id}','FollowController@followings')->name('follow.followings');
Route::get('/followers/{id}','FollowController@followers')->name('follow.followers');


//comments


Route::get('comment/{post_id}', 'CommentController@index')->name('post.comments');
Route::post('comment/{post_id}', 'CommentController@store')->name('post.comment.store');
Route::delete('comment/{post_id}', 'CommentController@destroy')->name('post.comment.delete');