<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Editoras extends Model{
    protected $fillable = [
        'id',
        'nome',
        'cnpj',
        'pais',
        'cidade'
    ];

    public function livro(){
        return $this->hasMany(Livros::class);
    }
}