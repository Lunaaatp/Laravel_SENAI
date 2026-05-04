<?php
// Estou no arquivo Livro.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Funcionario extends Model
{
    protected $fillable = [
        'nome',
        'cargo',
        'email',
        'data_admissao',
        'salario',
        'sobrenome',
        'departamento_id '
    ];

    public function departamento(){
        return $this->belongsTo(departamento::class);
    }

    public function detalhe(){
        return $this->hasOne(Detalhe::class);
    }
}