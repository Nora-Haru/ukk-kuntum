<?php

use App\Http\Controllers\TugasController;
use Illuminate\Support\Facades\Route;


Route::get('/',[TugasController::class,'todo'])->name('todo');
Route::post( '/task/store',[TugasController::class,'store'])->name('store');
Route::post('/tugas/update/{id}', [TugasController::class, 'update'])->name('update');
Route::post('/tugas/{id}', [TugasController::class, 'destroy'])->name('tugas.destroy');



Route::post('/tugas/toggleStatus/{id}', [TugasController::class, 'toggleStatus'])->name('toggle');
// Route::resource('tugas', TugasController::class);
