<?php
// estou no EditoraController.php
namespace App\Http\Controllers;
use App\Models\Departamento;

use Illuminate\Http\Request;

class DepartamentoController extends Controller
{

    public function listar(){
        $query = Departamento::query();
        $departamento = $query->get();
        return view('listarDepartamento', compact('departamentos'));
    }

    public function add(Request $request){

        $request->validate([
            'nome' => 'required|string|max:255',
            'data_criacao' => 'required|date',
            'orcamento' => 'required|numeric|max:255',
            'sigla' => 'nullable|numeric|max:255'    
        ]);

        Departamento::create([
            'nome' => $request->nome,
            'data_criacao' => $request->data_criacao,
            'orcamento' => $request->orcamento,
            'sigla' => $request->sigla
        ]);

        return redirect()->back()->with('success','Departamento Cadastrada com sucesso!');

    }
}