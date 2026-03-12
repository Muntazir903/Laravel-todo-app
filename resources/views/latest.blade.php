@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-linear-to-br from-slate-50 via-white to-slate-100">
        <div class="max-w-4xl mx-auto px-4 py-12">
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h1 class="text-4xl font-extrabold tracking-tight text-slate-900">Latest Tasks</h1>
                    <p class="text-slate-600 mt-2">Your 10 most recent tasks, completed or not.</p>
                </div>
                <a href="{{ route('index') }}"
                    class="rounded-full border border-slate-300 px-4 py-2 text-sm text-slate-700 hover:bg-slate-100 transition">
                    Back to list
                </a>
            </div>

            <div class="bg-white/70 backdrop-blur shadow-xl rounded-2xl p-6 border border-slate-200">
                @if($todos->isEmpty())
                    <div class="text-center py-12 text-slate-500">
                        No tasks yet. Add one from the main list.
                    </div>
                @else
                    <ul class="divide-y divide-slate-200">
                        @foreach($todos as $todo)
                            <li class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 py-4">
                                <div class="flex items-start gap-3">
                                    <div
                                        class="mt-2 h-3 w-3 rounded-full {{ $todo->iscompleted ? 'bg-emerald-500' : 'bg-amber-400' }}">
                                    </div>
                                    <div>
                                        <div class="flex items-center gap-2">
                                            <span
                                                class="text-lg font-semibold text-slate-900 {{ $todo->iscompleted ? 'line-through text-slate-400' : '' }}">
                                                {{ $todo->title }}
                                                {{-- @dd($todo->title) --}}
                                                @php
                                                    // echo $todo->title;q
                                                @endphp
                                            </span>
                                            <span
                                                class="text-xs px-2 py-0.5 rounded-full {{ $todo->iscompleted ? 'bg-emerald-100 text-emerald-700' : 'bg-amber-100 text-amber-700' }}">
                                                {{ $todo->iscompleted ? 'Completed' : 'Pending' }}
                                            </span>
                                        </div>
                                        @if($todo->description)
                                            <p class="text-sm text-slate-600 mt-1">{{ $todo->description }}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="flex items-center gap-2">
                                    <a href="{{ route('showTask', $todo->id) }}"
                                        class="rounded-md bg-amber-400 py-2 px-3 text-slate-800
                                                                                                                                        hover:bg-amber-500 hover:scale-105 active:scale-95 transition">
                                        Edit
                                    </a>

                                    <form action="/todo/{{ $todo->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="rounded-md bg-red-600 py-2 px-3 text-white
                                                                                                                                            hover:bg-red-700 hover:scale-105 active:scale-95 transition">
                                            Delete
                                        </button>
                                    </form>

                                    <form action="/todo/{{ $todo->id }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <label
                                            class="inline-flex items-center justify-center h-9 px-3 text-white text-sm rounded-md
                                                                                                                                            {{ $todo->iscompleted ? 'bg-emerald-500' : 'bg-slate-500' }}
                                                                                                                                            cursor-pointer transition-all duration-200
                                                                                                                                            hover:scale-105 active:scale-95">
                                            <input type="checkbox" name="iscompleted" value="1" class="hidden"
                                                onchange="this.form.submit()" {{ $todo->iscompleted ? 'checked' : '' }}>
                                            {{ $todo->iscompleted ? 'Completed' : 'Mark Done' }}
                                        </label>
                                    </form>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
@endsection