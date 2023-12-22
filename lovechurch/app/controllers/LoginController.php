<?php 

namespace app\controllers;

use app\core\Controller;
use app\models\service\Service;
use app\core\Flash;

class LoginController extends Controller {
	 /**
	  * Método Responsável por chamar a minha página de login
	  */
	 public function index() {
	 	$dados['view'] = 'Login/Index';

	 	$this->load("login");
	 }
}