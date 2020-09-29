@extends('commons.layout')

@section('content')
    <div class="container mt-4">
        <div class="mb-5">
        <!-- コントローラー名.アクション名 -->
            <a href="{{ route('posts.create') }}" class="btn btn-primary">
                投稿を新規作成する
            </a>
        </div>

        @foreach ($posts as $post)
            <div class="card mt-4">
                <!-- card header -->
                <div class="card-header">
                    {{ $post->title }}
                </div>
                <!-- card body -->
                <div class="card-body">
                    <p class="card-text">
                        {!! nl2br($post->body) !!}
                    </p>
                    <a href="{{ route('posts.show', ['post' => $post]) }}" class="card-link">投稿詳細</a>
                </div>
                <!-- card footer -->
                <div class="card-footer">
                    <span class="mr-2">
                        投稿日時 {{ $post->created_at->format('Y.M.d') }}
                    </span>

                    @if($post->comments->count())
                        <span class="badge badge-primary">
                            コメント {{ $post->comments->count() }}件
                        </span>
                    @endif
                </div>
            </div>
        @endforeach
        <!-- ページネーションの設定 -->
        <div class="d-flex justify-content-center mt-5 mb-5">
            {{ $posts->links() }}
        </div>
    </div>
@endsection