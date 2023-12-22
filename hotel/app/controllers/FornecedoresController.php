<?php 


namespace app\controllers;

use app\core\Controller;
use app\models\service\Service;
use app\models\service\FornecedoresService;
use app\core\Flash;
use NumberFormatter;

class FornecedoresController extends Controller {
	/**
	 * Parâmetro Responsável por retornar o nome da minha tabela
	 * @var string $tabela
	 */
	private $tabela = 'fornecedores';

	/**
	 * Parâmetros Responsável por retornar o nome da minha chave primária da tabela
	 * @var string $id
	 */
	private $id = 'id_fornecedores';

	/**
	 * Método Responsável por carregar a minha index e listar os forncedores cadastrados
	 */
	public function index() {
		$dados['fornecedores'] = FornecedoresService::select("SELECT * FROM $this->tabela;");

		$dados['view'] = 'Fornecedores/Index';

		$this->load("template", $dados);
	}

	/**
	 * Método Responsável por carregar a tela de editção o fornecedor já salvo
	 * @param integer $id
	 */
	public function edit($id) {
		$dados['fornecedor'] = FornecedoresService::select("SELECT * FROM $this->tabela WHERE $this->id = '$id'");
		$dados['view'] = 'Fornecedores/Edit';

		$this->load("template", $dados);
	}

	/**
	 * Método Responsável por carregar a minha view de criação de fornecedoress
	 */
	public function create() {
		$dados['view'] = 'Fornecedores/Create';

		$this->load("template", $dados);
	}

	/**
	 * Método Responsável por salvar os dados do novo fornecedor
	 */
	public function salvar() {
		$fornecedor = new \stdClass();

		$fornecedor->nome = isset($_POST['nome']) ? $_POST['nome'] : '';
		$fornecedor->telefone = isset($_POST['telefone']) ? $_POST['telefone'] : '';
		$fornecedor->email = isset($_POST['email']) ? $_POST['email'] : '';
		$fornecedor->endereco = isset($_POST['endereco']) ? $_POST['endereco'] : '';
		$fornecedor->data = Date('Y-m-d');
		$fornecedor->chave_pix = isset($_POST['chave_pix']) ? $_POST['chave_pix'] : '';

		FornecedoresService::salvar($fornecedor, $this->id, $this->tabela);
		$this->redirect(URL_BASE . 'fornecedores');
	}

	/**
	 * Método Responsável por salvar os dados editados do fornecedor
	 * @param integer $id
	 */
	public function salvaredit($id) {
		$fornecedor = new \stdClass();

		$fornecedor->id_fornecedores = $id;
		$fornecedor->nome = isset($_POST['nome']) ? $_POST['nome'] : '';
		$fornecedor->telefone = isset($_POST['telefone']) ? $_POST['telefone'] : '';
		$fornecedor->email = isset($_POST['email']) ? $_POST['email'] : '';
		$fornecedor->endereco = isset($_POST['endereco']) ? $_POST['endereco'] : '';
		$fornecedor->data = Date('Y-m-d');
		$fornecedor->chave_pix = isset($_POST['chave_pix']) ? $_POST['chave_pix'] : '';

		FornecedoresService::salvar($fornecedor, $this->id, $this->tabela);
		$this->redirect(URL_BASE . 'fornecedores');
	}

	/**
	 * Método Responsável por excluir um determinado fornecedores
	 * @param integer $id
	 */
	public function delete($id) {
		$dados['for'] = FornecedoresService::select("SELECT * FROM $this->tabela WHERE $this->id = '$id'");

		FornecedoresService::delete($this->tabela, $this->id, $id);
		Flash::setMsg("Fornecedor " . $dados['for'][0]->nome . " Excluído Com Sucesso");
		$this->redirect(URL_BASE . 'fornecedores');
	}
}