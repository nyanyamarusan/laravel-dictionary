@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/create.css') }}">
@endsection

@section('content')
<div class="content">
    <div class="content__header">
        <h1>新規登録</h1>
        <a href="/"><button class="jump-button">検索・登録一覧へ</button></a>
    </div>

    @if (session('message'))
    <p class="message__success">{{ session('message') }}</p>
    @endif

    <div class="create-form">
        <form action="/store" method="post">
            @csrf
            <input type="text" name="keyword" value="{{ old('keyword') }}" placeholder="キーワード">
            @error('keyword')
            <p class="error-message">{{ $message }}</p>
            @enderror

            <textarea name="description" placeholder="説明">{{ old('description') }}</textarea>
            @error('description')
            <p class="error-message">{{ $message }}</p>
            @enderror

            <div class="create-button">
                <button class="create-button__submit" type="submit">登録</button>
            </div>
        </form>
    </div>
</div>
@endsection