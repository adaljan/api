<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class tipo_produtoController extends Controller
{

    private $tipo_produto;

    public function __construct(\App\tipo_produto $tipo_produto){

        $this->tipo_produto = $tipo_produto;
    }

    // Método que mostra todos os tipo_produto
    public function all(){
        
        $dados = $this->tipo_produto->paginate(15);
        if(!$dados){
            $mensagem = 'Nenhum Tipo de Produto Encontrado!';  
            return \App\Api\ApiFuncoes::JsonRetorno($mensagem, 404, false, []); 
        }else{
            $mensagem = 'Tipo de Produto Encontrados!';  
            return \App\Api\ApiFuncoes::JsonRetorno($mensagem, 201, false, $dados);
        } 
        return response()->json($dados);
    }

    // Método que busca um tipo_produto específico
    public function show($id){
        
        $tipoProduto = $this->tipo_produto->find($id); 
        if(!$tipoProduto){
            $mensagem = 'Tipo de Produto Não Encontrado!';  
            return \App\Api\ApiFuncoes::JsonRetorno($mensagem, 404, false, []); 
        }else{
            $mensagem = 'Tipo de Produto Encontrado!';  
            return \App\Api\ApiFuncoes::JsonRetorno($mensagem, 201, false, $tipoProduto);
        } 
        return response()->json($dados);
    }

    // Método para cadastrar um novo tipo_produto
    public function cadastro(Request $request){
        
        $tipoProdutoDados = $request->all();

        try{
            
            $this->tipo_produto->create($tipoProdutoDados);
        
            // Parâmetros de retorno
            $mensagem = 'Tipo de Produto Incluído com Sucesso!';  
            return \App\Api\ApiFuncoes::JsonRetorno($mensagem, 201, false, $tipoProdutoDados);
        
        }catch(\Exception $e){

            if (config('app.debug')){ # Se estiver com o debug ativo retorna a mensagem de erro.
                $mensagem = $e->getMessage();  
            }else{
                $mensagem = 'ERRO ao incluir Tipo de Produto!'; 
            }
            return \App\Api\ApiFuncoes::JsonRetorno($mensagem, 0001, true, $tipoProdutoDados); 
        }

    }

    // Método para atualizar um tipo_produto
    public function atualizar(Request $request, $id){
        
        $tipoProdutoDados = $request->all();

        try{
        
            
            $tipoProduto = $this->tipo_produto->find($id); // Busca o cadastro
            $tipoProduto->update($tipoProdutoDados);  // atualiza o cadastro
            
            // Parâmetros de retorno
            $mensagem = 'Tipo de Produto Atualizado com Sucesso!';  
            return \App\Api\ApiFuncoes::JsonRetorno($mensagem, 201, false, $tipoProdutoDados);
        
        }catch(\Exception $e){

            if (config('app.debug')){ # Se stiver com o debug ativo retorna a mensagem de erro.
                $mensagem = $e->getMessage();  
            }else{
                $mensagem = 'ERRO ao Atualizar Tipo de Produto!'; 
            }
            return \App\Api\ApiFuncoes::JsonRetorno($mensagem, 0002, true, $tipoProdutoDados); 
        }

    }

    // Método para Excluir um tipo_produto
    public function delete(\App\tipo_produto $id){
        
        try{

            $id->delete();
            
            // Parâmetros de retorno
            $mensagem = 'Tipo de Produto '.$id->nome.' Excluído com Sucesso!';  
            return \App\Api\ApiFuncoes::JsonRetorno($mensagem, 200, false, $id);

        }catch(\Exception $e){

            if (config('app.debug')){ # Se estiver com o debug ativo retorna a mensagem de erro.
                $mensagem = $e->getMessage();  
            }else{
                $mensagem = 'ERRO ao Excluir Tipo de Produto!'; 
            }
            return \App\Api\ApiFuncoes::JsonRetorno($mensagem, 0001, true, $id); 
        }
    }
    
}
