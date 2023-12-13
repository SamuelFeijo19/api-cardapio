<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
    use HasFactory;
    protected $table = 'ingrediente';

    protected $fillable = ['nome'];

    public function produtos()
    {
        return $this->belongsToMany(Produto::class, 'ingrediente_produto', 'ingrediente_id', 'produto_id');
    }
}
