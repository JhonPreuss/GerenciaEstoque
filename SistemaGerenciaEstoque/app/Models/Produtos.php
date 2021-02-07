<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_produto';
    protected $fillable = [
        'nome_produto',
        'descricao_produto',
        'SKU',
        'quantidade_produto'
    ];
}
