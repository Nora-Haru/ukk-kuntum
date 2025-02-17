<?php

use App\Http\Controllers\TugasController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('todo');
// });

Route::get('/',[TugasController::class,'taks'])->name('todo');
Route::post( '/list',[TugasController::class,'list'])->name('list');

Route::post('/hapus/{id}', [TugasController::class, 'hapus'])->name('hapus');
// Route untuk menampilkan form edit
