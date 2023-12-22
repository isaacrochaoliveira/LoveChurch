<?php 

namespace app\models\service;

use app\models\validacao\ProdutosValidacao;

use stdClass;

class ProdutosService {
    /**
     * Método Responsável por salvar os dados no bando de dados
     * @param stdClass $produtos
     * @param string $campo
     * @param string $tabela
     */
    public static function salvar($produtos, $campo, $tabela) {
        $validacao = ProdutosValidacao::salvar($produtos);
        return Service::salvar($produtos, $campo, $validacao->listaErros(), $tabela);
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

    /**
     * Método Responsavel por analisar a foto escolhida pelo usuário 
     * @param array $imagem
     * @param string $path
     * @param string $alt
     */
    public static function analisarimg($imagem, $path, $alt) {
        if (!($imagem['name'] == "")) {
            $foto = preg_replace('/[ -]+/', '-', $imagem['name']);
            $caminho = $path.$foto;
            if ($foto == "") {
                $img = $alt;
            } else {
                $img = $foto;
            }
            

            $imagem_temp = $imagem['tmp_name'];
            $ext = pathinfo($foto, PATHINFO_EXTENSION);
            if ($ext == 'png' or $ext == 'jpg' or $ext == 'jpeg' or $ext == 'gif') {
                move_uploaded_file($imagem_temp, $caminho);
            } else {
                $img = $alt;
            }
    
        } else {
            $img = $alt;    
        }

        return $img;
    }
}
