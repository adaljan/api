<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipo_produto extends Model
{
    protected $fillable=[
        'nome','descricao','ativo','excluido','usuario_cadastro','usuario_alteracao'
    ];

}
