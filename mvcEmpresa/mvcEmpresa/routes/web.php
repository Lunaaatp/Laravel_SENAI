<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\DepartamentoController;

Route::get('/', function () {
    return view('welcome');
});

// GET - listar os usuários cadastrados
Route::get('/funcionario/listar',[FuncionarioController::class, 'listar'])->
name('funcionario.listar');

Route::get('/funcionario/cadastrar',[FuncionarioController::class, 'cadastro']
)->name('funcionario.cadastro');


// POST - enviar os dados para cadastrar livros
Route::post('/funcionario/salvar',[FuncionarioController::class, 'add'])
->name('funcionario.salvar');

// Tela de Atualizar
Route::get('/funcionario/{id}/atualizar', [FuncionarioController::class, 'atualizar'])
->name('funcionario.atualizar');

Route::put('/funcionario/{id}/update',[FuncionarioController::class, 'update'])
->name('funcionario.update');

// ROTAS DA EDITORA

// GET - listar os usuários cadastrados
Route::get('/departamento/listar',[DepartamentoController::class, 'listar'])->
name('departamento.listar');

Route::get('/departamento/cadastrar', function(){ 
    return view('cadastroDepartamento');
})->name('departamento.cadastro');

Route::post('/departamento/salvar',[DepartamentoController::class, 'add'])
->name('departamento.salvar');