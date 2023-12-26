<?php

namespace app\controllers;

use app\core\Controller;
use app\models\service\Service;
use app\models\service\PraysgService;

use app\core\Flash;

class PraysgController extends Controller {
	/**
	 * Pârametro Responsável por carregar o nome da tabela desta página
	 * @var string $table
	 */
	private $table = 'pray_group';

	 /**
	 * Parâmetro Responsável por carregar o nome da chave primária da tabela desta página
	 * @var string $id
	 */
	private $id = 'id_praygroup';

	/**
	 * Método Responsável por carregar a index e os grupos de oração cadastrados
	 */
	public function index() {
		$dados['grupos'] = PraysgService::select("SELECT * FROM $this->table");
		$dados['view'] = 'Grupo_Oracao/Index';

		$this->load("template", $dados);
	}

	/**
	 * Método Responsável por carregar a visualização de criação de criação de grupos
	 */
	public function create() {
		$dados['view'] = 'Grupo_Oracao/Create';

		$this->load("template", $dados);
	}

	/**
	 * Método Responsável por salvar as informações do grupo, titulo, descrição e versículo base
	 */
	public function salvar() {
		$pray = new \stdClass();

		$pray->nome_grupo = isset($_POST['nome']) ? $_POST['nome'] : '';
		$pray->descricao_grupo = isset($_POST['descricao']) ? $_POST['descricao'] : '';
		$pray->versiculobase_group = isset($_POST['versiculo_base']) ? $_POST['versiculo_base'] : '';
		$pray->participando_grupo = 0;
		$pray->saiu_grupo = 0;
		$pray->data_group = Date('Y-m-d');
		$pray->hora_grupo = Date('H:m:s');
		$pray->foto_grupo = 'foto-indisponivel.jpg';
		$pray->id_usuario = $_SESSION['id'];

		PraysgService::salvar($pray, $this->id, $this->table);
		Flash::setMsg('Grupo Cadastrado Com Sucesso!');
		$this->redirect(URL_BASE . 'praysg');
	}

	/**
	 * Método Responsável por carregar a view de configuração do grupo
	 * @param integer $id_group
	 */
	public function config($id_group) {
		$dados['grupo'] = PraysgService::select("SELECT * FROM $this->table WHERE $this->id = '$id_group'");
		if ($dados['grupo'][0]->foto_grupo == 'foto-indisponivel.jpg') {
			$dados['path'] = 'assets/img/'.$dados['grupo'][0]->foto_grupo;
		} else {
			$dados['path'] = 'assets/img/praysgroups/'.$dados['grupo'][0]->foto_grupo;
		}
		$dados['view'] = 'Grupo_Oracao/Config';

		$this->load("template", $dados);
	}

	/**
	 * Método Responsável por fazer o upload da imagem de perfil do grupo
	 * @param integer $id
	 */
	public function upphoto($id) {
		$pray = new \stdClass();

		$dados['grupo'] = PraysgService::select("SELECT * FROM $this->table WHERE $this->id = '$id'");
		$img = $dados['grupo'][0]->foto_grupo;

		PraysgService::unload($img, 'assets/img/praysgroups/');

		$imagem = $_FILES['banner'];

		$img = PraysgService::analisarimg($imagem, 'assets/img/praysgroups/', 'foto-indisponivel.jpg');

		$pray->id_praygroup = $id;
		$pray->foto_grupo = $img;

		PraysgService::salvar($pray, $this->id, $this->table);
		Flash::setMsg("New Image Uploaded!");
		$this->redirect(URL_BASE . 'praysg/config/' . $id);
	}

	/**
	 * Método Responsável por carregar a view para o Dono do Grupo cirar as suas regras
	 * @param integer $id
	 */
	public function rules($id) {
		$dados['grupo'] = $id;
		$dados['view'] = 'Grupo_Oracao/Rules';

		$this->load("template", $dados);
	}

	/**
	 * Método Responsável por salvar as regras feitas pelo adm do grupo
	 * @param integer $id
	 */
	 public function rule($id) {
		 $rules = new \stdClass();

		 $rules->id_praygroup = $id;
		 $rules->id_usuario = $_SESSION['id'];
		 for ($key = 0; $key < 18; $key++) {
			 $rules->rules_text = isset($_POST['r' . $key]) ? $_POST['r' . $key] : '';

			 if ($rules->rules_text != "") {
				 PraysgService::salvar($rules, 'id_rules', 'pray_group_rules');
			 }
		 }
		 Flash::setMsg("All the rules was updated successfully");
		 $this->redirect(URL_BASE . 'praysg/config/' . $id);

	 }
}
