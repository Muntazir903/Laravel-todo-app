<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodoController
{
    public function index()
    {
        $todos = Todo::orderBy('created_at', 'desc')->get();

        return view('tasks/tasks', compact('todos'));
    }

    public function create()
    {
        return view('tasks/task-create');
    }

    public function showTask(Todo $todo)
    {
        return view('tasks/task-edit', compact('todo'));
    }

    public function latestTasks()
    {
        return redirect()->route('index');
    }


    public function addTask(Request $request)
    {
        $request->validate([
            'title' => 'required',

        ]);

        Todo::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('index');

    }
    public function updateTask(Request $request, Todo $todos)
    {
        $data = [];

        if ($request->has('title')) {
            $request->validate([
                'title' => 'required',
            ]);
            $data['title'] = $request->title;
        }

        if ($request->has('description')) {
            $data['description'] = $request->description;
        }

        if ($request->has('toggle_completed')) {
            $data['iscompleted'] = $request->has('iscompleted') ? 1 : 0;
        }

        if (!empty($data)) {
            $todos->update($data);
        }

        return redirect()->route('index');
        ;
    }

    public function destory(Todo $todos)
    {
        $todos->delete();

        return redirect()->back();
    }
}
