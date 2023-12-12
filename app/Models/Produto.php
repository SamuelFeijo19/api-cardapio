<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'qtdEstoque', 'descricao', 'preco', 'tipo_produto_id'];
    protected $table = 'produto';

    public function tipoProduto()
    {
        return $this->belongsTo(TipoProduto::class, 'tipo_produto_id', 'id');
    }
}