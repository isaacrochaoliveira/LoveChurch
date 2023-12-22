<?php 

namespace app\controllers;

use app\core\Controller;
use app\models\service\Service;
use app\models\service\FuncionariosService;
use app\core\Flash;
use NumberFormatter;

class FuncionariosController extends Controller {
	/**
	 * Parâmetro Responsável por retornar uma nome da minha tabela de funcionários
	 * @var string $tabela
	 */
	private $tabela = 'funcionarios';

	/**
	 * Parâmetro Responsável por retornar o nome da minha chave primária da tabela
	 * @var string $id
	 */
	private $id = 'id_funcionario';

	/**
	 * Método Responsável por carregar a minha index e uma lista de funcionarios cadastrados
	 */
	public function index() {
		$dados['funcionarios'] = FuncionariosService::select("SELECT * FROM $this->tabela;");
		$dados['view'] = 'Funcionarios/Index';

		$this->load("template", $dados);
	}

	/**
	 * Método Responsável por carregar minha view de cadastro
	 */
	public function create() {
		$dados['view'] = 'Funcionarios/Create';

		$this->load("template", $dados);
	}

	/**
	 * Método Responsável por saalvar os dados do funcionário na respectiva tabela
	 */
	public function salvar() {
		$funcionario = new \stdClass();

		$funcionario->nome = isset($_POST['nome']) ? $_POST['nome'] : '';
		$funcionario->email = isset($_POST['email']) ? $_POST['email'] : '';
		$funcionario->telefone = isset($_POST['telefone']) ? $_POST['telefone'] : '';
		$funcionario->cpf = isset($_POST['cpf']) ? $_POST['cpf'] : 0;
		$funcionario->endereco = isset($_POST['endereco']) ? $_POST['endereco'] : '';
		$funcionario->chave_pix = isset($_POST['chave_pix']) ? $_POST['chave_pix'] : '';
		$funcionario->cargo = isset($_POST['cargo']) ? $_POST['cargo'] : '';
		$funcionario->obs = isset($_POST['obs']) ? trim($_POST['obs']) : "";
		$funcionario->data = Date('Y-m-d');

		FuncionariosService::salvar($funcionario, $this->id, $this->tabela);
		$this->redirect(URL_BASE . 'funcionarios');
	}
	
	/**
	 * Método Responsável carregar a view de edição para o adm editar os dados
	 * @param integer $id
	 */
	public function edit($id) {
		$dados['funcionario'] = FuncionariosService::select("SELECT * FROM $this->tabela WHERE $this->id = '$id'");

		$dados['view'] = 'Funcionarios/Edit';

		$this->load("template", $dados);
	}

	/**
	 * Método Responsável por salvar a edição dos dados do funcionário
	 * @param integer $id
	 */
	public function salvaredit($id) {
		$funcionario = new \stdClass();

		$funcionario->id_funcionario = $id;
		$funcionario->nome = isset($_POST['nome']) ? $_POST['nome'] : '';
		$funcionario->email = isset($_POST['email']) ? $_POST['email'] : '';
		$funcionario->telefone = isset($_POST['telefone']) ? $_POST['telefone'] : '';
		$funcionario->cpf = isset($_POST['cpf']) ? $_POST['cpf'] : 0;
		$funcionario->endereco = isset($_POST['endereco']) ? $_POST['endereco'] : '';
		$funcionario->chave_pix = isset($_POST['chave_pix']) ? $_POST['chave_pix'] : '';
		$funcionario->cargo = isset($_POST['cargo']) ? $_POST['cargo'] : '';
		$funcionario->obs = isset($_POST['obs']) ? trim($_POST['obs']) : "";
		$funcionario->data = Date('Y-m-d');

		FuncionariosService::salvar($funcionario, $this->id, $this->tabela);
		$this->redirect(URL_BASE . 'funcionarios');
	}

	/**
	 * Método Reponsável por excluir determinado funcionário que o Adm quizer
	 * @param integer $id
	 */
	public function delete($id) {
		$dados['fun'] = FuncionariosService::select("SELECT * FROM $this->tabela WHERE $this->id = '$id'");

		FuncionariosService::delete($this->tabela, $this->id, $id);
		Flash::setMsg("Funcionário " . $dados['fun'][0]->nome . " Excluído com Sucesso!", -1);
		$this->redirect(URL_BASE . "funcionarios");
	}
}
