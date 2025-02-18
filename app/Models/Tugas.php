<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Tugas extends Model
{
    use HasFactory;
    // menentukan nama tabel di database yang akan berhubungan dengan model ini.
    protected $table = 'task';

    //array yang digunakan untuk menentukan kolom-kolom yang dapat diisi secara massal (mass assignment).
    protected $fillable = [
        'tugas', //kolom yang diisi
        'prioritas',
        'tgl_dibuat',
        'tgl_selesai',
        'status',
    ];
}
