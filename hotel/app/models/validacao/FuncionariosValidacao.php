<?php 

namespace app\models\validacao;

use app\core\Validacao;

class FuncionariosValidacao {
    public static function salvar($produto){
        $validacao = new Validacao();
        
        return $validacao;
        
    }
}