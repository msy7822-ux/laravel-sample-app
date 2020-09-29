@extends('commons.layout')

@section('content')
    <div class="container mt-4">
        <div class="border p-4">
            <!-- 編集ボタン -->
            <a href="/post/edit/{{ $post->id }}" class="btn btn-primary">編集する</a>
            <!-- 削除ボタン -->
            <form action="{{ route('posts.destroy', ['post' => $post]) }}" method="post" style="display: inline-block;">
                @csrf
                @method('delete')
                <button class="btn btn-danger">削除する</button>
            </form>
            <!-- 投稿のタイトル -->
            <h1 class="h5 mb-4 mt-4">
                {{ $post->title }}
            </h1>
            <p class="mb-5">
                {!! nl2br($post->body) !!}
            </p>
            <section>
                <h2 class="h5 mb-4">
                    コメント
                </h2>

                <!-- ここにコメントを作成するフォームを作る -->
                <form action="{{ route('comments.store') }}" method="post" class="mb-4">
                    @csrf

                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <!-- フォーム部品（入力） -->
                    <div class="form-group">
                        <label for="body">本文</label>
                        <textarea name="body" id="bosy" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" rows="4">
                            {{ old('body') }}
                        </textarea>
                        @if($errors->has('body'))
                            <div class="invalid-feedback">
                                {{ $errors->first('body') }}
                            </div>
                        @endif
                    </div>
                    <!-- フォーム部品（ボタン） -->
                    <div class="mt-4">
                        <button class="btn btn-primary" type="submit">
                            コメント
                        </button>
                    </div>
                </form>

                @forelse($post->comments as $comment)
                    <div class="border-top p-4">
                        <time class="text-secondary">
                            {{ $comment->created_at->format('Y.m.d H:i') }}
                        </time>
                        <p class="mt-2">
                            {!! nl2br($comment->body) !!}
                        </p>
                    </div>
                @empty
                    <p>コメントはまだありません</p>
                @endforelse
            </section>

            <a href="/" class="card-link">投稿一覧ページへ戻る</a>
        </div>
    </div>
@endsection