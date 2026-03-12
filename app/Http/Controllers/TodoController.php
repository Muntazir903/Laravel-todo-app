<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodoController
{
    public function index()
    {
        $todos = Todo::all();

        return view('index', compact('todos'));
    }

    public function showTask(Todo $todo)
    {
        return view('task', compact('todo'));
    }

    public function latestTasks()
    {
        $todos = Todo::orderBy('created_at', 'desc')->take(10)->get();

        return view('latest', compact('todos'));
    }


    public function addTask(Request $request)
    {
        $request->validate([
            'title' => 'required',

        ]);

        Todo::create([
            'title' => $request->title,
            'description' => $request->description,
            'isavailable' => $request->isavailable
        ]);

        return redirect()->route('index');

    }
    public function updateTask(Request $request, Todo $todos)
    {
        $isCompleted = $request->has('iscompleted') ? 1 : 0;

        $todos->update([
            'title' => $request->title,
            'description' => $request->description,
            'iscompleted' => $isCompleted,
        ]);

        return redirect()->route('index');
        ;
    }

    public function destory(Todo $todos)
    {
        $todos->delete();

        return redirect()->back();
    }
}
