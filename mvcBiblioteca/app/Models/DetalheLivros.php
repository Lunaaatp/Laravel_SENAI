<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalheLivros extends Model{
    protected $table = 'DetalheLivros';

    protected $fillable = [
        'descricao',
        'custo',
        'preco_venda',
        'impostos'
    ];

    public function livro(){
        return $this->belongsTo(Livro::class);
    }
}