<?php
// estou no LivroController.php
namespace App\Http\Controllers;
use App\Models\Funcionario;
use App\Models\Departamento;
use App\Models\Info;

use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    public function listar(){
        $funcionarios = Funcionario::with('departamento','info')->get();
        return view('listar', compact('funcionarios'));
    }

    public function cadastro(){
        $departamentos = Departamento::get();
        return view('cadastro', compact('departamentos'));
    }

    public function add(Request $request){

        $request->validate([
            'nome' =>'required|string|max:255',
            'cargo' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'data_admissao' => 'required|date',
            'salario' => 'nullable|numeric|max:255',
            'sobrenome' => 'required|string|max:255',
            
        ]);

        $Funcionarios = Funcionario::create([
            'nome' => $request->nome,
            'cargo' => $request->cargo,
            'email' => $request->email,
            'data_admissao' => $request->data_admissao,
            'salario' => $request->salario,
            'sobrenome' => $nullable->sobrenome,
            'departamento_id' => $request->departamento_id
        ]);

        Info::create([
            'funcionario_id' => $request->funcionario_id,
            'CPF' => $request->CPF,
            'RG' => $request->RG,
            'data_nascimento' => $request->data_nascimento,
            'CEP' => $request->CEP
        ]);



        return redirect()->back()->with('success','Funcionario Cadastrado com sucesso!');

    }

    public function atualizar($id){
        $funcionarios = Funcionario::with('detalhe')->findOrFail($id);
        $departamentos = Departamento::get();
        return view('atualizar', compact('funcionario','departamentos'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nome' =>'required|string|max:255',
            'cargo' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'data_admissao' => 'required|date',
            'salario' => 'nullable|numeric|max:255',
            'sobrenome' => 'required|string|max:255',
        ]);

        $funcionario = Funcionario::findOrFail($id);
        $info = Info::where('funcionario_id',$funcionario->id)->first();

        $funcionario->nome = $request->nome; 
        $funcionario->cargo = $request->cargo;
        $funcionario->email = $request->email;
        $funcionario->data_admissao = $request->data_admissao;
        $funcionario->salario = $request->salario;
        $funcionario->sobrenome = $request->sobrenome;

        $info->funcionario_id = $request->funcionario_id;
        $info->CPF = $request->CPF;
        $info->RG = $request->RG;
        $info->data_nascimento = $request->data_nascimento;
        $info->CEP = $request->CEP;

        $funcionario->save();
        $info->save();
        return redirect()->back()->with('success','Informações atualizadas com suceso');
    }
}