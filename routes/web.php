<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/welcome', [TaskController::class, 'welcome'])->name('welcome');
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::post('/',[TaskController::class, 'store'])->name('tasks.store');
Route::get('tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::post('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
Route::post('/tasks/{task}/complete', [TaskController::class, 'complete'])->name('tasks.complete');
Route::get('/tasks/completed', [TaskController::class, 'completedTasks'])->name('tasks.completed');
Route::post('/tasks/{task}/pending', [TaskController::class, 'pending'])->name('tasks.pending');