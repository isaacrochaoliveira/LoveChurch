<?php 

namespace app\models\validacao;

use app\core\Validacao;

class LoginValidacao {
    public static function ValidationLogin($login){

        if (filter_var($login->email, FILTER_VALIDATE_EMAIL)) {
            return 'Email Válido';
        } else {
            return 'Email Inválido!';
        }

    }
}