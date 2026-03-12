@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-linear-to-br from-slate-950 via-slate-900 to-[#1a142b]">
        <div class="relative max-w-5xl mx-auto px-4 py-12">
            <div class="pointer-events-none absolute -top-16 right-4 h-56 w-56 rounded-full bg-purple-500/20 blur-3xl">
            </div>
            <div class="pointer-events-none absolute bottom-0 left-6 h-64 w-64 rounded-full bg-blue-500/20 blur-3xl"></div>

            <div class="flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <div
                        class="inline-flex items-center gap-3 rounded-full border border-white/10 bg-white/5 px-4 py-2 text-xs uppercase tracking-[0.3em] text-purple-200">
                        <span
                            class="flex h-7 w-7 items-center justify-center rounded-full bg-purple-500/20 text-purple-200">
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M7 8h10M7 12h6m-8 8h14a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2Z" />
                            </svg>
                        </span>
                        Productivity
                    </div>
                    <h1 class="mt-4 text-4xl font-extrabold tracking-tight text-white">My Tasks</h1>
                    <p class="text-slate-300 mt-2">Focus, prioritize, and keep momentum.</p>
                </div>
                <div class="inline-flex items-center gap-4 text-sm text-slate-300">
                    <span class="inline-flex items-center gap-2">
                        <span class="h-2.5 w-2.5 rounded-full bg-emerald-400"></span> Completed
                    </span>
                    <span class="inline-flex items-center gap-2">
                        <span class="h-2.5 w-2.5 rounded-full bg-purple-300"></span> Pending
                    </span>
                </div>
            </div>

            <div class="mt-8 grid gap-6">
                <div class="grid gap-4 md:grid-cols-[1.2fr_auto]">
                    <div
                        class="relative overflow-hidden rounded-2xl border border-white/10 bg-white/5 p-6 shadow-[0_20px_80px_-30px_rgba(88,80,236,0.45)] backdrop-blur">
                        <div
                            class="pointer-events-none absolute inset-0 bg-linear-to-r from-purple-500/10 via-transparent to-blue-500/10">
                        </div>
                        <div class="flex flex-col gap-1">
                            <h2 class="text-lg font-semibold text-white">Add a task</h2>
                            <p class="text-sm text-slate-300">Give it a title and an optional description.</p>
                        </div>
                        <form action="{{ route('addTask') }}" method="POST"
                            class="relative mt-5 grid gap-4 md:grid-cols-[1.2fr_2fr_auto]">
                            @csrf
                            <div>
                                <label for="title" class="block text-sm font-medium text-slate-200">Title</label>
                                <input type="text" name="title" id="title" value="{{ old('title') }}"
                                    placeholder="Plan the sprint review" required
                                    class="mt-2 w-full rounded-xl border border-white/10 bg-white/10 px-3 py-2 text-sm text-white shadow-sm focus:border-purple-400 focus:outline-none focus:ring-2 focus:ring-purple-400/40">
                                @error('title')
                                    <p class="mt-2 text-sm text-red-300">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="description"
                                    class="block text-sm font-medium text-slate-200">Description</label>
                                <textarea name="description" id="description" rows="2"
                                    placeholder="Add details, notes, or links"
                                    class="mt-2 w-full rounded-xl border border-white/10 bg-white/10 px-3 py-2 text-sm text-white shadow-sm focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/40">{{ old('description') }}</textarea>
                            </div>
                            <div class="flex items-end">
                                <button type="submit"
                                    class="group relative w-full overflow-hidden rounded-xl bg-purple-500/80 px-4 py-2 text-sm font-semibold text-white shadow-lg shadow-purple-500/30 transition hover:-translate-y-0.5 hover:bg-purple-500 focus:outline-none focus:ring-2 focus:ring-purple-300/60">
                                    <span class="relative z-10 inline-flex items-center gap-2">
                                        Add Task
                                        <span
                                            class="inline-flex h-5 w-5 items-center justify-center rounded-full bg-white/20">
                                            +
                                        </span>
                                    </span>
                                    <span
                                        class="pointer-events-none absolute inset-0 -translate-x-full bg-gradient-to-r from-white/0 via-white/30 to-white/0 opacity-0 transition group-hover:translate-x-full group-hover:opacity-100"></span>
                                </button>
                            </div>
                        </form>
                    </div>

                    <div
                        class="relative overflow-hidden rounded-2xl border border-white/10 bg-white/5 p-6 shadow-[0_20px_80px_-30px_rgba(124,58,237,0.35)] backdrop-blur">
                        <div
                            class="pointer-events-none absolute inset-0 bg-linear-to-br from-purple-500/10 via-transparent to-slate-900/40">
                        </div>
                        <h3 class="text-sm font-semibold uppercase tracking-[0.2em] text-slate-300">Stats</h3>
                        <div class="mt-4 grid gap-3">
                            <div
                                class="flex items-center justify-between rounded-xl border border-white/10 bg-white/5 px-4 py-3">
                                <span class="text-sm text-slate-300">Total tasks</span>
                                <span class="text-lg font-semibold text-white px-2">{{ $todos->count() }}</span>
                            </div>
                            <div
                                class="flex items-center justify-between rounded-xl border border-white/10 bg-white/5 px-5  py-3">
                                <span class="text-sm text-slate-300 px-0">Completed</span>
                                <span
                                    class="text-lg font-semibold text-emerald-300">{{ $todos->where('iscompleted', true)->count() }}</span>
                            </div>
                            <div
                                class="flex items-center justify-between rounded-xl border border-white/10 bg-white/5 px-5 py-3">
                                <span class="text-sm text-slate-300">Remaining</span>
                                <span
                                    class="text-lg font-semibold text-purple-200">{{ $todos->where('iscompleted', false)->count() }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="rounded-2xl border border-white/10 bg-white/5 p-6 shadow-[0_30px_90px_-40px_rgba(15,23,42,0.8)] backdrop-blur">
                    @if($todos->isEmpty())
                        <div class="text-center py-12 text-slate-400">
                            No tasks yet. Add one above to get started.
                        </div>
                    @else
                        <ul class="divide-y divide-white/10">
                            @foreach($todos as $todo)
                                <li
                                    class="group flex flex-col gap-5 rounded-xl py-3.5 px-2 transition sm:flex-row sm:items-center sm:justify-between hover:bg-white/7">
                                    <div class="flex items-start gap-3">
                                        <div
                                            class="mt-2 h-3 w-3 rounded-full {{ $todo->iscompleted ? 'bg-emerald-400' : 'bg-purple-300' }}">
                                        </div>
                                        <div class="flex-1">
                                            <a href="{{ route('showTask', $todo->id) }}" class="block">
                                                <div class="flex flex-wrap items-center gap-2">
                                                    <span
                                                        class="text-lg font-semibold text-white transition group-hover:text-purple-100 {{ $todo->iscompleted ? 'line-through text-slate-400/80' : '' }}">
                                                        {{ $todo->title }}
                                                    </span>
                                                    <span
                                                        class="text-xs px-2 py-0.5 rounded-full {{ $todo->iscompleted ? 'bg-emerald-500/20 text-emerald-200' : 'bg-purple-500/20 text-purple-200' }}">
                                                        {{ $todo->iscompleted ? 'Completed' : 'Pending' }}
                                                    </span>
                                                </div>
                                                @if($todo->description)
                                                    <p class="text-sm text-slate-300 mt-1">
                                                        {{ \Illuminate\Support\Str::limit($todo->description, 30) }}
                                                    </p>
                                                @endif
                                            </a>
                                        </div>
                                    </div>

                                    <div class="flex flex-wrap items-center gap-2">
                                        <a href="{{ route('showTask', $todo->id) }}"
                                            class="inline-flex items-center gap-2 rounded-md border border-white/10 bg-white/5 px-3 py-2 text-sm font-medium text-slate-100 transition hover:-translate-y-0.5 hover:bg-white/10 hover:text-white hover:shadow-md active:scale-95">
                                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="1.6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 20h9" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4 12.5-12.5Z" />
                                            </svg>
                                            Edit
                                        </a>

                                        <form action="/todo/{{ $todo->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="inline-flex items-center gap-2 rounded-md border border-red-500/30 bg-red-500/10 px-3 py-2 text-sm font-medium text-red-100 transition hover:-translate-y-0.5 hover:bg-red-500/20 hover:shadow-md active:scale-95">
                                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="1.6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 6h18" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M8 6V4h8v2m-1 0v14a2 2 0 0 1-2 2H9a2 2 0 0 1-2-2V6" />
                                                </svg>
                                                Delete
                                            </button>
                                        </form>

                                        <form action="/todo/{{ $todo->id }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="toggle_completed" value="1">
                                            <label class="flex items-center gap-2 cursor-pointer">
                                                <input type="checkbox" name="iscompleted" value="1" class="peer sr-only"
                                                    onchange="this.form.submit()" {{ $todo->iscompleted ? 'checked' : '' }}>
                                                <span
                                                    class="relative inline-flex h-8 w-14 items-center rounded-full border border-white/8 bg-white/10 px-1 transition-colors duration-300 peer-checked:bg-emerald-500/30
                                                                    after:absolute after:left-1 after:top-0.7 after:h-6 after:w-6 after:rounded-full after:bg-white after:shadow after:transition after:duration-300
                                                                    peer-checked:after:translate-x-6 peer-checked:after:bg-emerald-400"></span>
                                                </span>
                                                <span class="text-sm text-slate-300">
                                                    {{ $todo->iscompleted ? 'Completed' : 'Mark Done' }}
                                                </span>
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
    </div>
@endsection