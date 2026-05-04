<?php

namespace App\Https\Controllers;
use App\Models\Produto;

use Illuminate\Http\Request;

class ProdutoController extends Controller{
    public function listar(){
        $query = Produto::query();
        $produtos = $query->get();
        return view('listar', compact('alunos'));
    }

    public function add(Request $request){

        $request->validate([
            'nome' => 'required|string|max:255',
            'valor' => 'required|string|max:255',
            'cor' => 'required|string|max:255'
        ]);

        Produto::create([
            'nome'=> requested->nome,
            'valor'=> requested->valor,
            'cor'=> requested->cor
        ]);

        return redirect()->back->with('sucess', 'Produto Cadastrado com sucesso');

    }

    public function atualizar($id){
        $produto = Produto::findOrFail($id);
        return view('atualizar', compact('produto'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nome' => 'required|string|max:255',
            'valor' => 'required|string|max:255',
            'cor' => 'required|string|max:255'
        ]);

        $produto = Produto::findOrFail($id);

        $produto->nome= $request->nome;
        $produto->valor= $request->valor;
        $produto->cor= $request->color;

        $produto->save();
        return redirect()->back()->with('sucess', 'Produto atualizado com sucesso!');
    }
}