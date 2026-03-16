<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('viewLogin');
        }

        $todos = Todo::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('tasks/tasks', compact('todos'));
    }

    public function create()
    {
        if (!Auth::check()) {
            return redirect()->route('viewLogin');
        }

        return view('tasks/task-create');
    }

    public function showTask(Todo $todo)
    {
        if (!Auth::check()) {
            return redirect()->route('viewLogin');
        }

        if ($todo->user_id !== Auth::id()) {
            abort(403);
        }

        return view('tasks/task-edit', compact('todo'));
    }

    public function latestTasks()
    {
        return redirect()->route('index');
    }


    public function addTask(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('viewLogin');
        }

        $request->validate([
            'title' => 'required',

        ]);

        Todo::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('index');

    }
    public function updateTask(Request $request, Todo $todos)
    {
        if (!Auth::check()) {
            return redirect()->route('viewLogin');
        }

        if ($todos->user_id !== Auth::id()) {
            abort(403);
        }

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
    }

    public function destory(Todo $todos)
    {
        if (!Auth::check()) {
            return redirect()->route('viewLogin');
        }

        if ($todos->user_id !== Auth::id()) {
            abort(403);
        }

        $todos->delete();

        return redirect()->back();
    }
}
