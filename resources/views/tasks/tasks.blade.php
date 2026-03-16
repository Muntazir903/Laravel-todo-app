@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-linear-to-br from-slate-950 via-slate-900 to-[#1a142b]">
        <div class="relative mx-auto w-full max-w-6xl px-4 py-8 sm:px-6 sm:py-10 lg:px-8 lg:py-12">
            <div
                class="pointer-events-none absolute -top-16 right-2 h-40 w-40 rounded-full bg-purple-500/20 blur-3xl sm:right-4 sm:h-56 sm:w-56">
            </div>
            <div
                class="pointer-events-none absolute bottom-0 left-2 h-48 w-48 rounded-full bg-blue-500/20 blur-3xl sm:left-6 sm:h-64 sm:w-64">
            </div>

            <div class="flex flex-col gap-4 text-center sm:flex-row sm:items-end sm:justify-between sm:text-left">
                <div>
                    <div
                        class="inline-flex items-center gap-3 rounded-full border border-white/10 bg-white/5 px-3 py-1.5 text-[0.65rem] uppercase tracking-[0.28em] text-purple-200 sm:px-4 sm:py-2 sm:text-xs">
                        <span
                            class="flex h-7 w-7 items-center justify-center rounded-full bg-purple-500/20 text-purple-200">
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M7 8h10M7 12h6m-8 8h14a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2Z" />
                            </svg>
                        </span>
                        Productivity
                    </div>
                    <h1 class="mt-4 text-3xl font-extrabold tracking-tight text-white sm:text-4xl lg:text-5xl">My Tasks</h1>
                    <p class="mt-2 text-sm text-slate-300 sm:text-base">Focus, prioritize, and keep momentum.</p>
                </div>
                <div class="flex flex-col items-center gap-3 sm:items-end">
                    <div class="flex flex-wrap items-center justify-center gap-3 text-xs text-slate-300 sm:justify-end sm:text-sm">
                        <span class="inline-flex items-center gap-2">
                            <span class="h-2.5 w-2.5 rounded-full bg-emerald-400"></span> Completed
                        </span>
                        <span class="inline-flex items-center gap-2">
                            <span class="h-2.5 w-2.5 rounded-full bg-purple-300"></span> Pending
                        </span>
                    </div>
                    <a href="{{ route('createTask') }}"
                        class="inline-flex w-full items-center justify-center rounded-full border border-white/10 bg-white/5 px-4 py-2 text-sm text-slate-200 transition hover:bg-white/10 sm:w-auto">
                        Add Task
                    </a>
                </div>
            </div>

            <div class="mt-8 grid gap-6">
                <div
                    class="relative overflow-hidden rounded-2xl border border-white/10 bg-white/5 p-4 shadow-[0_20px_80px_-30px_rgba(124,58,237,0.35)] backdrop-blur sm:p-6">
                    <div
                        class="pointer-events-none absolute inset-0 bg-linear-to-br from-purple-500/10 via-transparent to-slate-900/40">
                    </div>
                    <h3 class="text-sm font-semibold uppercase tracking-[0.2em] text-slate-300">Stats</h3>
                    <div class="mt-4 grid gap-3">
                        <div
                            class="flex items-center justify-between rounded-xl border border-white/10 bg-white/5 px-4 py-3">
                            <span class="text-sm text-slate-300">Total tasks</span>
                            <span class="text-base font-semibold text-white sm:text-lg px-2">{{ $todos->count() }}</span>
                        </div>
                        <div
                            class="flex items-center justify-between rounded-xl border border-white/10 bg-white/5 px-5 py-3">
                            <span class="text-sm text-slate-300 px-0">Completed</span>
                            <span
                                class="text-base font-semibold text-emerald-300 sm:text-lg">{{ $todos->where('iscompleted', true)->count() }}</span>
                        </div>
                        <div
                            class="flex items-center justify-between rounded-xl border border-white/10 bg-white/5 px-5 py-3">
                            <span class="text-sm text-slate-300">Remaining</span>
                            <span
                                class="text-base font-semibold text-purple-200 sm:text-lg">{{ $todos->where('iscompleted', false)->count() }}</span>
                        </div>
                    </div>
                </div>
                <div
                    class="rounded-2xl border border-white/10 bg-white/5 p-4 shadow-[0_30px_90px_-40px_rgba(15,23,42,0.8)] backdrop-blur sm:p-6">
                    @if($todos->isEmpty())
                        <div class="text-center py-12 text-slate-400">
                            No tasks yet. <a href="{{ route('createTask') }}" class="underline underline-offset-4">Add one</a>
                            to get started.
                        </div>
                    @else
                        <ul class="divide-y divide-white/10">
                            @foreach($todos as $todo)
                                <li
                                    class="group flex flex-col gap-4 rounded-xl px-2 py-4 transition sm:flex-row sm:items-center sm:justify-between sm:gap-5 sm:px-3 hover:bg-white/7">
                                    <div class="flex items-start gap-3 sm:gap-4">
                                        <div
                                            class="mt-2 h-3 w-3 rounded-full {{ $todo->iscompleted ? 'bg-emerald-400' : 'bg-purple-300' }}">
                                        </div>
                                        <div class="min-w-0 flex-1">
                                            <a href="{{ route('showTask', $todo->id) }}" class="block">
                                                <div class="flex flex-wrap items-center gap-2">
                                                    <span
                                                        class="break-words text-base font-semibold text-white transition group-hover:text-purple-100 sm:text-lg {{ $todo->iscompleted ? 'line-through text-slate-400/80' : '' }}">
                                                        {{ $todo->title }}
                                                    </span>
                                                    <span
                                                        class="text-xs px-2 py-0.5 rounded-full {{ $todo->iscompleted ? 'bg-emerald-500/20 text-emerald-200' : 'bg-purple-500/20 text-purple-200' }}">
                                                        {{ $todo->iscompleted ? 'Completed' : 'Pending' }}
                                                    </span>
                                                </div>
                                                @if($todo->description)
                                                    <p class="mt-1 break-words text-sm text-slate-300">
                                                        {{ \Illuminate\Support\Str::limit($todo->description, 30) }}
                                                    </p>
                                                @endif
                                            </a>
                                        </div>
                                    </div>

                                    <div class="flex flex-wrap items-center gap-2 sm:gap-3">
                                        <a href="{{ route('showTask', $todo->id) }}"
                                            class="inline-flex h-10 w-10 items-center justify-center rounded-md border border-yellow-500/10 bg-yellow-500/5 text-base font-medium text-yellow-100 transition hover:-translate-y-0.5 hover:bg-yellow-500/10 hover:text-yellow-100 hover:shadow-md active:scale-95"
                                            aria-label="Edit task">
                                            <i class="fa-solid fa-pen-to-square" aria-hidden="true"></i>
                                            <span class="sr-only">Edit</span>
                                        </a>

                                        <form action="/todo/{{ $todo->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="inline-flex h-10 w-10 items-center justify-center rounded-md border border-red-500/30 bg-red-500/10 text-base font-medium text-red-100 transition hover:-translate-y-0.5 hover:bg-red-500/20 hover:shadow-md active:scale-95"
                                                aria-label="Delete task">
                                                <i class="fa-solid fa-trash" aria-hidden="true"></i>
                                                <span class="sr-only">Delete</span>
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
                                                    class="inline-flex h-10 w-10 items-center justify-center rounded-md border transition hover:bg-white/10 {{ $todo->iscompleted ? 'border-emerald-400/40 bg-emerald-500/10 text-emerald-300' : 'border-white/10 bg-white/5 text-slate-200' }}"
                                                    aria-hidden="true">
                                                    <i class="fa-solid fa-square-check" aria-hidden="true"></i>
                                                </span>
                                                <span class="sr-only">
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
