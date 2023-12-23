<?php 

namespace app\controllers;

use app\core\Controller;
use app\models\service\LoginService;
use app\models\service\Service;
use app\core\Flash;

class LoginController extends Controller {
	 /**
	  * Método Responsável por chamar a minha página de login
	  */
	public function index() {
	 	$this->load("login");
 	}

 	/**
 	 * Método Responsável por Autenticação do Login
 	 */
 	public function checkall() {
 		$login = new \stdClass();

 		$login->email = isset($_POST['email']) ? $_POST['email'] : '';
 		$login->senha = isset($_POST['senha']) ? $_POST['senha'] : '';


 		$usuario = LoginService::checkStd($login);
 		if (!($usuario)) {
 			Flash::setMsg("Email Inválido!", -1);
 		}

 		if (is_array($usuario)) {
 			$this->createSession($usuario);
 			if (isset($_SESSION['id'])) {
				$this->redirect(URL_BASE . 'home'); 				
 			}
 		} else {
 			Flash::setMsg("Usuário e/ou Senha Incorretos!", -1);
 		}
 		Flash::setForm($login);

 		$dados['login'] = $login;
 		$this->load("login", $dados);
 	}

 	/**
 	 * Método Responsável por criar a sessão para o Usuário
 	 * @param array $usuario
 	 */
 	private function createSession($usuario) {
 		
 		$_SESSION['id'] = $usuario[0]->id_usuario;
 		$_SESSION['nome'] = $usuario[0]->nome;
 		$_SESSION['email'] = $usuario[0]->email;
 	}

 	/**
 	 * Método Responsável por fazer o logout do usuário
 	 */
 	public function logoff() {
 		unset($_SESSION['id']);
 		unset($_SESSION['nome']);
 		unset($_SESSION['email']);

 		session_destroy();

 		$this->redirect(URL_BASE . 'login');
 	}
}