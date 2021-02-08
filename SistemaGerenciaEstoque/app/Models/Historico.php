<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historico extends Model
{
    use HasFactory;
    protected $table = "historico";
    protected $primaryKey = 'id_movimentacao';
    protected $fillable = [
        'data_movimentacao',
        'tipo_movimentacao',
        'metodo_movimentacao',
        'quantidade_movimentacao',
        'id_produto'
    ];
}
