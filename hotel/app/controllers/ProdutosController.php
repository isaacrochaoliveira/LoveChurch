<?php

namespace app\controllers;

use app\core\Controller;
use app\models\service\Service;
use app\models\service\ProdutosService;
use app\core\Flash;
use app\models\validacao\ProductsValidacao;
use NumberFormatter;

class ProdutosController extends Controller
{
    /**
     * Parâmetro Responsável por retornar o nome da minha tabela
     * @var string $tabela
     */
    private $tabela = 'produtos';

    /**
     * Parâmetro usado para fazer a relação entre produtos e categorias produtos
     * $var string $categorias
     */
    private $categorias = 'categorias_produtos';

    /**
     * Parâmetro Resposável por retornar a chave primaria da tabela de categorias de produtos
     * @var string $categorias_id
     */
    private $categorias_id = 'id_categoria';

    /**
     * Parâmetro Responsável por retornar o nome da tabela para ajudar fazer o analytics
     * @var string $vendas_produtos
     */
    private $vendas_produtos = 'vendas_produtos';

    /**
     * Parâmetro Responsável por retornar a chave primária de vendas_produtos para fazer a relação
     * @var string $id_vendasp
     */
    private $id_vendasp = 'id_vp';

    /**
     * Parâmetro Responsável por retornar o nome do campo da chave primária da tabela
     * @var string $id
     */
    private $id = 'id_produto';

    /**
     * Parâmetro Responsável por retornar a tipo de moeda que será convertida, nesse caso será pt_BR
     * @var string $langMoney
     */
    private $langMoney = 'pt_BR';

    /**
     * Método Responsável por chama a minha index 
     */
    public function index()
    {
        $dados['produtos'] = Service::lista($this->tabela);
        $dados['categorias'] = ProdutosService::select("SELECT * FROM $this->tabela, $this->categorias WHERE $this->tabela.categoria = $this->categorias.$this->categorias_id");
        $dados['padrao'] = numfmt($this->langMoney);

        $dados['view'] = 'Produtos/Index';

        $this->load('template', $dados);
    }

    /**
     * Método Responsável por redenrizar a view de cadastro
     */
    public function create()
    {
        $dados['categorias'] = Service::lista("categorias_produtos");
        $dados['view'] = 'Produtos/Create';

        $this->load('template', $dados);
    }

    /**
     * Método Responsável por salvar os dados do produto
     */
    public function salvar()
    {
        $produto = new \stdClass();

        $produto->id_produto = isset($_POST['id_produto']) ? $_POST['id_produto'] : 0;
        $produto->nome = isset($_POST['nome']) ? $_POST['nome'] : '';
        $produto->descricao = isset($_POST['descricao']) ? $_POST['descricao'] : '';
        $produto->valor_compra = isset($_POST['valor_compra']) ? $_POST['valor_compra'] : 0.00;
        $produto->valor_venda = isset($_POST['valor_venda']) ? $_POST['valor_venda'] : 0.00;
        $produto->estoque = isset($_POST['estoque']) ? $_POST['estoque'] : 0;
        $produto->nivel_estoque = isset($_POST['nivel_estoque']) ? $_POST['nivel_estoque'] : 15;
        $produto->categoria = isset($_POST['categoria']) ? $_POST['categoria'] : 0;
        $produto->tem_estoque = 'Sim';
        $produto->foto = isset($_POST['foto']) ? $_POST['foto'] : 'sem-foto.jpg';

        Flash::setForm($produto);
        if (ProdutosService::salvar($produto, $this->id, $this->tabela)) {
            $this->redirect(URL_BASE . "produtos");
        } else {
            if (!$produto->id) {
                $this->redirect(URL_BASE . "produtos/create");
            } else {
                $this->redirect(URL_BASE . "produtos/edit/" . $produto->id);
            }
        }
    }

    /**
     * Método Responsável por redenrizar a view para o adm escolher a imagem para o produto
     * @param integer $id_produto
     */
    public function imagem($id_produto)
    {
        $dados['produtos'] = ProdutosService::select("SELECT * FROM produtos WHERE id_produto = '$id_produto'");

        $dados['padrao'] = numfmt($this->langMoney);
        $dados['view'] = 'Produtos/Imagem';

        $this->load("template", $dados);
    }

    /**
     * Método Responsável por salvar a imagem do produto récem escolhida pelo Adm
     * @param integer $id_produto
     */
    public function salvarimg($id_produto)
    {
        $produto = new \stdClass();

        $imagem = $_FILES['picture'];

        $img = ProdutosService::analisarimg($imagem, 'assets/img/produtos/', 'sem-foto.jpg');

        $produto->id_produto = $id_produto;
        $produto->foto = $img;

        Flash::setForm($produto);
        if (ProdutosService::salvar($produto, $this->id, $this->tabela)) {
            $this->redirect(URL_BASE . "produtos");
        } else {
            if (!$produto->id) {
                $this->redirect(URL_BASE . "produtos/create");
            } else {
                $this->redirect(URL_BASE . "produtos/edit/" . $produto->id);
            }
        }
    }

    /**
     * Método Responsável deletar um produto expecificamente segundo a intenção do adm
     * @param integer $id_produto
     */
    public function delete($id_produto)
    {
        ProdutosService::delete($this->tabela, $this->id, $id_produto);

        $this->redirect(URL_BASE . "produtos");
    }

    /**
     * Método Responsável por ativar e desativar o produto selecionado
     * @param integer $id_produto
     */
    public function toggle($id_produto)
    {
        $produto = new \stdClass();
        $dados['produto'] = ProdutosService::select("SELECT * FROM $this->tabela WHERE $this->id = '$id_produto'");

        $produto->id_produto = $id_produto;
        if ($dados['produto'][0]->ativo == 'Sim') {
            $produto->ativo = 'Não';
            $tipo = 'Desativado';
            $n = -1;
        } else {
            $produto->ativo = 'Sim';
            $tipo = 'Ativado';
            $n = 1;
        }
        Flash::setForm($produto);
        if (ProdutosService::salvar($produto, $this->id, $this->tabela)) {
            Flash::setMsg("Produto " . $dados['produto'][0]->nome . " $tipo com Sucesso", $n);
            $this->redirect(URL_BASE . "produtos");
        } else {
            if (!$produto->id) {
                $this->redirect(URL_BASE . "produtos/create");
            } else {
                $this->redirect(URL_BASE . "produtos/edit/" . $produto->id);
            }
        }
    }

    /**
     * Método Responsável por verificar se p produto indicado está disponível ou inativo
     * @param integer $id_produto
     */
    public function sellpickup($id_produto)
    {
        $dados['produtos'] = ProdutosService::select("SELECT * FROM $this->tabela WHERE $this->id = '$id_produto'");
        if ($dados['produtos'][0]->ativo == 'Não') {
            Flash::setMsg('Produto Inativo Para A Venda!', -1);
            $this->redirect(URL_BASE . 'produtos');
        } else {
            $this->redirect(URL_BASE . 'products/pickup/' . $id_produto);
        }
    }

    /**
     * Método Responsável por dar saída em um produto
     * @param integer $id_produto
     */
    public function saida($id_produto)
    {
        $dados['produto'] = ProdutosService::select("SELECT * FROM $this->tabela WHERE $this->id = '$id_produto'");
        $dados['categoria'] = ProdutosService::select("SELECT * FROM $this->tabela, $this->categorias WHERE $this->tabela.categoria = $this->categorias.$this->categorias_id");

        $dados['padrao'] = numfmt($this->langMoney);
        $dados['view'] = 'Produtos/Saídas';

        $this->load("template", $dados);
    }

    /**
     * Método Responsável por fazer a salvamento de uma saída de produtos
     * @param integer $id_produto
     */
    public function leave($id_produto)
    {
        $saida = new \stdClass();
        $produto = new \stdClass();

        $saida = $this->StdSaida($saida, $id_produto);
        $produto = $this->StdProduto($produto, $id_produto);

        Flash::setForm($produto);
        if (ProdutosService::salvar($saida, 'id_saida', 'saidas')) {
            ProdutosService::salvar($produto, $this->id, $this->tabela);
            Flash::setMsg("Produto teve uma saída de $saida->quantidade Itens");
            $this->redirect(URL_BASE . "produtos");
        } else {
            if (!$produto->id) {
                $this->redirect(URL_BASE . "produtos/create");
            } else {
                $this->redirect(URL_BASE . "produtos/edit/" . $produto->id);
            }
        }
    }

    /**
     * Método Responsável por criar um StdClass de saída de produto para salvamento
     * @param \stdClass $saida
     */
    public function StdSaida($saida, $id_produto)
    {
        $saida->produto = $id_produto;
        $saida->quantidade = isset($_POST['quantidade']) ? $_POST['quantidade'] : 0;
        $saida->motivo = isset($_POST['motivo']) ? $_POST['motivo'] : '';
        $saida->data = Date('Y-m-d');

        return $saida;
    }

    /**
     * Método Responsável por criar um StdClass de produtos para atualizar o estoque
     * @param \stdClass $produto
     */
    public function StdProduto($produto, $id_produto, $method='-')
    {
        $dados['produto'] = ProdutosService::select("SELECT * FROM $this->tabela WHERE $this->id = '$id_produto'");

        $quantidade = isset($_POST['quantidade']) ? $_POST['quantidade'] : 0;

        $produto->id_produto = $id_produto;
        if ($method == '-') {
            $produto->estoque = $dados['produto'][0]->estoque - $quantidade;
        } else if ($method == '+') {
            $produto->estoque = $dados['produto'][0]->estoque + $quantidade;
        }

        return $produto;
    }

    /**
     * Método Responsável por carregar a view de entrada de produtos
     * @param integer $id_produto
     */
    public function entradas($id_produto)
    {
        $dados['produto'] = ProdutosService::select("SELECT * FROM $this->tabela WHERE $this->id = '$id_produto'");
        $dados['categoria'] = ProdutosService::select("SELECT * FROM $this->tabela, $this->categorias WHERE $this->tabela.categoria = $this->categorias.$this->categorias_id");

        $dados['padrao'] = numfmt($this->langMoney);
        $dados['view'] = 'Produtos/Entradas';

        $this->load("template", $dados);
    }

    /**
     * Método Responsável por salvar a entrada de mais produtos
     * @param integer $id_produto
     */
    public function comesin($id_produto)
    {
        $entrada = new \stdClass();
        $produto = new \stdClass();

        $entrada = $this->StdEntrada($entrada, $id_produto);
        $produto = $this->StdProduto($produto, $id_produto, '+');

        Flash::setForm($produto);
        if (ProdutosService::salvar($entrada, 'id_entrada', 'entradas')) {
            ProdutosService::salvar($produto, $this->id, $this->tabela);
            Flash::setMsg("Produto teve uma emtrada de $entrada->quantidade Itens");
            $this->redirect(URL_BASE . "produtos");
        } else {
            if (!$produto->id) {
                $this->redirect(URL_BASE . "produtos/create");
            } else {
                $this->redirect(URL_BASE . "produtos/edit/" . $produto->id);
            }
        }
    }

    /**
     * Método Responsável por criar um StdClass para salvar a entrada de produtos
     * @param \stdClass $entradas
     */
    public function StdEntrada($entradas, $id_produto) {
        $entradas->produto = $id_produto;
        $entradas->quantidade = isset($_POST['quantidade']) ? $_POST['quantidade'] : 0;
        $entradas->motivo = isset($_POST['motivo']) ? $_POST['motivo'] : '';
        $entradas->data = Date('Y-m-d');

        return $entradas;
    }

    /**
     * Método Responsável por editar produto já salvo
     * @param integer $id_produto
     */
    public function edit($id_produto) {
        $dados['produtos'] = ProdutosService::select("SELECT * FROM $this->tabela, $this->categorias WHERE $this->tabela.$this->id = '$id_produto' AND $this->tabela.categoria = $this->categorias.$this->categorias_id");
        $dados['categorias'] = ProdutosService::select("SELECT * FROM $this->categorias WHERE $this->categorias_id != " . $dados['produtos'][0]->id_categoria);

        $dados['padrao'] = numfmt($this->langMoney);
        $dados['view'] = 'Produtos/Edit';

        $this->load("template", $dados);
    }
}
