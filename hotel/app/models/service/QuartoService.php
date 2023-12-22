<?php
namespace app\models\service;
use app\models\validacao\QuartoValidacao;

class QuartoService{
    public static function salvar($hospedes, $campo, $tabela){
        $validacao = QuartoValidacao::salvar($hospedes);
        return Service::salvar($hospedes, $campo, $validacao->listaErros(), $tabela);
    }

    

}