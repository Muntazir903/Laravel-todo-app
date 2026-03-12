<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', [TodoController::class, "index"])->name('index');

Route::get('/todo/{todo}/edit', [TodoController::class, 'showTask'])->name('showTask');

Route::get('/todo/latest', [TodoController::class, 'latestTasks'])->name('latestTasks');


Route::post('/todo/', [TodoController::class, 'addTask'])->name('addTask');

Route::patch('/todo/{todos}', [TodoController::class, 'updateTask'])->name('updateTask');

Route::delete('/todo/{todos}', [TodoController::class, 'destory']);
