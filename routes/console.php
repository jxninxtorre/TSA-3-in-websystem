<?php

use App\Models\Task;
use Illuminate\Support\Facades\Route;

// Welcome: tasks for today only
Route::get('/', function () {
    $tasks = Task::whereDate('task_date', today())->get();
    return view('welcome', ['tasks' => $tasks]);
});