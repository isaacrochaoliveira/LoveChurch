<?php 

namespace app\models\validacao;

use app\core\Validacao;

class ProdutosValidacao {
    public static function salvar($produto){
        $validacao = new Validacao();
        
        return $validacao;
        
    }
}