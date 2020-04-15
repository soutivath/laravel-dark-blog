<?php

use Illuminate\Support\Facades\Route;

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




//Login user Route

    Route::post('/post/comment/{post_id}','CommentController@store');
    Route::get('/account/show','mainController@showAccount');
    Route::get('/change','mainController@password_change');
    Route::post('/change/password','mainController@changePassword');
    Route::post('/contact','mainController@contactSend');
    Route::get('/view/comment/{comment_id}','mainController@editComment');
    Route::Delete('/view/comment/{comment_id}','mainController@deleteComment');
    Route::put('/view/comment/{comment_id}','mainController@updateComment');
    Route::get('/view/comment/reply/{comment_id}','mainController@showReply');
    Route::get('/view/comment/reply/edit/{reply_id}','mainController@editReply');
    Route::put('/view/comment/reply/edit/{reply_id}','mainController@updateReply');
    Route::delete('/view/comment/reply/destroy/{reply_id}','mainController@destroyReply');
    Route::get('/reply','mainController@viewReply');
    Route::post('view/comment/reply/{comment_id}','mainController@storeReply');
   

//Admin route
Route::group(['prefix'=>'admin'],function()
{
    Route::delete('/post/comment/{comment_id}','CommentController@destroy')->name('comment.delete'); //delete comment
    Route::get('/post/comment/{post_id}','CommentController@index')->name('post.comment'); //show all comment belong to post to delete
    Route::resource('/type','TypeController',['except'=>['create','show']]); //
    Route::resource('/post','PostController');
    Route::get('/','PostController@main');
});
       
//for all user route
Route::get('/view/{post_id}','mainController@showPost')->name('view');
Route::get('/about','mainController@about');
Route::get('/contact','mainController@contact');
Auth::routes();
Route::get('/','mainController@index');
Route::get('/category/{type_id}','mainController@showCategory');
//------------------------------------------









