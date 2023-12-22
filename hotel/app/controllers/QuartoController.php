<?php
namespace app\controllers;

use app\core\Controller;
use app\models\service\Service;
use app\core\Flash;
use app\models\service\QuartoService;


class QuartoController extends Controller{
   private $tabela = "categorias_quartos";//Tabela do banco
   private $campo  = "id";
   
    public function index(){
       $dados["lista"] = Service::lista($this->tabela); 
       $dados["view"]  = "quarto/Index";//nome da pasta e arquivo
       $this->load("template", $dados);

    }
    

    // public function listar(){
    //     $dados["listar"] = Service::lista($this->tabela); 
    //     $dados["view"]  = "quarto/listar";//nome da pasta e arquivo
    //     $this->load("template", $dados);
    //  }

    //  public function lista(){
    //     $dados["listar"] = Service::lista($this->tabela); 
    //     $dados["view"]  = "quarto/lista";//nome da pasta e arquivo
    //     $this->load("template", $dados);
    //  }


    public function create(){
        $dados['lista'] = [];
        $dados["quarto"] = Flash::getForm();
        $dados["view"] = "quarto/Create";
        $this->load("template", $dados);
    }

    // public function names() {
    //     $hospedes = new \stdClass();
        
    //     $hospedes->name = $_POST["nome_h"];

    //     if (!($hospedes->name == "")) {
    //         $hospedes->name = trim($hospedes->name);
    //     } else {
    //         echo "Nome Por Favor!";
    //         exit;
    //     }

    //     $dados["lista"] = QuartoService::names($hospedes, 'nome', $this->tabela);
    //     $dados["view"]  = "hospedes/Create";//nome da pasta e arquivo
    //     $this->load("template", $dados);
    // }

   
    public function CadastrarQuarto(){
        $dados["quarto"] = Flash::getForm();
        $dados["view"] = "quarto/CadastrarQuarto";
        $this->load("template", $dados);
    }

    
    public function edit($id){
        $quarto = Service::get($this->tabela, $this->campo, $id);       
        if(!$quarto){
            $this->redirect(URL_BASE . "Create");
        }
        
        $dados["quarto"]   = $quarto;
        $dados["view"]      = "quarto/Create";
        $this->load("template", $dados);
    }
    
    public function salvar(){
        $quarto = new \stdClass();

        //$quarto->id           = $_POST["id"];
        $quarto->nome 		= $_POST['nome'];
        $quarto->valor   = $_POST['valor'];
        $quarto->descricao 		= $_POST['descricao'];
        $quarto->especificacoes     = $_POST['especificacoes'];
       
    
        // print_r($hospedes);
        // exit;

        Flash::setForm($quarto);
        if( QuartoService::salvar($quarto, $this->campo, $this->tabela)){
            $this->redirect(URL_BASE."quarto");
        }else{
            if(!$quarto->id){
                $this->redirect(URL_BASE."quarto/create");
            }else{
                $this->redirect(URL_BASE."quarto/edit/".$quarto->id);
                //   print_r($hospedes);
                //     exit;

            }
        }
    }
    
    public function excluir($id){
        Service::excluir($this->tabela, $this->campo, $id);
        $this->redirect(URL_BASE."quarto");
        
    }
}

