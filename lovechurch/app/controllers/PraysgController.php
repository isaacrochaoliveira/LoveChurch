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
		$dados['usuario'] = PraysgService::getEmailPath($dados['grupos']);
		$dados['rules'] = PraysgService::select("SELECT * FROM pray_group_rules;");
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
	 * Método Responsável por carregar a view de edição de dados de um grapo
	 * @param integer $id
	 */
	 public function edit($id) {
		 $dados['grupo'] = PraysgService::select("SELECT * FROM $this->table WHERE $this->id = '$id'");

		 $dados['view'] = 'Grupo_Oracao/Edit';
		 $this->load("template", $dados);
	 }

	 /**
	  *	Método Responsável por salvar a edição do adm do grupo de oração
	  * @param integer $id
	  */
	 public function edited($id) {
 	 	$pray = new \stdClass();

		$pray->id_praygroup = $id;
		$pray->nome_grupo = isset($_POST['nome']) ? $_POST['nome'] : '';
	  	$pray->descricao_grupo = isset($_POST['descricao']) ? $_POST['descricao'] : '';
	    $pray->versiculobase_group = isset($_POST['versiculo_base']) ? $_POST['versiculo_base'] : '';

  		PraysgService::salvar($pray, $this->id, $this->table);
  		Flash::setMsg('Your Group was edited successfully!');
	  	$this->redirect(URL_BASE . 'praysg');
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
		$pray->whatsapplink_grupo = isset($_POST['whatsapplink_grupo']) ? $_POST['whatsapplink_grupo'] : '';

		PraysgService::salvar($pray, $this->id, $this->table);
		Flash::setMsg('Your Group was created successfully!');
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
			$dados['path'] = 'assets/img/lovechurch/' . $_SESSION['email'] . '/' . $dados['grupo'][0]->foto_grupo;
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

		PraysgService::unload($img, 'assets/img/lovechurch'.$_SESSION['email'] . '/');

		$imagem = $_FILES['banner'];

		$img = PraysgService::analisarimg($imagem, 'assets/img/lovechurch/' . $_SESSION['email'] . '/', 'foto-indisponivel.jpg');

		$pray->id_praygroup = $id;
		$pray->foto_grupo = $img;

		PraysgService::salvar($pray, $this->id, $this->table);
		Flash::setMsg("New Image Uploaded!");
		$this->redirect(URL_BASE . 'praysg/config/' . $id);
	}

	/**
	* Método Responsável por salvar o banner do grupo de oração
	* @param integer $id
	*/
	public function upbanner($id) {
		$pray = new \stdClass();

		$dados['grupo'] = PraysgService::select("SELECT * FROM $this->table WHERE $this->id = '$id'");
		$img = $dados['grupo'][0]->banner_grupo;

		PraysgService::unload($img, 'assets/img/lovechurch/'.$_SESSION['email'] . '/');

		$imagem = $_FILES['banner'];

		$img = PraysgService::analisarimg($imagem, 'assets/img/lovechurch/' . $_SESSION['email'] . '/', 'foto-indisponivel.jpg');

		$pray->id_praygroup = $id;
		$pray->banner_grupo = $img;

		PraysgService::salvar($pray, $this->id, $this->table);
		Flash::setMsg("New Banner Uploaded!");
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

	 /**
	 * Método Responsável por carregar a view de entrada no grupo de oração
	 * @param string $id
	 */
	 public function joinin($id) {
		$dados['grupos'] = PraysgService::select("SELECT * FROM $this->table, usuarios WHERE $this->id = '$id' AND usuarios.id_usuario = $this->table.id_usuario");
		$dados['rules'] = PraysgService::select("SELECT * FROM pray_group_rules;");
		$dados['usuario'] = PraysgService::getEmailPath($dados['grupos']);
	 	$dados['view'] = 'Grupo_Oracao/Join';

	 	$this->load("template", $dados);
	 }

	 /**
	 * Método Responsável por ´da um block em um grupo de oração, fazendo ele não aparecer mais para o usuário logado
	 * @param integer $id
	 */
	 public function block($id) {
		 
	 }
}
