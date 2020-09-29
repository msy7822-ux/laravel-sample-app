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
Route::get('/', [PostsController::class, 'index'])->name('top');
// 投稿作成ページへのルーティング
Route::get('/post/create', [PostsController::class, 'create']);
// 投稿の作成及び保存のルーティング
Route::post('/post/store', [PostsController::class, 'store']);
// 投稿詳細ページへのルーティング
Route::get('/{id}', [PostsController::class, 'show']);
// コメントを追加するためのルーティング
// Route::post('/comment/store', [CommentsController::class, 'store']);
Route::resource('comments', CommentsController::class, ['only' => ['store']]);
// 投稿編集ページを表示させるためのルーティング
Route::get('/post/edit/{id}', [PostsController::class, 'edit']);
// 投稿内容の変更を実行するためのルーティング + 投稿を削除するためのルーティング
// Route::post('/update', [PostsController::class, 'update']);
Route::resource('posts', PostsController::class, ['only' => ['update', 'destroy']]);
