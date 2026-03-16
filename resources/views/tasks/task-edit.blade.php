@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-linear-to-br from-slate-950 via-slate-900 to-[#1a142b]">
        <div class="relative mx-auto w-full max-w-3xl px-4 py-8 sm:px-6 sm:py-10 lg:py-12">
            <div
                class="pointer-events-none absolute -top-14 right-3 h-36 w-36 rounded-full bg-purple-500/20 blur-3xl sm:right-6 sm:h-44 sm:w-44">
            </div>
            <div
                class="pointer-events-none absolute bottom-0 left-3 h-44 w-44 rounded-full bg-blue-500/20 blur-3xl sm:left-6 sm:h-56 sm:w-56">
            </div>

            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between mb-8 text-center sm:text-left">
                <div>
                    <p class="text-[0.7rem] uppercase tracking-[0.2em] text-purple-200 mb-1 sm:text-sm">Task Details</p>
                    <h1 class="text-2xl font-extrabold tracking-tight text-white sm:text-3xl">Edit Task</h1>
                    <p class="text-sm text-slate-300 mt-2 sm:text-base">Update the title or description below.</p>
                </div>
                <a href="{{ route('index') }}"
                    class="inline-flex w-full items-center justify-center rounded-full border border-white/10 bg-white/5 px-4 py-2 text-sm text-slate-200 transition hover:bg-white/10 sm:w-auto sm:self-auto self-center">
                    Back to tasks
                </a>
            </div>

            <div
                class="relative overflow-hidden rounded-2xl border border-white/10 bg-white/5 p-4 shadow-[0_20px_80px_-30px_rgba(88,80,236,0.45)] backdrop-blur sm:p-6">
                <div
                    class="pointer-events-none absolute inset-0 bg-linear-to-r from-purple-500/10 via-transparent to-blue-500/10">
                </div>
                <div class="flex flex-wrap items-center justify-center gap-2 mb-6 sm:justify-start">
                    <span
                        class="text-xs px-2 py-0.5 rounded-full {{ $todo->iscompleted ? 'bg-emerald-500/20 text-emerald-200' : 'bg-purple-500/20 text-purple-200' }}">
                        {{ $todo->iscompleted ? 'Completed' : 'Pending' }}
                    </span>
                    <span class="text-xs text-slate-400">Created {{ $todo->created_at?->diffForHumans() }}</span>
                </div>

                <form action="{{ route('updateTask', $todo->id) }}" method="POST" class="relative space-y-5">
                    @csrf
                    @method('PATCH')

                    <div>
                        <label for="title" class="block text-sm font-medium text-slate-200">Title</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $todo->title) }}"
                            class="mt-2 w-full rounded-xl border border-white/10 bg-white/10 px-3 py-2.5 text-base text-white shadow-sm focus:border-purple-400 focus:outline-none focus:ring-2 focus:ring-purple-400/40"
                            placeholder="Enter task title" required>
                        @error('title')
                            <p class="mt-2 text-sm text-red-300">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-slate-200">Description</label>
                        <textarea name="description" id="description" rows="4"
                            class="mt-2 w-full rounded-xl border border-white/10 bg-white/10 px-3 py-2.5 text-base text-white shadow-sm focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/40"
                            placeholder="Add a description for this task">{{ old('description', $todo->description) }}</textarea>
                    </div>

                    <div class="flex flex-wrap gap-3">
                        <button type="submit"
                            class="group relative w-full overflow-hidden rounded-xl bg-purple-500/80 px-4 py-2.5 text-base font-semibold text-white shadow-lg shadow-purple-500/30 transition hover:-translate-y-0.5 hover:bg-purple-500 focus:outline-none focus:ring-2 focus:ring-purple-300/60 sm:w-auto sm:text-sm">
                            Save changes
                            <span
                                class="pointer-events-none absolute inset-0 -translate-x-full bg-linear-to-r from-white/0 via-white/30 to-white/0 opacity-0 transition group-hover:translate-x-full group-hover:opacity-100"></span>
                        </button>
                        <a href="{{ route('index') }}"
                            class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-2.5 text-base font-semibold text-slate-200 transition hover:bg-white/10 sm:w-auto sm:text-sm">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection