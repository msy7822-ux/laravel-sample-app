@extends('commons.layout')

@section('content')
    <div class="container mt-4">
        <div class="border p-4">
            <h1 class="h4 mb-4">
                投稿の新規作成
            </h1>

            <form action="/post/store" method="POST">
                @csrf

                <fieldset class="mb-4">
                    <!-- title form -->
                    <div class="form-group">
                        <label for="title">タイトル</label>
                        <input type="text" id="title" name="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" value="{{ old('title') }}" />
                        <!-- エラーメッセージの表示 -->
                        @if($errors->has('title'))
                            <div class="invalid-feedback">
                                {{ $errors->first('title') }}
                            </div>
                        @endif
                    </div>

                    <!-- body form -->
                    <div class="form-group">
                        <label for="body">
                            本文
                        </label>
                        <textarea name="body" id="body" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}">
                            {{ old('body') }}
                        </textarea>
                        <!-- エラーメッセージの表示 -->
                        @if($errors->first('body'))
                            <div class="invalid-feedback">
                                {{ $errors->first('body') }}
                            </div>
                        @endif
                    </div>

                    <!-- form button -->
                    <div class="mt-5">
                        <a href="{{ url('/') }}" class="btn btn-secondary">キャンセル</a>
                        <button type="submit" class="btn btn-primary">投稿する</button>
                    </div>
                </fieldset>
            </form>
        </div>  
    </div>
@endsection