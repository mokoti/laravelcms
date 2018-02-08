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

// Route::get('/', function () {
//       return view('welcome');
//   });
//

// モデルとの結合
Route::model('post', 'Post');
Route::model('comment', 'Comment');
Route::model('user', 'User');

// ユーザーのルート設定
Route::get('post/{post}/show', ['as' => 'post.show', 'uses' => 'PostController@showPost']);
Route::get('post/{post}/comment', ['as' => 'comment.new', 'uses' => 'CommentController@newComment']);

// アドミンのルート設定
Route::group(['prefix' => 'admin', 'before' => 'auth'], function(){
    // ルートの取得
    Route::get('dash-board', function(){
        $layout = View::make('master');
        $layout->title = '管理パネル';
        $layout->main = View::make('dash')->with('content', '管理パネルへようこそ！');
        return $layout;
    });

    Route::get('/post/list', ['as' => 'post.list', 'uses' => 'PostController@listPost']);
    Route::get('/post/new', ['as' => 'post.new', 'uses' => 'PostController@newPost']);

    Route::get('/post/{post}/edit', ['as' => 'post.edit', 'uses' => 'PostController@editPost']);
    Route::get('/post/{post}/delete', ['as' => 'post.delete', 'uses' => 'PostController@deletePost']);

    Route::get('/comment/list', ['as' => 'comment.list', 'uses' => 'CommentController@listComment']);
    Route::get('/comment/{comment}/show', ['as' => 'comment.show', 'uses' => 'CommentController@showComment']);
    Route::get('/comment/{comment}/delete', ['as' => 'comment.delete', 'uses' => 'CommentController@deleteComment']);

    Route::post('/post/save', ['as' => 'post.save', 'uses' => 'PostController@savePost']);
    Route::post('/post/{post}/update', ['as' => 'comment.update', 'uses' => 'CommentController@updateComment']);
});

// ホームのルート設定
Route::get('/', 'BlogController@getIndex');

// ビューコンポーザー
View::composer('sidebar', function($view){
    $view->recentPosts = Post::orderBy('id', 'desc')->take(5)->get();
});
