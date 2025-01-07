@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<!-- 新規作成フォームの作成 -->
<form action="/todos" method="post">
    @csrf
    <div class="form-create">
        <div class="form-create__input">
            <input type="text" name="content">
        </div>
        <div class="form-create__button">
            <input type="submit" value="作成">
        </div>
    </div>
</form>

<!-- Todoの一覧 -->
<table class="todo-table">
<tr>
    <th>Todo</th>
</tr>
@foreach ($todos as $todo)
<tr>
    <div class="todo-list">
        <form action="/todos/update" method="post">
        @method('PATCH')
        @csrf
        <div class="todo-list__update">
            <td><input type="text" name="content" value="{{ $todo['content'] }}"></td>
            <input type="hidden" name="id" value="{{$todo['id']}}">
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