<?php
namespace App\Http\Controllers;
use App\Models\Livro;
use App\Models\Editoras;
use App\Models\DetalheLivros;
use Illuminate\Http\Request;

class LivroController extends Controller {
    public function listar(){
        $livros = Livro::with(['editora', 'DetalheLivros']) ->get();
        return view('listarLivros', compact('livros'));
    }

    public function cadastro(){
        $editoras = Editoras::get();
        return view('cadastroLivro', compact('editoras'));
    }

    public function add(Request $request){

        $request->validate([
            'nome' => 'required|string|max:200',
            'autor' => 'required|string|max:200',
            'descricao' => 'required|string|max:500',
            'num_paginas' => 'required|numeric',
            'data_public' => 'required|date ',
            'editora_id' => 'nullable|exists::editoras,id'
        ]);

        $livro = Livro::create([
            'nome' => $request->nome,
            'autor' => $request->autor,
            'descricao' => $request->descricao,
            'num_paginas' => $request->num_paginas,
            'data_public' => $request->data_public,
        ]);

        DetalheLivros::create([
            'custo' => $request->custo,
            'preco_venda' => $request->preco_venda,
            'impostos' =>  $request->impostos
        ]);

        return redirect()->back()->with('success','Livro Cadastrado com sucesso!');
    }
    
    public function atualizar($id){
        $livro = Livro::findOrFail($id);
        $editoras = Editora::get();

        return view('atualizarLivro', compact('livro', 'editora'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nome' => 'required|string|max:200',
            'autor' => 'required|string|max:200',
            'descricao' => 'required|string|max:500',
            'num_paginas' => 'required|numeric',
            'data_public' => 'required|numeric',
            'editora_id' => 'nullable|exists::editoras,id'
        ]);

    $livro = Livro::findOrFail($id);
    $detalhe = DetalheLivros::where('livro_id', $livro->id)->first();

    $livro->nome = $request->nome;
    $livro->autor = $request->autor;
    $livro->descricao = $request->descricao;
    $livro->num_paginas = $request->num_paginas;
    $livro->data_public = $request->data_public;
    $livro->editora_id =$request->editora_id;

    $livro->save();

    $detalhe->custo = $request->custo;
    $detalhe->preco_venda = $request->preco_venda;
    $detalhe->impostos =  $request->impostos;

    $detalhe->save();

    return redirect()->back()->with('success','Livro atualizado com suceso');
    }

    public function deletar($id){
        $livro = Livro::findOrFail($id);
        $detalhe = DetalheLivros::where('livro_id', $livro->id)->first();
        $livro->delete();
        $detalhe->deletar();

        return redirect()->route('livro.listar')
            ->with('sucess', 'Livro excluído com sucesso!');
    }
}