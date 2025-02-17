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
        Schema::create('taks', function (Blueprint $table) {
            $table->id();
            $table->string('tugas');
            $table->enum('prioritas', ['1','2','3'])->default('1');
            $table->date('tanggal')->nullable();
            $table->enum('status', ['Selesai','Belum Selesai'])->default('Belum Selesai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taks');
    }
};
