<?php

namespace app\controllers;

use app\core\Controller;
use app\models\service\Service;
use app\core\Flash;
use app\models\service\HospedesService;

class HospedesController extends Controller
{
    /**
     * Parâmetro Responsável por retornar o nome da tabela de hóspedes
     * @var string $tabela
     */
    private $tabela = 'hospedes';

    /**
     * Parâmetro Responsável por retornar o nome da chave primária da tabela de hóspedes
     * @var string $id
     */
    private $id = 'id';

    /**
     * Parâmetro Responsável por formatar a moeda para o nosso país
     * @var string $langMoney;
     */
    private $langMoney = 'pt_BR';

    /**
     * Método Responsável por carrgear a index da tela principal
     */
    public function index()
    {
        $dados['lista'] = [];
        $dados['view'] = "Hospedes/Index";

        $this->load("template", $dados);
    }

    /**
     * Método Responsável por retornar a minha view de cadastro
     */
    public function create() {
        $dados['view'] = 'Hospedes/Create';

        $this->load("template", $dados);
    }

    /**
     * Método Responsável por carregar a view de edição dos dados do hóspedes
     * @param integer $id
     */
    public function edit($id) {
        $dados['hospede'] = HospedesService::select("SELECT * FROM $this->tabela WHERE $this->id = '$id'");
        $dados['view'] = 'Hospedes/Edit';

        $this->load("template", $dados);
    }

    /**
     * Método Responsável por salvar os dados do hóspede
     */
    public function salvar() {
        $hospede = new \stdClass();

        $hospede->nome = isset($_POST['nome']) ? $_POST['nome'] : '';
        $hospede->email = isset($_POST['email']) ? $_POST['email'] : '';
        $hospede->telefone = isset($_POST['telefone']) ? $_POST['telefone'] : ''; 
        $hospede->endereco = isset($_POST['endereco']) ? $_POST['endereco'] : '';
        $hospede->cpf = isset($_POST['documento']) ? $_POST['documento'] : '';
        $hospede->data = Date('Y-m-d');
        $hospede->responsavel = isset($_POST['responsavel']) ? $_POST['responsavel'] : 'Sim';
        $hospede->placa = isset($_POST['placa']) ? $_POST['placa'] : '';
        $hospede->bairro = isset($_POST['bairro']) ? $_POST['bairro'] : '';
        $hospede->cidade = isset($_POST['cidade']) ? $_POST['cidade'] : '';
        $hospede->estado = 'GO';
        $hospede->cep = isset($_POST['cep']) ? $_POST['cep'] : '';
        $hospede->nacionalidade = isset($_POST['nacionalidade']) ? $_POST['nacionalidade'] : '';
        $hospede->Profissao = isset($_POST['profissao']) ? $_POST['profissao'] : '';
        $hospede->InscricaoEstadual = isset($_POST['ie']) ? $_POST['ie'] : '';
        $hospede->cnpj = isset($_POST['cnpj']) ? $_POST['cnpj'] : '';
        $hospede->obs  = isset($_POST['obs']) ? $_POST['obs'] : '';

        HospedesService::salvar($hospede, $this->id, $this->tabela);
        $this->redirect(URL_BASE . 'hospedes');
    }

    /**
     * Método Responsável por salvar a edição do ADM
     * @param integer $id
     */
    public function salvaredit($id) {
        $hospede = new \stdClass();

        $hospede->id = $id;
        $hospede->nome = isset($_POST['nome']) ? $_POST['nome'] : '';
        $hospede->email = isset($_POST['email']) ? $_POST['email'] : '';
        $hospede->telefone = isset($_POST['telefone']) ? $_POST['telefone'] : ''; 
        $hospede->endereco = isset($_POST['endereco']) ? $_POST['endereco'] : '';
        $hospede->cpf = isset($_POST['documento']) ? $_POST['documento'] : '';
        $hospede->data = Date('Y-m-d');
        $hospede->responsavel = isset($_POST['responsavel']) ? $_POST['responsavel'] : 'Sim';
        $hospede->placa = isset($_POST['placa']) ? $_POST['placa'] : '';
        $hospede->bairro = isset($_POST['bairro']) ? $_POST['bairro'] : '';
        $hospede->cidade = isset($_POST['cidade']) ? $_POST['cidade'] : '';
        $hospede->estado = 'GO';
        $hospede->cep = isset($_POST['cep']) ? $_POST['cep'] : '';
        $hospede->nacionalidade = isset($_POST['nacionalidade']) ? $_POST['nacionalidade'] : '';
        $hospede->Profissao = isset($_POST['profissao']) ? $_POST['profissao'] : '';
        $hospede->InscricaoEstadual = isset($_POST['ie']) ? $_POST['ie'] : '';
        $hospede->cnpj = isset($_POST['cnpj']) ? $_POST['cnpj'] : '';
        $hospede->obs  = isset($_POST['obs']) ? $_POST['obs'] : '';

        HospedesService::salvar($hospede, $this->id, $this->tabela);
        $this->redirect(URL_BASE . 'hospedes');
    }

    /**
     * Método Responsável por procurar o nome com base no input do Adm
     */
    public function namesearch()
    {
        $nome = isset($_POST['hospede']) ? $_POST['hospede'] : '';

        if (!($nome == "")) {
            $nome = trim($nome);
        }

        $dados["lista"] = HospedesService::names($nome, 'nome', $this->tabela, 1);

        $dados["view"]  = "Hospedes/Index";
        $this->load("template", $dados);
    }

    /**
     * Método Responsável por excluir um determinado hóspede
     * @param integer $id
     */
    public function delete($id) {
        HospedesService::delete($id, $this->id, $this->tabela);
        Flash::setMsg("Hóspede Excluído Com Sucesso!");
        $this->redirect(URL_BASE . 'hospedes');
    }

    /**
     * Método Responsável por carregar a view para fazer upload de arquivos
     * @param integer $id
     */
    public function files($id) {
        $dados['hospedes'] = HospedesService::select("SELECT * FROM $this->tabela WHERE $this->id = '$id'");
        $dados['view'] = 'Hospedes/Documents';

        $this->load("template", $dados);
    }

    /**
     * Método Responsável por salvar o documentos que o Adm colocou para o Hóspede
     * @param integer $id
     */
    public function savefile($id) {
        $hospedes = new \stdClass();

        $dados['hospede'] = HospedesService::select("SELECT * FROM $this->tabela WHERE $this->id = '$id'");

        $nome = isset($_POST['nome_arquivo']) ? $_POST['nome_arquivo'] : '';
        $file = $_FILES['arquivo_hospede'];

        $image = HospedesService::analisarimg($file, 'assets/documents/hospedes/', 'sem-foto.jpg');

        $hospedes->nome_arquivo_hos = $nome;
        $hospedes->arquivo_hos = $image;
        $hospedes->data_cad_hos = Date('Y-m-d');
        $hospedes->id_hospede = $id;

        HospedesService::salvar($hospedes, 'id_arquivo_hos', 'arquivos_hospedes');
        Flash::setMsg("Arquivo Importando com Sucesso para " . $dados['hospede'][0]->nome);
        $this->redirect(URL_BASE . 'hospedes');
    }

    /**
     * Método Responsável por carregar a visualização dos arquivos do hóspedes
     * @param integer $id
     */
    public function viewfiles($id) {
        $dados['arquivos'] = HospedesService::select("SELECT * FROM arquivos_hospedes WHERE id_hospede = '$id'");
        $dados['imgs'] = HospedesService::rightimgs($dados['arquivos']);
        $dados['view'] = 'Hospedes/Arquivos';

        $this->load("template", $dados);
    }

    /**
     * Método Responsável por excluir o arquivo do hóspede
     * @param integer $id
     */
    public function deletefile($id) {

        $dados['hospede'] = HospedesService::select("SELECT * FROM arquivos_hospedes WHERE id_arquivo_hos = '$id'");

        HospedesService::delete($id, 'id_arquivo_hos', 'arquivos_hospedes');
        Flash::setMsg("Doocumento Excluído com Sucesso!");
        $this->redirect(URL_BASE . 'hospedes/viewfiles/' . $dados['hospede'][0]->id_hospede);
    }

    /**
     * Método Responsável por verificar se o hóspede tem ou não uma reserva cadastrada na agenda
     * @param integer $id
     */
    public function reservas($id) {
        $dados['reservas'] = HospedesService::select("SELECT * FROM reservas, hospedes WHERE hospede = '$id' AND reservas.hospede = hospedes.id");
        $dados['padrao'] = numfmt($this->langMoney);
        $dados['view'] = 'Hospedes/Reservas';

        $this->load("template", $dados);
    }

    /**
     * Método Responsável por pegar todas as informações do hóspede selecionado
     * @param integer $id
     */
    public function info($id) {
        $dados['info'] = HospedesService::select("SELECT * FROM $this->tabela WHERE $this->id = '$id'");
        $dados['view'] = 'Hospedes/Info';

        $this->load("template", $dados);
    }
}
