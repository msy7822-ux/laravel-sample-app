@extends('commons/layout')

@section('content')
    <div class="container mt-4">
        <div class="border p-4">
            <h1 class="h5 mb-4">
                投稿の編集
            </h1>
            <form action="{{ route('posts.update', ['post' => $post ]) }}" method="POST">
                @csrf

                @method('PUT')
                <!-- <input type="hidden" name="_method" value="PUT">このコードが生成される -->
                <fieldset class="mb4">
                    <!-- タイトルフォーム -->
                    <div class="form-group">
                        <label for="title">タイトル</label>
                        <input type="text" name="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" 
                        value="{{ old('title') ? $post->title : '' }}">
                        @if($errors->has('title'))
                            <div class="invalid-feedback">
                                {{ $errors->first('title') }}
                            </div>
                        @endif
                    </div>
                    <!-- 本文フォーム -->
                    <div class="form-group">
                        <label for="body">本文</label>
                        <textarea name="body" id="body" rows="10" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}">
                            {{ old('body') ? $post->body : '' }}
                        </textarea>
                        @if($errors->has('body'))
                            <div class="invalid-feedback">
                                {{ $errors->first('body') }}
                            </div>
                        @endif
                    </div>
                    <!-- フォームボタン -->
                    <div class="mt-5">
                        <button class="btn btn-primary" type="submit">更新する</button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection