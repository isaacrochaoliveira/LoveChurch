<?php
namespace app\models\validacao;

use app\core\Validacao;

class QuartoValidacao{

    public static function salvar($hospedes){
        $validacao = new Validacao();
        
        $validacao->setData("nome", $hospedes->nome);
        //$validacao->setData("cpf", $hospedes->cpf);
       // $validacao->setData("cep", $hospedes->cep);
        //$validacao->setData("bairro", $hospedes->bairro);
       // $validacao->setData("cidade", $hospedes->cidade);
       
      
        
        //fazendo a validação
        $validacao->getData("nome")->isVazio();
       // $validacao->getData("cpf")->isVazio();
        //$validacao->getData("cep")->isVazio();
        //$validacao->getData("bairro")->isVazio();
        //$validacao->getData("cidade")->isVazio();
        return $validacao;
        
    }
    
}