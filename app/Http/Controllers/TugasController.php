<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tugas;


class TugasController extends Controller
{
    public function index(){
        $tasks = Tugas::all();
        return view('task.todo',compact('tasks'));
    }

   
    // public function tambah(Request $request){
    //     dd($request);
    //     Tugas::create($request->all());
    //     return redirect()->route('todo');
    // }   

    // function list(Request $request){
    //     $taks = New TugasModel();
    //     $taks->tugas = $request->tugas;
    //     $taks->prioritas = $request->prioritas;
    //     $taks->tanggal = $request->tanggal;

    //     $taks->save();
    // }   

    // public function hapus($id)
    // {
    //     $task = Tugas::find($id);
    //     $task->delete();
    //     // return redirect()->route('todo');
    // }




    public function list(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'priority' => 'required|in:Tidak Penting,Penting,Sangat Penting',
            'due_date' => 'required|date',
            'status' => 'required|in:Belum Selesai,Selesai',
        ]);

        Tugas::create($request->all());

        return redirect()->route('task.todo')->with('success', 'Tugas berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $task = Tugas::findOrFail($id);
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'priority' => 'required|in:Tidak Penting,Penting,Sangat Penting',
            'due_date' => 'required|date',
            'status' => 'required|in:Belum Selesai,Selesai',
        ]);

        $task = Tugas::findOrFail($id);
        $task->update($request->all());

        return redirect()->route('task.todo')->with('success', 'Task berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Tugas::destroy($id);
        return redirect()->route('task.todo')->with('success', 'Task berhasil dihapus!');
    }


    
}