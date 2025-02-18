<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tugas;
use Carbon\Carbon;


class TugasController extends Controller
{

    public function todo()
    {
        //digunakan untuk mengambil data dari tabel tugas dan mengurutkannya berdasarkan kolom prioritas dengan urutan ascending (naik), 
        //yaitu dari yang memiliki prioritas rendah ke yang tinggi.
        $task = Tugas::orderBy('prioritas', 'asc')->get(); 
        return view('task.todo', compact('task')); //mengembalikan tampilan (view) dan mengirimkan data ke tampilan tersebut
    }

    public function create()
    {
        return view('task.create'); //mengembalikan sebuah tampilan (view) kepada pengguna
    }

    public function store(Request $request) //save data yang di input
    {
        $list = new Tugas();
        $list->tugas = $request->tugas;
        $list->prioritas = $request->prioritas;
        $list->tgl_dibuat = $request->tgl_dibuat;

        $list->save();
        return redirect()->route('todo'); //mengembalikan tampilan ke halaman awal
    }

    public function toggleStatus($id)
    {
        $dayli = Tugas::findOrFail($id);

        // Ubah status (misalnya dari 0 ke 1 atau sebaliknya)
        if ($dayli->status == "Belum Selesai") {
            $dayli->status = "Selesai";
            $dayli->tgl_selesai = Carbon::now()->toDateString(); // Set tgl selesai ke hari ini
        } else {
            $dayli->status = "Belum Selesai";
            $dayli->tgl_selesai = null; // Reset tanggal selesai jika tugas belum selesai
        }
        $dayli->save();

        return redirect()->route('todo');
    }
    
    public function update(Request $request, $id)
    {
        $todos = Tugas::findOrFail($id);
        $todos->tugas = $request->tugas;
        $todos->prioritas = $request->prioritas;
     
        $todos->save();
        return redirect()->route('todo');
    }

    public function destroy($id)
    {
        $todos = Tugas::findOrFail($id);
        $todos->delete();
        return redirect()->route('todo');
    }
}
