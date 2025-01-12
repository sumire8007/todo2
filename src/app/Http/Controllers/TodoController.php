<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;
use App\Models\Category;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index(){
        $todos = Todo::with('category')->get();    // プロダクトとその関連するカテゴリを一度に取得
        $categories = Category::all();
        return view('index',compact('todos','categories'));
    }
    public function store(TodoRequest $request){
        $todo = $request->only(['category_id','content']);
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
    public function search(Request $request){
        $todos = Todo::with('category')->CategorySearch($request->category_id)->KeywordSearch($request->keyword)->get();
        //categorySearchで一つのメソッドにアクセスした後にKeywordSearchメソッドにアクセスしている　withメソッドはcategoryのTodoに関連しているデータを持ってきている
        $categories = Category::all();
        return view('index',compact('todos','categories'));
    }
}