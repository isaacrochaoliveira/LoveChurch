<?php 

namespace app\controllers;

use app\core\Controller;
use app\models\service\Service;
use app\models\service\ProductsService;
use app\core\Flash;
use NumberFormatter;

class ProductsController extends Controller {
    
    /**
     * Nome da Tabela de Vendas de Produtos
     * @var string $tabela 
     */
    private $tabela = 'vendas_produtos';

    /**
     * Campo Principal da minha tabela (Campo chave Primária)
     * @var string $id
     */
    private $id = 'id_vp';

    /**
     * Usado para tronsformar as moedas para o nosso país
     */
    private $langMoney = 'pt_BR';

    public function index() {
        $dados['vendas'] = ProductsService::select("SELECT * FROM $this->tabela, reservas, quartos, hospedes, produtos WHERE $this->tabela.id_reserva = reservas.id_reserva AND reservas.tipo_quarto = quartos.tipo AND reservas.quarto = quartos.id_quartos AND hospedes.id = reservas.hospede AND produtos.id_produto = $this->tabela.produto");
        $dados['padrao'] = numfmt($this->langMoney);
        $dados['view'] = 'VendasProdutos/Index';

        $this->load("template", $dados);
    }

    /**
     * Método Responsável por filtrar os consumos que irão aparecer na tela
     */
    public function filter() {
        $tipo = isset($_POST['tipo_search']) ? $_POST['tipo_search'] : '';
        $value = isset($_POST['search']) ? $_POST['search'] : '';
        switch ($tipo) {
            case 'quarto':
                $dados['vendas'] = ProductsService::select("SELECT * FROM $this->tabela, reservas, quartos, hospedes WHERE $this->tabela.id_reserva = reservas.id_reserva AND reservas.tipo_quarto = quartos.tipo AND quartos.numero = '$value' AND hospedes.id = reservas.hospede");
                break;
            case 'id':
                $dados['vendas'] = ProductsService::select("SELECT * FROM $this->tabela, reservas, quartos, hospedes WHERE $this->tabela.id_reserva = reservas.id_reserva AND reservas.id_reserva = '$value' AND reservas.tipo_quarto = quartos.tipo AND reservas.quarto = quartos.id_quartos AND hospedes.id = reservas.hospede");
                break;
            case 'nome':
                $dados['vendas'] = ProductsService::select("SELECT * FROM $this->tabela, reservas, quartos, hospedes WHERE $this->tabela.id_reserva = reservas.id_reserva AND reservas.tipo_quarto = quartos.tipo AND reservas.quarto = quartos.id_quartos AND hospedes.id = reservas.hospede AND hospedes.nome LIKE '%$value%'");
                break;
            default:
                $dados['vendas'] = ProductsService::select("SELECT * FROM $this->tabela, reservas, quartos, hospedes WHERE $this->tabela.id_reserva = reservas.id_reserva AND reservas.tipo_quarto = quartos.tipo AND reservas.quarto = quartos.id_quartos AND hospedes.id = reservas.hospede");
        }
        $dados['padrao'] = numfmt($this->langMoney);
        $dados['view'] = "VendasProdutos/Index";

        $this->load("template", $dados);
    }

    /**
     * Método Responsável por carregar a tela de cadastro Nova Venda para o hóspede
     */
    public function create() {
        $dados['produtos'] = Service::lista("produtos");
        $dados['padrao'] = numfmt($this->langMoney);
        $dados['display'] = 'd-none';

        $dados['view'] = 'VendasProdutos/Create';

        $this->load("template", $dados);
    }

    /**
     * Método Responsável por lançar o item (produto) escolhido para a tela de venda
     * @param integer $id_produto
     */
    public function pickup($id_produto) {
        $dados['produtos'] = Service::lista("produtos");
        $dados['choosed'] = $this->pickProduct($id_produto);
        $dados['padrao'] = numfmt($this->langMoney);
        $dados['display'] = 'd-block';
        
        $dados['view'] = 'VendasProdutos/Create';

        $this->load("template", $dados);
    }

    /**
     * Método Responsável por salvar o produto consumido pelo hóspede com base no quarto ou no nome
     * @param integer $id_produto
     */
    public function salvar($id_produto) {
        $produto = new \stdClass();
        $estoque = new \stdClass();
        $reserva = new \stdClass();
        $consumo = new \stdClass();
        $detalhes = new \stdClass();

        $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
        $quarto = isset($_POST['quarto']) ? $_POST['quarto'] : '';

        $id_produto = isset($_POST['id_produto']) ? $_POST['id_produto'] : 0;
        $valor = isset($_POST['valor']) ? $_POST['valor'] : 0.00;
        $quantidade = isset($_POST['quantidade']) ? $_POST['quantidade'] : 0;
        
        $result = $this->getHospede($nome, $quarto);
        $UpEstoque = $this->GetProductsValue($id_produto);
        $UpEstoque -= $quantidade;

        $produto = $this->NewInstanceProduto($produto, $id_produto, $valor, $quantidade, $result[0]->id_reserva);
        $estoque = $this->NewInstanceEstoque($estoque, $UpEstoque, $id_produto);
        $reserva = $this->NewInstanceReserva($reserva, $valor, $quantidade, $result[0]->id_reserva);
        $consumo = $this->NewInstanceConsumo($consumo, $id_produto, 'Produtos', $valor, $quantidade, $result[0]->id_reserva);
        $detalhes = $this->NewIntanceDetalhes($detalhes, $result[0]->id_reserva, $valor, $quantidade);

        Flash::setForm($produto);
        if (ProductsService::salvar($produto, $this->id, $this->tabela)) {
            ProductsService::salvar($estoque, 'id_produto', 'produtos');
            ProductsService::salvar($reserva, 'id_reserva', 'reservas');
            ProductsService::salvar($consumo, 'id_consumo', 'consumos');
            ProductsService::salvar($detalhes, 'id_detalhes', 'detalhes');
            $this->redirect(URL_BASE . "products");
        } else {
            if (!$produto->id) {
                $this->redirect(URL_BASE . "products/create");
            } else {
                $this->redirect(URL_BASE . "products/edit/" . $produto->id);
            }
        }
    }

    /**
     * Método Responsável por retornar o prroduto escolhido pelo Adm
     * @param integer $id_produto
     */
    public function pickProduct($id_produto) {
        return ProductsService::select("SELECT * FROM produtos WHERE id_produto = '$id_produto'");
    }

    /**
     * Método Reponsável por retornar o hóspede escolhido pelo Adm ara atribuir seu Consumo
     * @param string $nome
     * @param integer $quarto
     */
    public function getHospede($nome, $quarto) {
        if ($nome == '') {
            $dados['dados'] = ProductsService::select("SELECT * FROM reservas, quartos WHERE reservas.tipo_quarto = quartos.tipo AND quartos.numero = '$quarto'");
        } else {
            $dados['dados'] = ProductsService::select("SELECT * FROM reservas, hospedes WHERE hospedes.id = reservas.hospede AND hospedes.nome LIKE '%$nome%'");
        }
        return $dados['dados'];
    }

    /**
     * Método Responsável por retornar o estoque de produtos o mesmo escolhido pelo Adm
     * @param integer $id_produdo
     */
    public function GetProductsValue($id_produto) {
        $dados['produto'] = ProductsService::select("SELECT * FROM produtos WHERE id_produto = '$id_produto'");

        return (double) $dados['produto'][0]->estoque;
    }

    /**
     * Método Responsável por cria um Std de vendas de produtos para retornar para salvar
     * @param \StdClass $produto
     * @param integer $id_produto
     * @param float $valor
     * @param integer $quantidade
     * @param integer $id_reserva
     */
    public function NewInstanceProduto($produto, $id_produto, $valor, $quantidade, $id_reserva) {
        $produto->produto = $id_produto;
        $produto->valor_vp = $valor;
        $produto->quantidade = $quantidade;
        $produto->data = Date('Y-m-d');
        $produto->time = Date('H:m:i');
        $produto->id_reserva = $id_reserva;

        return $produto;
    }

    /**
     * Método Responsável por criar um Std de produto para alterar  o estoque com a quantidade certa
     * @param \stdClass $estoque
     * @param integer $quantidade
     * @param integer $id_produto
     */
    public function NewInstanceEstoque($estoque, $quantidade, $id_produto) {
        $estoque->id_produto = $id_produto;
        $estoque->estoque = $quantidade;

        return $estoque;
    }

    /**
     * Método Responsável por criar um std de reserva para alterar o consumo do hóspede
     * @param \stdClass $reserva
     * @param float $valor
     * @param integer $quantidade
     * @param integer $id_reserva
     */
    public function NewInstanceReserva($reserva, $valor, $quantidade, $id_reserva) {

        $lista = ProductsService::select("SELECT * FROM reservas WHERE id_reserva = '$id_reserva'");

        $reserva->id_reserva = $id_reserva;
        $reserva->consumo = (($valor * $quantidade) + $lista[0]->consumo) - $lista[0]->consumo_entrada;

        return $reserva;
    }

    /**
     * Método Responsável por criar um stdclass do consumo para ter acesso a tdas sa páginas
     * @param \stdClass $consumo
     * @param integer $id_produto
     * @param string $nametag
     * @param double $valor
     * @param integer $quantidade
     * @param integer $id_reserva
     */
    public function NewInstanceConsumo($consumo, $id_produto, $nametag, $valor, $quantidade, $id_reserva) {
        $consumo->id_produto = $id_produto;
        $consumo->valor = (double) $valor;
        $consumo->nametag = $nametag;
        $consumo->data = Date('Y-m-d');
        $consumo->hora = Date('H:i:s');
        $consumo->quantidade = $quantidade;
        $consumo->id_reserva = $id_reserva;

        return $consumo;
    }

    /**
     * Método Responsável por atualizar os detalhes da conta do hóspede depois que compra um consumo
     * @param \stdClass $detalhes
     * @param integer $id_reserva
     * @param float $valor
     */
    public function NewIntanceDetalhes($detalhes, $id_reserva, $valor, $quantidade) {
        $dados['detalhes'] = ProductsService::select("SELECT * FROM detalhes WHERE id_reserva = '$id_reserva' AND descricao_detalhes = 'Consumos'");

        $id_detalhes = $dados['detalhes'][0]->id_detalhes;

        $detalhes->id_detalhes = $id_detalhes;
        $detalhes->valor_detalhes = ($valor * $quantidade) + $dados['detalhes'][0]->valor_detalhes;

        return $detalhes;
    }
}