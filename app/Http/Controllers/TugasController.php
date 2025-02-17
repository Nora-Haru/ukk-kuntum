<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tugas;
use App\Models\TugasModel;

class TugasController extends Controller
{
    public function taks(){
        return view('todo');
    }

    public function tugas(){
        $data = TugasModel::all();
         return view('todo', compact('data'));
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
}