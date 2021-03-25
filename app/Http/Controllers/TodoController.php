<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
class TodoController extends Controller
{
    //cdrate function
    public function index(){
        $todos=Todo::all();
        return $todos;
        return view('todo.index');
    }



    public function create(){
        return view('todo.create');
    }

      public function edit(){
        return view('todo.edit');
    }

public function store(Request $request){

//dd($request->all());
        Todo::create($request->all());
        return redirect()->back()->with('message','Todo created Successfully');


}

}
