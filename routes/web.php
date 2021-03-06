<?php

use App\Http\Controllers\CommentsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

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

// 投稿一覧ページへのルーティング
Route::get('/', [PostsController::class, 'index']);
Route::resource('comments', CommentsController::class, ['only' => ['store']]);
Route::resource('posts', PostsController::class, ['only' => ['create',  'store', 'show', 'edit', 'update', 'destroy']]);
