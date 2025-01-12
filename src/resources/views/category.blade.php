@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<!-- 新規作成フォームの作成 -->
<form action="/categories" method="post">
    @csrf
    <div class="form-create">
        <div class="form-create__input">
            <input type="text" name="name" value="{{ old('name')}}">
        </div>
        <div class="form-create__button">
            <button type="submit">作成</button>
        </div>
    </div>
</form>


<!-- Todoの一覧 -->
<table class="todo-table">
<tr>
    <th>category</th>
</tr>
@foreach($categories as $category)
<tr>
    <div class="category-list">
        <form action="/categories/update" method="post">
        @method('PATCH')
        @csrf
        <div class="category-list__update">
            <td>
                <input type="text" name="name" value="{{ $category['name']}} ">
                <input type="hidden" name="id" value="{{ $category['id']}} ">
            </td>
            <td>
                <button type="submit">更新</button>
            </td>
        </div>
        </form>

        <form action="categories/delete" method="post">
        @method('DELETE')
        @csrf
        <div class="todo-list__delete">
            <td>
                <input type="hidden" name="id" value="{{ $category['id'] }}">
                <button type="submit">削除</button>
            </td>
        </div>
        </form>
    </div>
</tr>
@endforeach
</table>
@endsection