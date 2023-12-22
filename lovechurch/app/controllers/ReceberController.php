<?php

namespace app\controllers;

use app\core\Controller;
use app\models\service\Service;
use app\models\service\ReceberService;
use app\core\Flash;
use NumberFormatter;

class ReceberController extends Controller
{
    /**
     * Parâmetro Responsável por retornar o nome da minha tabela
     * @var string $tabela
     */
    private $tabela = 'receber';

    /**
     * Parâmetro Responsável por retornar o nome da chave primária da minha tabela
     * @var string $id
     */
    private $id = 'id_receber';

    /**
     * Parâmetro Responsável por retornar o nome da tabela de detalhes das contas receber
     * @var string $tabelaDetalhes
     */
    private $tabelaDetalhes = 'detalhes';

    /**
     * Parâmetros Responsável por retornar a nome da chave primária de detalhes das contas
     * @var string $tabelaDetalhesId
     */
    private $tabelaDetalhesId = 'id_detalhes';

    /**
     * Parâmetro Responsável por colocar o dinheiro Real Brasileiro
     * @var string $langMoney
     */
    private $langMoney = 'pt_BR';

    private $nome = '';

    /**
     * Método Responsável por carregar a minha index
     */
    public function index()
    {
        $dados['receber'] = ReceberService::select("SELECT * FROM $this->tabela, hospedes, reservas WHERE $this->tabela.hospede = hospedes.id AND $this->tabela.id_reserva = reservas.id_reserva");
        $dados['detalhes'] = ReceberService::getDetalhes($dados['receber']);

        $dados['total_contas'] = ReceberService::getTotal($dados['receber']);

        $dados['padrao'] = numfmt($this->langMoney);
        $dados['view'] = 'Receber/Index';

        $this->load("template", $dados);
    }

    /**
     * Método Responsável pegar as contas dos hóspedes que não tem uma reserva cadastrada
     */
    public function semreservas()
    {
        $dados['receber'] = ReceberService::select("SELECT * FROM $this->tabela, hospedes WHERE $this->tabela.id_reserva = 0 AND hospedes.id = $this->tabela.hospede");
        // $dados['receber'] = ReceberService::select("SELECT * FROM $this->tabelaDetalhes, $this->tabela, hospedes WHERE $this->tabelaDetalhes.id_hospede = hospedes.id AND $this->tabela.id_reserva = $this->tabelaDetalhes.id_reserva AND $this->tabelaDetalhes.id_reserva = 0");

        $dados['detalhes'] = ReceberService::getDetalhes($dados['receber']);

        $dados['total_contas'] = ReceberService::getTotal($dados['receber']);

        $dados['padrao'] = numfmt($this->langMoney);
        $dados['view'] = 'Receber/ContasSemReservas';

        $this->load("template", $dados);
    }

    /**
     * Método Responsável por carregar minha view de criação de contas a receber
     */
    public function create()
    {
        $dados['padrao'] = numfmt($this->langMoney);
        $dados['view'] = 'Receber/Create';

        $this->load('template', $dados);
    }


    /**
     * Método Responsável por editar uma conta já cadastrada
     * @param integer $id_detalhes
     */
    public function edit($id_detalhes)
    {
        $dados['hospede'] = ReceberService::select("SELECT * FROM $this->tabelaDetalhes, hospedes WHERE $this->tabelaDetalhesId = '$id_detalhes' AND $this->tabelaDetalhes.id_hospede = hospedes.id");
        $dados['view'] = 'Receber/Edit';

        $this->load("template", $dados);
    }

    /**
     * Método Responsável por carregar a view de criação para um hóspede que já tem conta cadastrada
     * @param integer $id_hospede
     */
    public function createbill($id_hospede)
    {

        $dados['hospede'] = ReceberService::select("SELECT * FROM hospedes WHERE id = '$id_hospede'");

        $dados['view'] = 'Receber/CreateBill';

        $this->load("template", $dados);
    }

    /**
     * Método Responsável por salvar a conta do hóspede com ou sem reserva cadastrada
     * @param integer $id_hospede
     */
    public function salvarbill($id_hospede)
    {
        $detalhes = new \stdClass();

        $receberDados = ReceberService::select("SELECT * FROM receber WHERE hospede = '$id_hospede'");

        $detalhes->id_receber = $receberDados[0]->id_receber;
        $detalhes->id_hospede = $id_hospede;
        $detalhes->descricao_detalhes = isset($_POST['descricao']) ? $_POST['descricao'] : '';
        $detalhes->valor_detalhes = isset($_POST['valor']) ? $_POST['valor'] : 0.00;
        $detalhes->data_lanc = Date('Y-m-d');
        $detalhes->data_venc = isset($_POST['data_venc']) ? $_POST['data_venc'] : Date('Y-m-d');
        $detalhes->obs = isset($_POST['obs']) ? $_POST['obs'] : '';
        $detalhes->pago = 'Não';
        $detalhes->id_reserva = $receberDados[0]->id_reserva;

        $details = ReceberService::SemReservas($id_hospede, 'ID da tabela Hospedes');

        ReceberService::salvar($detalhes, 'id_detalhes', 'detalhes');
        $this->redirect(URL_BASE . 'receber/' . $details . '/' . $id_hospede);
    }

    /**
     * Método Responsável por salvar a edição da minha conta receber do hóspede
     * @param integer $id_detalhes
     */
    public function editbill($id_detalhes) {
        $detalhes = new \stdClass();

        $dados['hospede'] = ReceberService::select("SELECT * FROM $this->tabelaDetalhes WHERE $this->tabelaDetalhesId = '$id_detalhes'");

        $detalhes->id_detalhes = $id_detalhes;
        $detalhes->descricao_detalhes = isset($_POST['descricao']) ? $_POST['descricao'] : '';
        $detalhes->valor_detalhes = isset($_POST['valor']) ? $_POST['valor'] : 0.00;
        $detalhes->obs = isset($_POST['obs']) ? $_POST['obs'] : '';
        $detalhes->data_venc = isset($_POST['data_venc']) ? $_POST['data_venc'] : Date('Y-m-d');

        $details = ReceberService::SemReservas($dados['hospede'][0]->id_hospede, 'ID da tabela Hospedes');

        ReceberService::salvar($detalhes, 'id_detalhes', 'detalhes');
        $this->redirect(URL_BASE . 'receber/' . $details . '/' . $dados['hospede'][0]->id_hospede);
    }

    /**
     * Método Responsável por pesquisar o nome do hóspede segundo o adm colou no campo hóspede
     */
    public function search()
    {
        $nome = isset($_POST['hospede']) ? $_POST['hospede'] : '';

        $dados['hospedes'] = ReceberService::search($nome, 'hospedes', 'nome');
        $dados['view'] = 'Receber/Create';

        $this->load("template", $dados);
    }

    /**
     * Método Responsável por salvar as informações da conta 
     */
    public function salvar()
    {
        $receber = new \stdClass();
        $detalhes = new \stdClass();

        $hospede = isset($_POST['nome']) ? $_POST['nome'] : 0;
        $descricao = isset($_POST['descricao']) ? $_POST['descricao'] : '';
        $valor = isset($_POST['valor']) ? $_POST['valor'] : 0.00;
        $data_venc = isset($_POST['data_venc']) ? $_POST['data_venc'] : '';
        $obs = isset($_POST['obs']) ? $_POST['obs'] : '';

        $ext = ReceberService::existeReservaouReceber($hospede);
        $details = ReceberService::SemReservas($hospede, 'ID da tabela Hospedes');

        if (count($ext) > 0) {
            Flash::setMsg("O Hóspede Selecionado tem conta cadastrada. Vamos colocar você dentro da página dele!", -1);
            $this->redirect(URL_BASE . "receber/" . $details . '/' . $hospede);
        }

        $dados = [
            'nome' => $hospede,
            'descricao' => $descricao,
            'valor' => $valor,
            'data_venc' => $data_venc,
            'obs' => $obs
        ];

        $id_receber = $this->SaveStdReceber($receber, $dados);
        $this->saveStdDetalhes($detalhes, $dados, $id_receber);
        $this->redirect(URL_BASE . "receber/semreservas");
    }

    /**
     * Método Responsável por carregar a view de detalhes das contas relacionadas pelo id do hóspedes
     * @param integer $id_hospede
     */
    public function details($id_hospede)
    {
        $dados['detalhes'] = ReceberService::select("SELECT * FROM $this->tabelaDetalhes, hospedes, reservas, quartos WHERE $this->tabelaDetalhes.id_hospede = '$id_hospede' AND $this->tabelaDetalhes.id_hospede = hospedes.id AND $this->tabelaDetalhes.id_reserva = reservas.id_reserva AND reservas.tipo_quarto = quartos.tipo AND reservas.quarto = quartos.id_quartos");
        $dados['arquivos'] = ReceberService::getArquivos($dados['detalhes']);

        $dados['padrao'] = numfmt($this->langMoney);
        $dados['view'] = 'Receber/Detalhes';

        $this->load("template", $dados);
    }

    /**
     * Método Responsável por por carregar a view de detalhes dos hóspedes que nçao tem  uma reserva feita
     * @param integer $id_hospede
     */
    public function detailssem($id_hospede)
    {
        $dados['detalhes'] = ReceberService::select("SELECT * FROM $this->tabelaDetalhes, hospedes WHERE $this->tabelaDetalhes.id_hospede = '$id_hospede' AND $this->tabelaDetalhes.id_hospede = hospedes.id AND $this->tabelaDetalhes.id_reserva = 0");
        $dados['arquivos'] = ReceberService::getArquivos($dados['detalhes']);

        $dados['padrao'] = numfmt($this->langMoney);
        $dados['view'] = 'Receber/Detalhes';

        $this->load("template", $dados);
    }

    /**
     * Método Responsável por incluir arquivos para o Adm em uma conta 
     * @param integer $id_detalhes
     */
    public function files($id_detalhes)
    {
        $dados['detalhes'] = ReceberService::select("SELECT * FROM $this->tabelaDetalhes, hospedes WHERE $this->tabelaDetalhesId = '$id_detalhes' AND $this->tabelaDetalhes.id_hospede = hospedes.id");
        $dados['arquivos'] = ReceberService::select("SELECT * FROM arquivos WHERE id_detalhes = '$id_detalhes'");

        $dados['padrao'] = numfmt($this->langMoney);
        $dados['view'] = 'Receber/Arquivos';

        $this->load('template', $dados);
    }

    /**
     * Método Responsável por filtrar as contas que irão aparecer na tela de hóspedes com reserva
     */
    public function billsfilter()
    {

        $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
        $quarto = isset($_POST['quarto']) ? $_POST['quarto'] : '';

        $dados['receber'] = ReceberService::FilterBills($nome, $quarto);

        $dados['detalhes'] = ReceberService::getDetalhes($dados['receber']);

        $dados['total_contas'] = ReceberService::getTotal($dados['receber']);

        $dados['padrao'] = numfmt($this->langMoney);
        $dados['view'] = 'Receber/Index';

        $this->load("template", $dados);
    }

    /**
     * Método Responsável por filtrar as contas que irão aparecer na tela de hóspedes com reserva
     */
    public function billsfilters()
    {

        $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
        $quarto = isset($_POST['quarto']) ? $_POST['quarto'] : '';

        $dados['receber'] = ReceberService::FilterBills($nome, $quarto, 0);

        $dados['detalhes'] = ReceberService::getDetalhes($dados['receber']);

        $dados['total_contas'] = ReceberService::getTotal($dados['receber']);

        $dados['padrao'] = numfmt($this->langMoney);
        $dados['view'] = 'Receber/ContasSemReservas';

        $this->load("template", $dados);
    }

    /**
     * Método Responsável por salvar o arquivo que o Adm deseja na tabela correspondente
     * @param integer $id_detalhes
     */
    public function file($id_detalhes)
    {
        $arquivo = new \stdClass();

        $hospedes = ReceberService::select("SELECT id_hospede FROM detalhes WHERE id_detalhes = '$id_detalhes'");

        $document = $_FILES['arquivo_receber'];

        $nomeDocument = ReceberService::analisarimg($document, 'assets/img/receber/', 'sem-foto.jpg');

        if ($nomeDocument == 'sem-foto.jpg') {
            Flash::setMsg('Extenção Não Permitida. Tente Outra', -1);
            $this->redirect(URL_BASE . "receber/files/" . $id_detalhes);
        }

        $arquivo->nome_arquivo = isset($_POST['nome_arquivo']) ? $_POST['nome_arquivo'] : '';
        $arquivo->descricao_arquivo = '';
        $arquivo->arquivo = $nomeDocument;
        $arquivo->data_cad = Date('Y-m-d');
        $arquivo->id_detalhes = $id_detalhes;

        $details = ReceberService::SemReservas($id_detalhes);
        Flash::setForm($arquivo);
        if (ReceberService::salvar($arquivo, 'id_arquivo', 'arquivos')) {
            Flash::setMsg('Arquivo Carregado Com Sucesso!');
            $this->redirect(URL_BASE . "receber/" . $details . '/' . $hospedes[0]->id_hospede);
        } else {
            if (!$arquivo->id) {
                $this->redirect(URL_BASE . "hospedes/create");
            } else {
                $this->redirect(URL_BASE . "hospedes/edit/" . $arquivo->id);
            }
        }
    }

    /**
     * Método Responsável por carregar a view para o Adm poder visualizar todos os arquivo que ele carregou
     * @param integer $id_detalhes
     */
    public function views($id_detalhes)
    {

        $dados['arquivos'] = ReceberService::select("SELECT * FROM arquivos WHERE id_detalhes = '$id_detalhes'");

        $dados['corretaImg'] = ReceberService::corretaImg($dados['arquivos']);

        $dados['view'] = 'Receber/Views';

        $this->load("template", $dados);
    }

    /**
     * Método Responsável por definir a exclusão do arquivo que o ADm selecionou
     * @param integer $id_arquivo 
     */
    public function delfile($id_arquivo)
    {

        $detalhes = ReceberService::select("SELECT * FROM arquivos WHERE id_arquivo = '$id_arquivo'");

        $this->unlinkDocument('assets/img/receber/', $detalhes[0]->arquivo);

        ReceberService::delete("arquivos", 'id_arquivo', $id_arquivo);

        $this->redirect(URL_BASE . 'receber/views/' . $detalhes[0]->id_detalhes);
    }

    /**
     * Método Responsável por pagar um conta do hóspede 
     * @param integer $id_detalhes
     */
    public function paybills($id_detalhes)
    {
        $detalhes = new \stdClass();
        $faturamento = new \stdClass();

        $dados['detalhes'] = ReceberService::select("SELECT * FROM detalhes WHERE id_detalhes = '$id_detalhes'");

        $details = ReceberService::SemReservas($id_detalhes);

        if ($dados['detalhes'][0]->pago == 'Sim') {
            Flash::setMsg("Conta já Paga!", -1);
            $this->redirect(URL_BASE . 'receber/' . $details . '/' . $dados['detalhes'][0]->id_hospede);
        }

        $detalhes->id_detalhes = $id_detalhes;
        $detalhes->pago = 'Sim';

        $faturamento = $this->createStdFaturamento($faturamento, $dados['detalhes']);

        Flash::setForm($detalhes);
        if (ReceberService::salvar($detalhes, 'id_detalhes', 'detalhes')) {
            ReceberService::salvar($faturamento, 'id_faturamento', 'faturamento');
            Flash::setMsg('Conta paga com Sucesso!');
            $this->redirect(URL_BASE . "receber/" . $details . '/' . $dados['detalhes'][0]->id_hospede);
        } else {
            if (!$detalhes->id) {
                $this->redirect(URL_BASE . "hospedes/create");
            } else {
                $this->redirect(URL_BASE . "hospedes/edit/" . $detalhes->id);
            }
        }
    }

    /**
     * Método Responsável por excluir uma conta existente
     * @param integer $id_detalhes
     */
    public function delete($id_detalhes)
    {
        $dados['detalhes'] = ReceberService::select("SELECT * FROM detalhes WHERE id_detalhes = '$id_detalhes'");

        $details = ReceberService::SemReservas($id_detalhes);

        if ($dados['detalhes'][0]->pago == 'Sim') {
            Flash::setMsg("Não Possível Excluir Conta Paga!", -1);
            $this->redirect(URL_BASE . 'receber/' . $details . '/' . $dados['detalhes'][0]->id_hospede);
        }

        ReceberService::delete("detalhes", 'id_detalhes', $id_detalhes);
    }

    /**
     * Método Responsável por deletar o document da pasta de receber
     * @param string $path
     * @param string $arquivo
     */
    public function unlinkDocument($path, $arquivo)
    {
        unlink($path . $arquivo);
    }

    /**
     * Método Responsável criar um Std e cadastrar o mesmo na tabela receber
     * @param \stdClass $receber
     * @param array $dados 
     */
    public function SaveStdReceber($receber, $dados)
    {
        $receber->hospede = $dados["nome"];
        $receber->id_reserva = 0;

        Flash::setForm($receber);
        $id_receber = ReceberService::salvar($receber, 'id_receber', 'receber');

        return $id_receber;
    }

    /**
     * Método Responsável or criar e salvar um Std na tabela detalhes
     * @param \stdClass $detalhes
     * @param array $dados
     * @param integer $id_receber
     */
    public function saveStdDetalhes($detalhes, $dados, $id_receber)
    {
        $detalhes->id_receber = $id_receber;
        $detalhes->id_hospede = $dados['nome'];
        $detalhes->descricao_detalhes = $dados["descricao"];
        $detalhes->valor_detalhes = $dados['valor'];
        $detalhes->data_lanc = Date("Y-m-d");
        $detalhes->data_venc = $dados['data_venc'];
        $detalhes->pago = 'Não';
        $detalhes->id_reserva = 0;

        ReceberService::salvar($detalhes, 'id_detalhes', 'detalhes');
    }

    /**
     * Método Responsável por criar um StdClass para a tabela de faturamento quanto o Adm paga uma conta a receber
     * @param \stdClass $faturamento
     * @param array $detalhes
     */
    public function createStdFaturamento($faturamento, $detalhes)
    {
        $faturamento->valor_faturamento = $detalhes[0]->valor_detalhes;
        $faturamento->data_faturamento = Date('Y-m-d');
        $faturamento->from_faturamento = $detalhes[0]->descricao_detalhes;
        $faturamento->id_hospede_fat = $detalhes[0]->id_hospede;

        return $faturamento;
    }
}
