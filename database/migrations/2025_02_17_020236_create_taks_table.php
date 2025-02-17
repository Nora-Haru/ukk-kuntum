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
        Schema::create('task', function (Blueprint $table) {
            $table->id();
            $table->string('tugas');
            $table->enum('prioritas', ['Penting', 'Tidak Penting', 'Sangat Penting']);
            $table->date('tgl_dibuat')->default(now());
            $table->date('tgl_selesai');
            $table->enum('status', ['Selesai','Belum Selesai'])->default('Belum Selesai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task');
    }
};
