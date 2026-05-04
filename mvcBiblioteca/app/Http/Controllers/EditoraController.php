<?php
namespace App\Http\Controllers;
use App\Models\Livro;
use App\Models\Editoras;

use Illuminate\Http\Request;

class EditoraController extends Controller{
    public function listar(){
        $editoras = Editoras::all();
        return view ('listarEditoras', compact('editoras'));
    }

    public function add(Request $request){
        $request->validate([
        'nome' => 'required|string|max:200',
        'cnpj' => 'required|numeric',
        'pais' => 'required|string|max:100',
        'cidade' => 'required|string|max:200'
        ]);

        Editoras::create([
        'nome' => 'required|string|max:200',
        'cnpj' => 'required|numeric|max:200',
        'pais' => 'required|string|max:100',
        'cidade' => 'required|string|max:200'
        ]);

        return redirect()->back()->with('success','Editora Cadastrado com sucesso!');

    }
}