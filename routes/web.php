<?php

use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Route;

// Welcome: tasks for today only
Route::get('/', function () {
    $tasks = Task::whereDate('task_date', today())->get();
    return view('welcome', ['tasks' => $tasks]);
});

// Task List: all tasks ordered by date
Route::get('/tasks', function () {
    $tasks = Task::orderBy('task_date')->orderBy('id')->get();
    return view('tasks', ['tasks' => $tasks]);
});

// Profile: the single user record
Route::get('/profile', function () {
    $user = User::first();
    return view('profile', ['user' => $user]);
});

// About: static page
Route::get('/about', function () {
    return view('about');
});