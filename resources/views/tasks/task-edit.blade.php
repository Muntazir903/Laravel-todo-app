@extends('layouts.app')

@section('content')
    <div
        class="min-h-screen bg-gradient-to-br from-slate-950 via-slate-900 to-[#1a142b] px-4 py-18 sm:px-6 sm:py-10 flex flex-col items-center gap-7">

        <!-- Background glows -->
        <div
            class="pointer-events-none absolute -top-10 right-2 h-28 w-28 rounded-full bg-purple-500/20 blur-3xl sm:-top-14 sm:right-6 sm:h-44 sm:w-44">
        </div>
        <div
            class="pointer-events-none absolute bottom-0 left-2 h-32 w-32 rounded-full bg-blue-500/20 blur-3xl sm:left-6 sm:h-56 sm:w-56">
        </div>

        <!-- Header Card -->
        <div
            class="w-full max-w-3xl bg-white/5 border border-white/10 backdrop-blur rounded-2xl p-6 sm:p-8 shadow-[0_20px_80px_-30px_rgba(88,80,236,0.45)]">
            <div class="flex flex-wrap items-center justify-between gap-4 text-left">
                <div class="flex-1">
                    <p class="text-[0.75rem] uppercase tracking-[0.25em] text-purple-200 mb-2">Task Details</p>
                    <h1 class="text-xl font-extrabold text-white sm:text-3xl">Edit Task</h1>
                    <p class="text-[0.92rem] text-slate-300 mt-1 sm:mt-3 sm:text-base">Update the title or description below.</p>
                </div>
                <a href="{{ route('index') }}"
                    class="inline-flex items-center justify-center rounded-full border border-white/10 bg-white/5 px-4 py-2 text-sm text-slate-200 transition hover:bg-white/10">
                    Back to tasks
                </a>
            </div>
        </div>

        <!-- Form Card -->
        <div
            class="w-full max-w-3xl bg-white/5 border border-white/10 backdrop-blur rounded-2xl p-6 sm:p-8 shadow-[0_20px_80px_-30px_rgba(88,80,236,0.45)]">

            <!-- Status -->
            <div class="flex flex-wrap items-center justify-center gap-2 mb-5 sm:justify-start">
                <span
                    class="text-xs px-2 py-0.5 rounded-full {{ $todo->iscompleted ? 'bg-emerald-500/20 text-emerald-200' : 'bg-purple-500/20 text-purple-200' }}">
                    {{ $todo->iscompleted ? 'Completed' : 'Pending' }}
                </span>
                <span class="text-xs text-slate-400">Created {{ $todo->created_at?->diffForHumans() }}</span>
            </div>

            <!-- Form -->
            <form action="{{ route('updateTask', $todo->id) }}" method="POST" class="grid gap-4 sm:gap-5 relative">
                @csrf
                @method('PATCH')

                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-slate-200">Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $todo->title) }}"
                        placeholder="Enter task title" required
                        class="mt-2 w-full rounded-xl border border-white/10 bg-white/10 px-3 py-3 text-sm text-white shadow-sm focus:border-purple-400 focus:outline-none focus:ring-2 focus:ring-purple-400/40 sm:py-2.5 sm:text-base">
                    @error('title')
                        <p class="mt-2 text-sm text-red-300">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-slate-200">Description</label>
                    <textarea name="description" id="description" rows="4" placeholder="Add a description for this task"
                        class="mt-2 w-full rounded-xl border border-white/10 bg-white/10 px-3 py-3 text-sm text-white shadow-sm focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/40 sm:py-2.5 sm:text-base">{{ old('description', $todo->description) }}</textarea>
                </div>

                <!-- Buttons -->
                <div class="flex flex-wrap gap-3 mt-4">
                    <button type="submit"
                        class="group relative w-full sm:w-auto overflow-hidden rounded-xl bg-purple-500/80 px-4 py-3 text-sm font-semibold text-white shadow-lg shadow-purple-500/30 transition hover:-translate-y-0.5 hover:bg-purple-500 focus:outline-none focus:ring-2 focus:ring-purple-300/60">
                        Save changes
                        <span
                            class="pointer-events-none absolute inset-0 -translate-x-full bg-gradient-to-r from-white/0 via-white/30 to-white/0 opacity-0 transition group-hover:translate-x-full group-hover:opacity-100"></span>
                    </button>
                    <a href="{{ route('index') }}"
                        class="w-full sm:w-auto flex items-center justify-center     sm:w-auto rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-sm font-semibold text-slate-200 transition hover:bg-white/10">
                        Cancel
                    </a>
                </div>

            </form>
        </div>

    </div>
@endsection