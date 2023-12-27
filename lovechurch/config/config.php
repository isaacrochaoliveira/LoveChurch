<?php
define("SERVIDOR", "localhost");
define("BANCO", "lovechurch");
define("USUARIO", "root");
define("SENHA", "");
define("CHARSET","UTF8");

define('CONTROLLER_PADRAO', 'login');
define('METODO_PADRAO', 'index');
define('NAMESPACE_CONTROLLER', 'app\\controllers\\');
define('TIMEZONE',"America/Fortaleza");
define('CAMINHO', realpath('./'));
define("TITULO_SITE","mjailton-ligando vc ao mundo do conhecimento");

define('URL_BASE', 'http://' . $_SERVER["HTTP_HOST"].'/projects/LoveChurch/lovechurch/');
define('URL_IMAGEM', "http://". $_SERVER['HTTP_HOST'] . "/projects/LoveChurch/lovechurch/assets/");
define("SESSION_LOGIN","usuario_agenda_logado");
define("PATH_COM", 'C:\wamp64\www\projects\LoveChurch\lovechurch\assets\img\lovechurch\\');

define("VERSION", 'v1.0.0');

$config_upload["verifica_extensao"] = false;
$config_upload["extensoes"]         = array(".gif",".jpeg", ".png", ".bmp", ".jpg");
$config_upload["verifica_tamanho"]  = true;
$config_upload["tamanho"]           = 3097152;
$config_upload["caminho_absoluto"]  = realpath('./'). '/';
$config_upload["renomeia"]          = true;
