<?php

namespace app\controllers;

use app\core\Controller;
use app\models\service\Service;
use app\models\service\UsuariosService;
use app\core\Flash;
use NumberFormatter;

class UsuariosController extends Controller {
	/**
	 * Parâmetro Responsável por retornar o nome da minha tabela
	 * @var string $tabela
	 */
	private $tabela = "usuarios";

	/**
	 * Parâmetro Responsável por retornar o nome da minh achave primária
	 * @var string $id
	 */
 	private $id = 'id_usuario';

	 /**
	  * Método Responsável por carregar minha página index e listar usuários
	  */
  	public function index() {
	  	$dados['usuarios'] = UsuariosService::select("SELECT * FROM $this->tabela;");
	  	$dados['view'] = 'Usuarios/Index';

	  	$this->load("template", $dados);
  	} 

  	/**
  	 * Método Responsável por adcionar uma foto de perfil ao usuario
  	 * @param integer $id
  	 */
  	public function photo($id) {
  		$dados['usuario'] = UsuariosService::select("SELECT * FROM $this->tabela WHERE $this->id = '$id'");
  		$dados['view'] = 'Usuarios/Foto';

  		$this->load("template", $dados);
  	}

  	/**
  	 * Método Responsável por salvar a foto de perfil do usuário
  	 * @param integer $id
  	 */
  	public function profile($id) {
  		$usuario = new \stdClass();

  		$dados['usuario'] = UsuariosService::select("SELECT * FROM $this->tabela WHERE $this->id = '$id'");

  		$imagem = $_FILES['photo'];

  		$img = UsuariosService::analisarimg($imagem, 'assets/img/perfil/', 'sem-foto.jpg');

  		$usuario->id_usuario = $id;
  		$usuario->foto = $img;

  		UsuariosService::salvar($usuario, $this->id, $this->tabela);
  		Flash::setMsg("Foto Adcionada no perfil do Usuário ". $dados['usuario'][0]->nome . " Com Sucesso!");
  		$this->redirect(URL_BASE . 'usuarios');
  	}

  	/**
  	 * Método Responsável por excluir um usuário da tabela 
  	 * @param integer $id
  	 */
  	public function delete($id) {
  		$dados['usuario'] = UsuariosService::select("SELECT * FROM $this->tabela WHERE $this->id = '$id'");

  		UsuariosService::delete($this->tabela, $this->id, $id);
  		Flash::setMsg("Usuário " . $dados['usuario'][0]->nome . " Excluído Com Sucesso!");
  		$this->redirect(URL_BASE . 'usuarios');
  	}
}