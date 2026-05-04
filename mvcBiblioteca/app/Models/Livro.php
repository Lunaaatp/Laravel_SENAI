<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Livro extends Model{
    protected $fillable = [
        'nome',
        'autor',
        'descricao',
        'num_paginas',
        'data_public',
        'editora_id',
    ];

    public function editora(){
        return $this->belongsTo(Editoras::class);
    }

    public function DetalheLivros(){
      return $this->hasOne(DetalheLivros::class);
   }
}