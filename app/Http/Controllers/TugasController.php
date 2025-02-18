<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tugas;
use Carbon\Carbon;


class TugasController extends Controller
{

    public function todo()
    {
        $task = Tugas::orderBy('prioritas', 'asc')->get();
        return view('task.todo', compact('task'));
    }
    public function create()
    {
        return view('task.create');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        // $request->validate([
        //     'tugas' => 'required|string|max:255',
        //     'prioritas' => 'required|in:Penting,Tidak Penting,Sangat Penting',
        //     'tgl_dibuat' => 'required|date',
        // ]);

        $list = new Tugas();
        $list->tugas = $request->tugas;
        $list->prioritas = $request->prioritas;
        $list->tgl_dibuat = $request->tgl_dibuat;

        $list->save();
        return redirect()->route('todo');
        // return redirect()->back()->with('success', 'Tugas berhasil ditambahkan!');
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
    // public function edit(Request $request, $id)
    // {
    //     $task = Tugas::findOrFail($id);
    //     // return view('task.edit', compact('task'));
    // }
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
