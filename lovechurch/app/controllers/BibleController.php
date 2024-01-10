<?php

namespace app\controllers;

use app\models\service\BibleService;
use app\core\Controller;
use app\core\Flash;

class BibleController extends Controller {
    /**
     * Parâmetro Responsável por retornar o nome da minha tabela 
     * @var string $table
     */
    private $table = 'bible_reading';
}