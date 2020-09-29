<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    // 投稿一覧ページを表示するアクション
    public function index()
    {
        $posts = Post::with(['comments'])->orderBy('created_at', 'desc')->simplePaginate(5);
        return view('posts.index', ['posts' => $posts]);
    }

    // 投稿作成ページを表示するアクション
    public function create() 
    {
        return view('posts.create');
    }

    // 実際に投稿されたデータを保存するアクション（実はバリデーションを一緒に組めちゃう）
    public function store(Request $request) 
    {
        $params = $request->validate([
            'title' => 'required|max:50',
            'body' => 'required|max:2000',
        ]);

        // データの作成と保存
        Post::create($params);

        return redirect('/');
    }

    public function show($post_id) 
    {
        $post = Post::findOrFail($post_id);
        return view('posts.show', [
            'post' => $post,
        ]);
    }

    public function edit($post_id)
    {
        $post = Post::findOrFail($post_id);
        return view('posts.edit', [
            'post' => $post,
        ]);
    }

    public function update(Request $request, $post_id)
    {
        $params = $request->validate([
            'title' => 'required|max:50',
            'body' => 'required|max:2000',
        ]);
        $post = Post::findOrFail($post_id);
        $post->fill($params)->save();
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function destroy($post_id)
    {
        $post = Post::findOrFail($post_id);
        DB::transaction(function() use ($post){
            $post->comments()->delete();
            $post->delete();
        });

        return redirect()->route('top');
    }
    
}


