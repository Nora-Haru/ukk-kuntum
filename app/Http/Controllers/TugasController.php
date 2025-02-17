<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TugasModel;

class TugasController extends Controller
{
    public function taks(){
        $todo = TugasModel::all();
        return view('todo',compact('todo'));
    }

   
    // public function tambah(Request $request){
    //     dd($request);
    //     Tugas::create($request->all());
    //     return redirect()->route('todo');
    // }   

    function list(Request $request){
        $taks = New TugasModel();
        $taks->tugas = $request->tugas;
        $taks->prioritas = $request->prioritas;
        $taks->tanggal = $request->tanggal;

        $taks->save();
    }   

    public function hapus($id)
    {
        $taks = TugasModel::find($id);
        $taks->delete();
        // return redirect()->route('todo');
    }
    // public function toggleStatus($id) 
    // {
    //     $task = TugasModel::findOrFail($id);
    //     // Toggle status: jika 0 (Belum Selesai) menjadi 1 (Selesai), dan sebaliknya
    //     $task->status = !$task->status; // Membalikkan nilai status (0 menjadi 1, 1 menjadi 0)
    //     $task->save();

    //     return redirect()->route('tasks.todo');
    // }
    // public function update(Request $request, TugasModel $task)
    // {
    //     // Validasi input
    //     $request->validate([
    //         'tugas' => 'required',
    //         'prioritas' => 'required'
    //     ]);

    //     // Update data task
    //     $task->update([
    //         'tugas' => $request->tugas,
    //         'prioritas' => $request->prioritas,
    //     ]);

    //     return redirect()->route('tasks.index')->with('success', 'Tugas berhasil diperbarui!');
    // }
    // public function destroy(Request $request, $id)
    // {
    //     $task = TugasModel::find( $id);
    //     $task->delete();
    //     return redirect()->route('tasks.index');
    // }
    // public function edit(Request $request, $id)
    // {
    //     return view('tasks.edit', compact('task'));
    // }



}