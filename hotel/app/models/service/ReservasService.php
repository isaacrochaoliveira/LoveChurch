<?php 

namespace app\models\service;

use app\models\validacao\ReservasValidacao;

use stdClass;

// use app\models\validacao\ReservasValidacao;

class ReservasService {
    /**
     * Método Responsável por salvar os dados no bando de dados
     * @param stdClass $reservas
     * @param string $campo
     * @param string $tabela
     */
    public static function salvar($reservas, $campo, $tabela) {
        $validacao = ReservasValidacao::salvar($reservas);
        return Service::salvar($reservas, $campo, $validacao->listaErros(), $tabela);
    }

    /**
     * Método Responsável por retornar do banco uma lista de nomes procurados
     * @param string $name
     * @param string $tabela
     * @param string campo
     * @return array
     */
    public static function search($name, $tabela, $campo) {
        return Service::getLike($tabela, $campo, $name, true);
    }

    /**
     * Método Responsável por retornar umm Objeto do Banco de Dados filtrado pela cláusula WHERE
     * @param string $tabela
     * @param array $campo
     * @param array $valor
     */
    public static function get($tabela, array $campo=[], array $valor=[], $eh_lista=false) {
        return Service::get($tabela, $campo, $valor, $eh_lista);
    }

    /**
     * Método Responsável por requirir uma query SQL completa e chama-lá para a execução retornando o resultado
     * @param string $sql
     */
    public static function select($sql, $eh_lista=true) {
        return Service::select($sql, $eh_lista);
    }

    /**
     * Método Responssável por excluir um determinado dado do DB
     * @param string $tabela
     * @param string $campo
     * @param string $valor
     */
    public static function delete($tabela, $campo, $valor) {
        return Service::excluir($tabela, $campo, $valor);
    }
}