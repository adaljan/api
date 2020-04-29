<?php

namespace App\Api;

Class ApiFuncoes{

    // Função que retorna o Json padrão de retorno
    public static function JsonRetorno($mensagem, $codigo, $erro, $dados){

        $retorno = [
            'erro'     => $erro,    
            'mensagem' => $mensagem, 
            'codigo'   => $codigo,
            'dados'    => $dados
        ];
        return response()->json($retorno);
    }

}

