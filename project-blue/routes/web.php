<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProjectUserController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('users', UserController::class)->except(['show']);

Route::resource('projects', ProjectController::class);

Route::resource('tasks', TaskController::class);

Route::resource('project-users', ProjectUserController::class)->except(['show']);