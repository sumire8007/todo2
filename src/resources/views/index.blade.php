@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<!-- 新規作成フォームの作成 -->
<form action="/todos" method="post">
    @csrf
    <div class="form-create">
        <div class="form-create__logo">
            <h2>新規作成</h2>
        </div>
        <div class="form-create__input">
            <input type="text" name="content">
        </div>
        <div class="form-create__select">
            <select name="category_id">
                <option >カテゴリ</option>
                @foreach($categories as $category)
                <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-create__button">
            <input type="submit" value="作成">
        </div>
    </div>
</form>

<form action="/todos/search" method="get">
    @csrf
    <div class="form-search">
        <div class="form-search__logo">
            <h2>Todo検索</h2>
        </div>
        <div class="form-create__input">
            <input type="text" name="keyword" value="{{old('keyword')}}">
        </div>
        <div class="form-create__select">
            <select name="category_id">
                <option >カテゴリ</option>
                @foreach($categories as $category)
                <option value="{{$category['id']}}">{{$category['name']}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-create__button">
            <input type="submit" value="検索">
        </div>
    </div>
</form>


<!-- Todoの一覧 -->
<table class="todo-table">
<tr>
    <th>Todo</th>
    <th>カテゴリ</th>
</tr>
@foreach ($todos as $todo)
<tr>
    <div class="todo-list">
        <form action="/todos/update" method="post">
        @method('PATCH')
        @csrf
        <div class="todo-list__update">
            <td>
                <input type="text" name="content" value="{{ $todo['content'] }}">
                <input type="hidden" name="id" value="{{$todo['id']}}">
            </td>
            <td>
                <p>{{ $todo['category']['name']}}</p>
            </td>
            <td>
                <input type="submit" value="更新">
            </td>
        </div>
        </form>

        <form action="/todos/delete" method="post">
        @method('DELETE')
        @csrf
        <div class="todo-list__delete">
            <td>
                <input type="submit" value="削除">
                <input type="hidden" name="id" value="{{$todo['id']}}">
            </td>
        </form>
        </div>
    </div>
</tr>
@endforeach
</table>
@endsection