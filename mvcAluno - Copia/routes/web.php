<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\TurmaController;

Route::get('/', function () {
    return view('welcome');
});

// GET - listar os usuários cadastrados
Route::get('/produto/listar',[ProdutoController::class, 'listar'])->
name('produto.listar');

Route::get('/produto/cadastrar', function(){ 
    return view('cadastro');
})->name('produto.cadastro');

// POST - enviar os dados para cadastrar usuários
Route::post('/produto/salvar',[ProdutoController::class, 'add'])
->name('produto.salvar');

// Tela de Atualizar
Route::get('/produto/{id}/atualizar', [ProdutoController::class, 'atualizar'])
->name('produto.atualizar');

Route::put('/produto/{id}/update',[ProdutoController::class, 'update'])
->name('produto.update');

Route::delete('/produto/{id}',[ProdutoController::class, 'deletar'])
->name('produto.deletar');

// ROTAS DA TURMA

Route::get('/produto/cadastrar', function(){ 
    return view('cadastroTurma');
})->name('produto.cadastro');

Route::post('/produto/salvar',[ProdutoController::class, 'add'])
->name('produto.salvar');