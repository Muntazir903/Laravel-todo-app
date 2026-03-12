@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto mt-10">
        <h1 class="text-3xl font-bold mb-6 text-center">Add / Edit Task</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('updateTask', $todo->id) }}" method="POST" class="bg-white shadow-md rounded p-6 space-y-4">
            @csrf
            @method('PATCH')

            <div>
                <label for="title" class="block font-medium mb-1">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $todo->title) }}"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter task title" required>
            </div>

            <div>
                <label for="description" class="block font-medium mb-1">Description</label>
                <textarea name="description" id="description" rows="4"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Add a description for this task">{{ old('description', $todo->description) }}</textarea>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                    Save
                </button>
            </div>
        </form>
    </div>
@endsection
