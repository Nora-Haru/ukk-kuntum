<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //Schema::create(): Digunakan untuk membuat tabel baru di database.
        //Blueprint $table untuk mendefinisikan struktur tabel yang akan dibuat atau dimodifikasi di database.
        Schema::create('task', function (Blueprint $table) {
            $table->id();
            $table->string('tugas');
            $table->enum('prioritas', ['Sangat Penting','Penting', 'Tidak Penting']);
            $table->date('tgl_dibuat')->default(now());
            $table->enum('status', ['Selesai','Belum Selesai'])->default('Belum Selesai');
            $table->date('tgl_selesai')->nullable();
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task'); //untuk menghapus tabel dari database jika tabel tersebut sudah ada.
    }
};
