<?php

use App\Http\Controllers\TugasController;
use Illuminate\Support\Facades\Route;


Route::get('/',[TugasController::class,'todo'])->name('todo'); //mendefinisikan URL '/' (homepage) dan mengarahkan permintaan ke method todo() dalam TugasController.
Route::post( '/task/store',[TugasController::class,'store'])->name('store'); // mendefinisikan sebuah route POST untuk URL /task/store, yang akan mengarah pada method store() di controller TugasController.
Route::post('/tugas/update/{id}', [TugasController::class, 'update'])->name('update'); //mendefinisikan route POST untuk URL /tugas/update/{id}, yang akan menangani permintaan untuk memperbarui data tugas dengan ID tertentu.
Route::post('/tugas/{id}', [TugasController::class, 'destroy'])->name('tugas.destroy'); //mendefinisikan route POST untuk URL /tugas/{id}, yang digunakan untuk menghapus tugas berdasarkan ID yang diberikan.
Route::post('/tugas/toggleStatus/{id}', [TugasController::class, 'toggleStatus'])->name('toggle'); //mendefinisikan route POST untuk URL /tugas/toggleStatus/{id}, yang digunakan untuk mengganti status tugas berdasarkan ID yang diberikan.

Route::get('/tugas/today/{id}', [TugasController::class, 'today'])->name('tugas.today'); //mendefinisikan route untuk menampilkan data table (filter data by date)
Route::get('/tugas/tomorrow/{id}', [TugasController::class, 'tomorrow'])->name('tugas.tomorrow'); //mendefinisikan route untuk menampilkan data table (filter data by date)
Route::get('/tugas/selesai/{id}', [TugasController::class, 'selesai'])->name('tugas.selesai'); 

