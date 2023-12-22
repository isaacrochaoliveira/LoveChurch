<?php
namespace app\controllers;

use app\core\Flash;
use app\models\service\Service;
use app\core\Controller;

class LoginController extends Controller {
    public function index() {
        $dados["view"] = "Login";
        $this->load("Login", $dados);
    }

    public function logar() {
        $login = filter_input(INPUT_POST, "login");
        $senha = filter_input(INPUT_POST, "senha");

        Flash::setForm($_POST);

        if (Service::logar("login", $login, $senha, "usuario")) {
            session_regenerate_id(true); // Regenerar a ID da sessão
            $this->redirect(URL_BASE . "Cliente/home");
        } else {
            $this->redirect(URL_BASE . "login");
           
        }
    }

    public function logoff() {
        unset($_SESSION[SESSION_LOGIN]);
    }
   
         
}

