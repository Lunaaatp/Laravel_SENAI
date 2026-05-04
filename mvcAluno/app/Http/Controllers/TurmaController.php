<?php

namespace App\Http\Controllers;
use App\Models\Turma;

use Illuminate\Http\Request;

class TurmaController extends Controller{
     public function listar(){
        $query = Turma::query();
        $turmas = $query->get();
        return view('listar', compact('turmas'));
}

 public function add(Request $request){

    $request->validate([
        'numSala' => 'required|numeric|max:255',
        'serie' => 'required|string|max:255|unique:turmas,serie'
    ]);

    Turma::create([
        'numSala' => $request->numSala,
        'serie' => $request->serie
    ]);

    return redirect()->back()->with('sucess','Turma Cadastrada com sucesso!');
 }

    public function atualizar($id){
        $turma = Turma::findOrFail($id);
        return view('atualizar', compact('turma'));
    }
}