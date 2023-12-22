<?php 

namespace app\models\service;

use app\models\validacao\LoginValidacao;

class LoginService {
	/**
	 * Método Para Verificar se o usuário tem mesmo uma conta
	 * @param \stdClass $login
	 */
	public static function checkStd($login) {

		$validateEmail = LoginValidacao::ValidationLogin($login);
		if ($validateEmail == 'Email Inválido') {
			return false;
		} else {
			$dados = self::select("SELECT * FROM usuarios WHERE email = '$login->email'");

			if (count($dados) > 0) {
				if (password_verify($login->senha, $dados[0]->senha)) {
					return $dados;
				} else {
					return false;
				}
			} else {
				return false;
			}
		}
	}

	/**
	 * Método Responsável por enviar um determinado SQL para a execução e retornar seu resultado
	 * @param string $sql
	 * @param boolean $eh_lista
	 */
 	public static function select($sql, $eh_lista = true) {
        return Service::select($sql, $eh_lista);
    }
}