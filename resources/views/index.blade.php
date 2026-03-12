@extends('layouts.app')

@section('content')
    <h1 class="text-5xl underline font-bold flex justify-center items-center p-10 ">
        Daily Task Manager
    </h1>
    <div class="flex justify-center items-center h-100 ">
        <div class="w-full max-w-3xl shadow-lg rounded-lg p-6">
            <form action="/todo" method="POST" class="flex gap-2 mb-4 items-center justify-center">
                @csrf
                <div class="relative w-full ">

                    <input type="text" name="title" value="{{ old('title') }}" placeholder="Add new task..." class="w-full border rounded px-3 py-2
                                       @error('title') border-red-500 pr-24 bg-red-50 @enderror">

                    @error('title')
                        <span class="absolute right-3 top-1/2 -translate-y-1/2 text-red-500 text-sm">
                            {{ $message }}
                        </span>
                    @enderror

                </div>

                <button class="rounded-md bg-blue-600 py-2 px-4 border border-transparent text-sm text-white shadow-lg
                                       hover:bg-blue-700 hover:scale-105 active:scale-95 focus:bg-blue-700
                                       transition-all duration-200 ease-in-out ml-2">
                    Add
                </button>

            </form>

            @foreach($todos as $todo)
                    <ul>
                        <li class="flex justify-between items-center border-b py-2">

                            <span class="{{ $todo->iscompleted ? 'completed-title' : '' }}">
                                {{ $todo->title }}
                            </span>

                            <div class="flex">

                                <!-- DELETE -->
                                <form action="/todo/{{ $todo->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="rounded-md bg-red-600 py-2 px-4 text-white ml-2
                                                                                                                                                                                                                                                                                                                                                                     transition-colors duration-200 
                                                                                                                                                                                                                                                                                                                                                                       hover:bg-red-700 hover:scale-105 
                                                                                                                                                                                                                                                                                                                                                                       active:scale-95 active:shadow-lg 
                                                                                                                                                                                                                                                                                                                                                                       focus:outline-none focus:ring-2 focus:ring-red-300">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>

                                <!-- EDIT -->


                                <a href="{{ route('showTask', $todo->id) }}"
                                    class="rounded-md bg-amber-400 py-3 px-4 text-slate-800 ml-2    
                                                                                                          transition-colors duration-200
                                                                                                          hover:bg-amber-500 hover:scale-105
                                                                                                          active:scale-90 active:shadow-lg
                                                                                                          focus:outline-none focus:ring-2 focus:ring-amber-500
                                                                                                          flex items-center justify-center">

                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>

                                <!-- COMPLETE -->
                                <form action="/todo/{{ $todo->id }}" method="POST">
                                    @csrf
                                    @method('PATCH')

                                    <label
                                        class="inline-flex items-center justify-center w-13.5 h-10 p-1 gap-1 text-white text-base rounded-md
                                                                                                                                                                                                                                                                          {{ $todo->iscompleted ? 'bg-green-500 scale-105 shadow-lg' : 'bg-gray-400' }}
                                                                                                                                                                                                                                                                          cursor-pointer transition-all duration-200
                                                                                                                                                                                                                                                                          hover:bg-green-500 hover:scale-105 active:scale-95 ml-2">

                                        <input type="checkbox" name="iscompleted" value="1" class="hidden"
                                            onchange="this.form.submit()" {{ $todo->iscompleted ? 'checked' : '' }}>
                                        <i class="fa-solid fa-calendar-check"></i>
                                    </label>
                                </form>

                            </div>
                        </li>

                    </ul>
            @endforeach
        </div>
    </div>
@endsection
