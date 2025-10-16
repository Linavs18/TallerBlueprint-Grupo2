<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::resource('users', App\Http\Controllers\UserController::class)->except('show');

Route::resource('projects', App\Http\Controllers\ProjectController::class)->except('show');

Route::resource('tasks', App\Http\Controllers\TaskController::class)->except('show');

Route::resource('project-users', App\Http\Controllers\ProjectUserController::class)->except('show');


Route::resource('users', App\Http\Controllers\UserController::class)->except('show');

Route::resource('projects', App\Http\Controllers\ProjectController::class)->except('show');

Route::resource('tasks', App\Http\Controllers\TaskController::class)->except('show');

Route::resource('project-users', App\Http\Controllers\ProjectUserController::class)->except('show');


Route::resource('users', App\Http\Controllers\UserController::class)->except('create', 'edit');

Route::resource('projects', App\Http\Controllers\ProjectController::class);

Route::resource('tasks', App\Http\Controllers\TaskController::class);

Route::resource('project-users', App\Http\Controllers\ProjectUserController::class)->except('create', 'edit', 'show');
