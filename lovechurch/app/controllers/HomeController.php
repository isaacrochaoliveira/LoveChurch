<?php 

namespace app\controllers;

use app\core\Controller;
use app\models\service\Service;

class HomeController extends Controller {
	/**
	 * Método Responsável por carregar a minha index
	 */
	public function index() {
		$dados['view'] = 'Home/Index';

		$this->load("template", $dados);
	}
}