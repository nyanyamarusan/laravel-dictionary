@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="content">
    <div class="content__header">
        <h1>検索・登録一覧</h1>
        <a href="/create"><button class="jump-button">新規登録へ</button></a>
    </div>
    <form action="/" method="get" class="search-form">
        @csrf
        <div class="search-form__item">
            <input class="search-form__item-input" type="text" name="search" value="{{ request('search') }}" placeholder="キーワードまたは説明を検索">
            <button class="search-button" type="submit">検索</button>
        </div>
    </form>

    <div class="create-list__title">
        <h2>登録一覧</h2>
    </div>

    <div class="create-list">
        <table class="create-list__table">
            <tr>
                <th>登録日</th>
                <th>キーワード</th>
                <th>説明</th>
            </tr>
            @foreach ($words as $word)
            <tr>
                <td class="created-date">{{ $word->created_at->format('Y-m-d') }}</td>
                <td class="create-list__keyword">{{ $word->keyword }}</td>
                <td class="create-list__description">{{ $word->description }}</td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
