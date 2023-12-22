<?php
namespace app\controllers;

use app\core\Controller;
use app\models\service\Service;
use app\core\Flash;
use app\models\service\HospedesService;


class Hospedes extends Controller{
   private $tabela = "hospedes";//Tabela do banco
   private $campo  = "id";
   
    public function index(){
       $dados["lista"] = Service::lista($this->tabela); 
       $dados["view"]  = "hospedes/Index";//nome da pasta e arquivo
       $this->load("template", $dados);

    }
    

    public function listar(){
        $dados["listar"] = Service::lista($this->tabela); 
        $dados["view"]  = "hospedes/listar";//nome da pasta e arquivo
        $this->load("template", $dados);
     }

     public function lista(){
        $dados["listar"] = Service::lista($this->tabela); 
        $dados["view"]  = "hospedes/lista";//nome da pasta e arquivo
        $this->load("template", $dados);
     }


    public function create(){
        $dados['lista'] = [];
        $dados["hospedes"] = Flash::getForm();
        $dados["view"] = "hospedes/Create";
        $this->load("template", $dados);
    }

    public function search() {
        $hospedes = new \stdClass();
        
        $hospedes->name = $_POST["nome_h"];

        if (!($hospedes->name == "")) {
            $hospedes->name = trim($hospedes->name);
        }



        $dados["lista"] = HospedesService::names($hospedes, 'nome', $this->tabela);
        $dados["view"]  = "hospedes/Create";//nome da pasta e arquivo
        $this->load("template", $dados);
    }

   
    public function cadastrar(){
        $dados["hospedes"] = Flash::getForm();
        $dados["view"] = "hospedes/cadastrar";
        $this->load("template", $dados);
    }

    
    public function edit($id){
        $hospedes = Service::get($this->tabela, $this->campo, $id);       
        if(!$hospedes){
            $this->redirect(URL_BASE . "cadastrar");
        }
        
        $dados["hospedes"]   = $hospedes;
        $dados["view"]      = "hospedes/cadastrar";
        $this->load("template", $dados);
    }
    
    public function salvar(){
        $hospedes = new \stdClass();
        
        $hospedes->id           = $_POST["id"];
        $hospedes->nome 		= $_POST['nome'];
        $hospedes->TipoPessoa   = $_POST['TipoPessoa'];
        $hospedes->email 		= $_POST['email'];
        $hospedes->telefone     = $_POST['telefone'];
        $hospedes->cpf 			= $_POST['cpf'];
        $hospedes->placa 	    = $_POST['placa'];
        $hospedes->responsavel 	= $_POST['responsavel'];
        $hospedes->cpf 			= $_POST['cpf'];
        $hospedes->bairro 		= $_POST['bairro'];
        $hospedes->endereco 	= $_POST['endereco'];
        $hospedes->cidade  		= $_POST['cidade'];
        $hospedes->cep  		= $_POST['cep'];
        $hospedes->nacionalidade 	 = $_POST['nacionalidade'];
        $hospedes->InscricaoEstadual = $_POST['InscricaoEstadual'];
        $hospedes->Empresa		     = $_POST['Empresa'];
        $hospedes->FoneComercial	 = $_POST['FoneComercial'];
        $hospedes->Profissao		 = $_POST['Profissao'];
        $hospedes->obs		         = $_POST['obs'];
        $hospedes->DataCadastro	     = date("Y-m-d");
    
        // print_r($hospedes);
        // exit;

        Flash::setForm($hospedes);
        if(HospedesService::salvar($hospedes, $this->campo, $this->tabela)){
            $this->redirect(URL_BASE."hospedes");
        }else{
            if(!$hospedes->id){
                $this->redirect(URL_BASE."hospedes/create");
            }else{
                $this->redirect(URL_BASE."hospedes/edit/".$hospedes->id);
                //   print_r($hospedes);
                //     exit;

            }
        }
    }
    
    public function excluir($id){
        Service::excluir($this->tabela, $this->campo, $id);
        $this->redirect(URL_BASE."hospedes");
        
    }
}

