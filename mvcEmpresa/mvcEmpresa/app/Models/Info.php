<?php
// Estou no arquivo Detalhe.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Info extends Model
{
    protected $fillable = [
        'funcionario_id',
        'CPF',
        'RG',
        'data_nascimento',
        'CEP'
    ];

    public function funcionario(){
        return $this->belongsTo(Funcionario::class);
    }
}