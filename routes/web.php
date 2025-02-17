<?php

use App\Http\Controllers\TugasController;
use Illuminate\Support\Facades\Route;


Route::get('/',[TugasController::class,'todo'])->name('todo');
Route::post( '/list',[TugasController::class,'list'])->name('list');

// Route::post('/hapus/{id}', [TugasController::class, 'hapus'])->name('hapus');

// Route::get('/', [TugasController::class, 'index'])->name('tasks.index');
// Route::post('/tasks', [TugasController::class, 'store'])->name('tasks.store');
Route::get('/tasks/{id}/edit', [TugasController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{id}', [TugasController::class, 'update'])->name('tasks.update');
Route::delete('/tasks/{id}', [TugasController::class, 'destroy'])->name('tasks.destroy');