<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;

use App\Models\Todo;

class TodoController extends Controller
{
    public function index(){
        $todos = Todo::all();
        return view('index',compact('todos'));
    }
    public function store(TodoRequest $request){
        $todo = $request->all();
        Todo::create($todo);
        return redirect('/')->with('greenMessage','Todoを作成しました');
    }
    public function update(TodoRequest $request){
        $todo = $request->only(['content']);
        Todo::find($request->id)->update($todo);
        return redirect('/');
    }
    public function destroy(Request $request){
        Todo::find($request->id)->delete();
        return redirect('/')->with('greenMessage','Todoを削除しました');
    }
}