<?php
namespace app\models\service;
use app\models\validacao\HospedesValidacao;

class HospedesService{
    /**
     * Método Responsável salvar os hospedes
     * @param \stdClass $hospedes
     * @param string $campo
     * @param string $tabela
     */
    public static function salvar($hospedes, $campo, $tabela){
        $validacao = HospedesValidacao::salvar($hospedes);
        return Service::salvar($hospedes, $campo, $validacao->listaErros(), $tabela);
    }

    /**
     * Método Responsável por pesquisar pelo nome no bd
     * @param string $nome
     * @param string $campo
     * @param string $tabela
     * $param integer $posicao
     */
    public static function names($nome, $campo, $tabela, $posicao){
        return Service::getLike($tabela, $campo, $nome, true, $posicao);
    }

    /**
     * Método Responsável por excluir um determinado hóspede
     * @param integer $id
     * @param string $campo
     * @param string $tabela
     */
    public static function delete($id, $campo, $tabela){
        return Service::excluir($tabela, $campo, $id);
    }

    /**
     * Método Responsável por requirir uma query SQL completa e chama-lá para a execução retornando o resultado
     * @param string $sql
     */
    public static function select($sql, $eh_lista=true) {
        return Service::select($sql, $eh_lista);
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
            if ($ext == 'pdf' or $ext == 'doc' or $ext == 'docx' or $ext == 'xls' or $ext == 'xlsx' or $ext == 'xlsm' or $ext == 'zip' or $ext == 'rar' or $ext == 'png' or $ext == 'jpeg' or $ext == 'jpg') {
                move_uploaded_file($imagem_temp, $caminho);
            } else {
                $img = $alt;
            }
    
        } else {
            $img = $alt;    
        }

        return $img;
    }

    /**
     * Método Responsável por analisar a extenção do arquivo e retornar a imagem de logo correpondente
     * @param \stdClass $dados
     */
    public static function rightimgs($dados) {
        $imgs = [];

        for ($key = 0; $key < count($dados); $key++) {
            $splited = explode('.', $dados[$key]->arquivo_hos);
            if ($splited[1] == 'pdf') {
                array_push($imgs, 'pdf');
            } else {
                if (($splited[1] == 'xls') || ($splited[1] == 'xlsx') || ($splited[1] == 'xlsm')) {
                    array_push($imgs, 'excel');
                } else {
                    if (($splited[1] == 'docx') || ($splited[1] == "doc")) {
                        array_push($imgs, 'word');
                    } else {
                        if ($splited[1] == 'png') {
                            array_push($imgs, 'png');
                        } else {
                            if ($splited[1] == 'jpg') {
                                array_push($imgs, 'jpg');
                            } else {
                                if ($splited[1] == 'jpeg') {
                                    array_push($imgs, 'jpeg');
                                }
                            }
                        }
                    }
                }
            }
        }
        return $imgs;
    }
}