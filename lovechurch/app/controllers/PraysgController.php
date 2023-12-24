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
		$pray->foto_grupo = 'sem-foto.jpg';
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
		$dados['view'] = 'Grupo_Oracao/Config';

		$this->load("template", $dados);
	}
}