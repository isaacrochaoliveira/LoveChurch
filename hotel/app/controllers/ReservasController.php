<?php

namespace app\controllers;

use app\core\Controller;
use app\models\service\Service;
use app\models\service\ReservasService;
use app\core\Flash;
use NumberFormatter;

class ReservasController extends Controller
{

    /**
     * Variável responsável por identificar minha tabela
     * @var string $tabela
     */
    private $tabela = 'reservas';

    /**
     * Variável responsável por identificar a minha chave primária da tabela
     * @var string $id
     */
    private $id = 'id_reserva';

    /**
     * variável Responsável por definir de qual pais e moeda se representará
     * @var string $langMoney
     */
    private $langMoney = 'pt_BR';

    /**
     * Método Responsável por redenrizar a view index
     */
    public function index()
    {
        $dados['lista'] = Service::lista($this->tabela);
        $quarto = $this->getRoomNumber($dados['lista']);

        $dados['hospede'] = Service::lista($this->tabela, 'hospedes', 'hospede', 'id');

        $dados['quarto'] = $quarto;
        $dados['pgto_form'] = Service::lista($this->tabela, 'formas_pgto', 'forma_pgto', 'id');
        $dados['view'] = "Reservas/Index";
        $dados['padrao'] = numfmt($this->langMoney);

        $this->load('template', $dados);
    }

    /**
     * Método Responsável por editar uma reserva já feita
     * @param integer $id_reserva
     */
    public function edit($id_reserva)
    {
        // Solicita os dados para o BD
        $dados['lista'] = ReservasService::select("SELECT * FROM $this->tabela WHERE $this->id = '$id_reserva'");

        // Recebe os dados do form se o Adm muda-lás se não pega as informações que o Adm tinha cadastrado antes
        $reservas = new \stdClass();
        $reservas->check_out = isset($_POST['check_out_create']) ? $_POST['check_out_create'] : $dados['lista'][0]->check_out;
        $reservas->check_in = isset($_POST['check_in_create']) ? $_POST['check_in_create'] : $dados['lista'][0]->check_in;

        // Pega o tipo de quarto e a forma de pagamento cadastradas
        $tipo_quarto = $dados['lista'][0]->tipo_quarto;
        $pgto = $dados['lista'][0]->forma_pgto;

        // Nome do Hóspede
        $dados['hospedes_load'] = $this->search((int) $dados['lista'][0]->hospede);

        // Pega o número do quarto com base no tipo cadastrado
        $dados['quartos'] = $this->getRoomNumber($dados['lista'], true);

        // Faz um cáculo com base no date de check_in e no de check_out e o valor da diaria e do desconto, com base nisso calculo o valor 
        // da minha reserva 
        $dados['calculo'] = $this->cash($reservas->check_in, $reservas->check_out, (float) $dados['lista'][0]->valor_diaria, $dados['lista'][0]->desconto);

        // Valor da Diaria com base no tipo de quarto do hóspede
        $dados['valor_diaria'] = $this->moneyPerDay($dados['lista'][0]->tipo_quarto, true);

        // Solicidade o tipo de quarto do hóspede
        $dados['tipos'] = ReservasService::select("SELECT * FROM categorias_quartos WHERE id = '$tipo_quarto'");

        // Solicita a forma de pagamento 
        $dados['pgto'] = ReservasService::select("SELECT * FROM formas_pgto WHERE id = '$pgto'");

        // Esse padrao será usado para converter os número para o real
        $dados['padrao'] = numfmt($this->langMoney);

        // Datas de Check-In e Check-Out cadastrados ou se o usuário muda-lás
        $dados['check_in'] = $reservas->check_in;
        $dados['check_out'] = $reservas->check_out;

        // Desconto recebido
        $dados['desconto'] = $dados['lista'][0]->desconto;

        // Pasta e nome do arquivo que vão aparecer essas informações
        $dados['view'] = 'Reservas/Edit';

        // Carrega a view e passa os dados para ela para serem usados
        $this->load('template', $dados);
    }

    /**
     * Método Responsável por salvar os dados da reserva do hóspede
     * @param integer $id_reserva
     */
    public function salvar($id_reserva = 0)
    {
        $reservas = new \stdClass();
        $receber = new \stdClass();
        $detalhes = new \stdClass();

        if ($id_reserva != 0) {
            $reservas->id = $id_reserva;
            $reservas->check_in = isset($_POST['check_in']) ? $_POST['check_in'] : '0000-00-00';
            $reservas->check_out = isset($_POST['check_out']) ? $_POST['check_out'] : '0000-00-00';
            $reservas->valor_diaria = isset($_POST['valor_diaria_current']) ?  $_POST['valor_diaria_current'] : '0.00';
            $reservas->valor = isset($_POST['valor_reserva_current']) ? $_POST['valor_reserva_current'] : '0.00';
            $reservas->no_show = isset($_POST['valor_entrada']) ? $_POST['valor_entrada'] : 0.00;
            $reservas->desconto = isset($_POST['desconto']) ? $_POST['desconto'] : '0.00';
        } else {
            $reservas->hospede = isset($_POST['hospede']) ? $_POST['hospede'] : 0;
            $reservas->tipo_quarto = isset($_POST['tipo_quarto']) ? $_POST['tipo_quarto'] : 0;
            $reservas->quarto = isset($_POST['quarto']) ? $_POST['quarto'] : 0;
            $reservas->forma_pgto = isset($_POST['pgto']) ? $_POST['pgto'] : 0;
            $reservas->check_in = isset($_POST['check_in']) ? $_POST['check_in'] : '0000-00-00';
            $reservas->check_out = isset($_POST['check_out']) ? $_POST['check_out'] : '0000-00-00';
            $reservas->valor_diaria = isset($_POST['valor_diaria_current']) ?  $_POST['valor_diaria_current'] : '0.00';
            $reservas->valor = isset($_POST['valor_reserva_current']) ? $_POST['valor_reserva_current'] : '0.00';
            $reservas->no_show = isset($_POST['valor_entrada']) ? $_POST['valor_entrada'] : 0.00;
            $reservas->hospedes = isset($_POST['quant_hospedes']) ? $_POST['quant_hospedes'] : 0;
            $reservas->desconto = isset($_POST['desconto']) ? $_POST['desconto'] : '0.00';
            $reservas->data = Date('Y-m-d');
        }

        $id_reserva =  ReservasService::salvar($reservas, $this->id, $this->tabela);
        $id_receber = $this->saveStdReceber($receber, $reservas->hospede, $id_reserva);
        $this->saveStdDetalhes($detalhes, $reservas->hospede, $id_reserva, $reservas->valor, $reservas->check_out, $id_receber);

        Flash::setForm($reservas);
        $this->redirect(URL_BASE . "reservas");
    }

    /**
     * Método Responsável por chamar a view cadastro
     */
    public function create()
    {
        $reservas = new \stdClass();
        $reservas->name = isset($_POST["nome_hospede"]) ? $_POST['nome_hospede'] : '';
        $reservas->tipo_quarto = isset($_POST['tipo_quarto_create']) ? $_POST['tipo_quarto_create'] : '';
        $reservas->check_in = isset($_POST['check_in_create']) ? $_POST['check_in_create'] : Date('Y-m-d');
        $reservas->check_out = isset($_POST['check_out_create']) ? $_POST['check_out_create'] : Date('Y-m-d');
        $reservas->desconto = isset($_POST['desconto_create']) ? (float) $_POST['desconto_create'] : (float) 0;

        $dados['valor_diaria'] = $this->moneyPerDay($reservas->tipo_quarto, true);
        $reservas->diaria = $dados['valor_diaria'];

        $dados['nome_salvo']  = $reservas->name;
        $dados['RoomChoose'] = $reservas->tipo_quarto;
        $dados['check_in'] = $reservas->check_in;
        $dados['check_out'] = $reservas->check_out;
        $dados['desconto'] = $reservas->desconto;

        $dados['hospedes_load'] = $this->search($reservas->name);
        $dados['quartos'] = $this->room($reservas->tipo_quarto);

        $dados['calculo'] = $this->cash($reservas->check_in, $reservas->check_out, (float) $reservas->diaria, $reservas->desconto);
        $dados['valor_diaria'] = $this->moneyPerDay($reservas->tipo_quarto, true);

        $dados['tipos'] = Service::lista('categorias_quartos');
        $dados['pgto'] = Service::lista('formas_pgto');
        $dados['padrao'] = numfmt($this->langMoney);
        $dados['view'] = 'Reservas/Create';

        $this->load('template', $dados);
    }

    /**
     * Método Responsável por pesquisar hóspedes por nome
     * @param string $name
     */
    private function search($value)
    {
        if (is_string($value)) {
            if (!($value == "")) {
                return ReservasService::search($value, 'hospedes', 'nome');
            } else {
                return [];
            }
        } else {
            if (is_integer($value)) {
                return ReservasService::select("SELECT * FROM hospedes WHERE id = '$value'");
            }
        }
    }

    /**
     * Método Responsável por pesquisar os quartos disponíveis correspondente ao tipo
     * @param integer $tipo_quarto
     */
    private function room($tipo_quarto)
    {
        if (!($tipo_quarto == "")) {
            return ReservasService::get('quartos', ['available', 'tipo'], ['Y', $tipo_quarto], true);
        } else {
            return [];
        }
    }

    /**
     * Método Responsável por calcular o valor da reserva tendo a data de check_in e check_out
     * @param string $check_in
     * @param string $check_out
     * @param float $daria
     * @param float $desconto
     */
    private function cash($check_in, $check_out, float $diaria, $desconto)
    {
        $no_show = 0;
        $diferenca = strtotime($check_out) - strtotime($check_in);
        $dias = floor($diferenca / (60 * 60 * 24));
        if ($dias == 0) {
            $dias = 1;
        }

        $valor_reserva = $diaria * $dias - $desconto;
        $vlr_no_show = ($valor_reserva * $no_show) / 100;

        return $valor_reserva;
    }

    /**
     * Método Responsável por pegar o valor da diária correspondente ao seu tipo de quarto
     * @param integer $tipo_quarto
     */
    private function moneyPerDay($tipo_quarto, $eh_lista = true)
    {
        $obj = ReservasService::select("SELECT valor FROM categorias_quartos WHERE id = '$tipo_quarto'", $eh_lista);
        foreach ($obj as $x) {
            $valor = (float) $x->valor;
        }
        return isset($valor) ? $valor : 0.00;
    }

    /**
     * Método Responsável por análisar a reserva e pegar o número do quarto do hospede
     * @param \StdClass $list 
     */
    public function getRoomNumber($lista, $getId = false)
    {
        $quartos = [];
        foreach ($lista as $reserva) {
            $q = ReservasService::select("SELECT * FROM quartos WHERE tipo = '$reserva->tipo_quarto' AND id_quartos = '$reserva->quarto'", true);
            if (!($getId)) {
                array_push($quartos, $q[0]->numero);
            } else {
                array_push($quartos, $q[0]->id_quartos, $q[0]->numero);
            }
        }
        return $quartos;
    }

    /**
     * Método Responsável por carregar a página de checkIn com todos os dados até o momento
     * @param integer $id_reserva
     */
    public function checkin($id_reserva)
    {
        $dados['lista'] = ReservasService::select("SELECT * FROM $this->tabela WHERE $this->id = '$id_reserva'");

        $quarto = $this->getRoomNumber($dados['lista']);

        $dados['hospede'] = Service::lista($this->tabela, 'hospedes', 'hospede', 'id');
        $dados['quarto'] = $quarto;
        $dados['pgto_form'] = Service::lista($this->tabela, 'formas_pgto', 'forma_pgto', 'id');
        $dados['view'] = "Reservas/CheckIn";
        $dados['padrao'] = numfmt($this->langMoney);


        $this->load('template', $dados);
    }

    /**
     * Método Responsável por carregar a página de visualização do checkout para dar saída
     * @param integer $id_reserva 
     */
    public function checkout($id_reserva)
    {
        $dados['lista'] = ReservasService::select("SELECT * FROM $this->tabela WHERE $this->id = '$id_reserva'");

        $quarto = $this->getRoomNumber($dados['lista']);

        $dados['hospede'] = Service::lista($this->tabela, 'hospedes', 'hospede', 'id');
        $dados['quarto'] = $quarto;
        $dados['pgto_form'] = Service::lista($this->tabela, 'formas_pgto', 'forma_pgto', 'id');
        $dados['view'] = "Reservas/CheckOut";
        $dados['padrao'] = numfmt($this->langMoney);

        $this->load('template', $dados);
    }

    /**
     * Método Responsável por salvar o checkIn assim que o adm confirmar-lá na tela de resumo do check-in
     * @param integer $id_reserva
     */
    public function salvarcheckin($id_reserva)
    {
        $reservas = new \stdClass();
        $reservas->id_reserva = $id_reserva;
        $reservas->hora_checkin = Date('H:i:s');

        Flash::setForm($reservas);
        if (ReservasService::salvar($reservas, $this->id, $this->tabela)) {
            $this->redirect(URL_BASE . "reservas");
        } else {
            if (!$reservas->id) {
                $this->redirect(URL_BASE . "hospedes/create");
            } else {
                $this->redirect(URL_BASE . "hospedes/edit/" . $reservas->id);
            }
        }
    }

    /**
     * Método Responsável por Salvar o CheckOut assim que o Adm confirmar a saída do Hóspede
     * @param integer $id_reserva
     */
    public function salvarcheckout($id_reserva)
    {
        $dados['reserva'] = ReservasService::select("SELECT * FROM $this->tabela WHERE $this->id = '$id_reserva'");
        $valor = $dados['reserva'][0]->valor;
        $consumo = $dados['reserva'][0]->consumo_entrada + $dados['reserva'][0]->consumo;

        $reservas = new \stdClass();
        $reservas->id_reserva = $id_reserva;
        $reservas->hora_checkout = Date('H:i:s');
        $reservas->no_show = $valor;
        $reservas->consumo = $consumo;

        Flash::setForm($reservas);
        if (ReservasService::salvar($reservas, $this->id, $this->tabela)) {
            $this->redirect(URL_BASE . "reservas");
        } else {
            if (!$reservas->id) {
                $this->redirect(URL_BASE . "hospedes/create");
            } else {
                $this->redirect(URL_BASE . "hospedes/edit/" . $reservas->id);
            }
        }
    }

    /**
     * Método Responsável por carregar a view de entradas seja de consumo ou dse reserva
     * @param integer $id_reserva
     */
    public function entradas($id_reserva)
    {
        $dados['lista'] = ReservasService::select("SELECT * FROM $this->tabela, produtos WHERE $this->id = '$id_reserva'");
        $quarto = $this->getRoomNumber($dados['lista']);

        $dados['consumos'] = $dados['lista'][0]->consumo_entrada;
        $dados['reservas'] = '0,00';

        $dados['consumo'] = ReservasService::select("SELECT * FROM consumos, produtos WHERE consumos.id_produto = produtos.id_produto");

        $dados['hospede'] = ReservasService::select("SELECT * FROM $this->tabela, hospedes WHERE $this->tabela.hospede = hospedes.id AND $this->tabela.id_reserva = '$id_reserva'");
        $dados['pgto_form'] = Service::lista($this->tabela, 'formas_pgto', 'forma_pgto', 'id');

        $dados['quarto'] = $quarto;
        $dados['view'] = "Reservas/Entradas";
        $dados['padrao'] = numfmt($this->langMoney);

        $this->load('template', $dados);
    }

    /**
     * Método Responsável por pegar e dar entradas no consumos ou reservas
     * @param integer $id_reserva
     */
    public function entradasin($id_reserva)
    {
        $reservas = new \stdClass();

        $dados['lista'] = ReservasService::select("SELECT * FROM $this->tabela WHERE $this->id = '$id_reserva'");
        $consumos = isset($_POST['consumos']) ? (float) $_POST['consumos'] : 0.00;
        $no_show = isset($_POST['reservas']) ? (float) $_POST['reservas'] : 0.00;

        $reservas->id_reserva = $id_reserva;
        $reservas->no_show = $no_show + $dados['lista'][0]->no_show;
        $reservas->consumo = $dados['lista'][0]->consumo - $consumos;
        $reservas->consumo_entrada = $dados['lista'][0]->consumo_entrada + $consumos;

        Flash::setForm($reservas);
        if (ReservasService::salvar($reservas, $this->id, $this->tabela)) {
            $this->redirect(URL_BASE . "reservas/entradas/$id_reserva");
        }
    }

    /**
     * Método responsável por excluir uma reserva sem ter feito checkIn
     * @param integer $id_reserva
     */
    public function delete($id_reserva)
    {
        $dados['lista'] = ReservasService::select("SELECT * FROM $this->tabela WHERE $this->id = '$id_reserva'");

        if ($dados['lista'][0]->hora_checkin == '00:00:00') {
            if (ReservasService::delete($this->tabela, $this->id, $id_reserva) > 0) {
                $this->index();
            }
        } else {
            echo "Não Possível excluir esta reserva!";
        }
    }

    /**
     * Método Responsável por adcionar na tabela receber o filtro do hóspede
     * @param \stdClass $receber
     * @param integer $id_hospede
     * @param integer $id_reserva
     */
    public function saveStdReceber($receber, $id_hospede, $id_reserva)
    {
        $exs = ReservasService::select("SELECT * FROM receber WHERE hospede = " . $id_hospede);

        if (count($exs) == 0) {
            $receber->hospede = $id_hospede;
            $receber->id_reserva = $id_reserva;

            $id_receber = ReservasService::salvar($receber, 'id_receber', 'receber');
        }
        return $id_receber;
    }

    /**
     * Método Responsável por adiocionar as contas do hóspede na tabela de detalhes
     * @param \stdClass $detalhes
     * @param integer $id_hospede
     * @param integer $reserva
     * @param float $valor
     * @param string $data_venc
     * @param integer $id_receber
     */
    public function saveStdDetalhes($detalhes, $id_hospede, $reserva, $valor, $data_venc, $id_receber)
    {

        $detalhes->id_receber = $id_receber;
        $detalhes->id_hospede = $id_hospede;
        $detalhes->descricao_detalhes = 'Reserva Feita';
        $detalhes->valor_detalhes = $valor;
        $detalhes->data_lanc = Date("Y-m-d");
        $detalhes->data_venc = $data_venc;
        $detalhes->id_reserva = $reserva;
        $detalhes->pago = 'Não';

        ReservasService::salvar($detalhes, 'id_detalhes', 'detalhes');

        $detalhes->id_receber = $id_receber;
        $detalhes->id_hospede = $id_hospede;
        $detalhes->descricao_detalhes = 'Consumos';
        $detalhes->valor_detalhes = 0.00;
        $detalhes->data_lanc = Date("Y-m-d");
        $detalhes->data_venc = $data_venc;
        $detalhes->id_reserva = $reserva;
        $detalhes->pago = 'Não';

        ReservasService::salvar($detalhes, 'id_detalhes', 'detalhes');
    }
}
