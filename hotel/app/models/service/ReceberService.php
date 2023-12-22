<?php

namespace app\models\service;

use app\models\validacao\ReceberValidacao;

use stdClass;

// use app\models\validacao\ReservasValidacao;

class ReceberService
{
    /**
     * Método Responsável por salvar os dados no bando de dados
     * @param stdClass $reservas
     * @param string $campo
     * @param string $tabela
     */
    public static function salvar($reservas, $campo, $tabela)
    {
        $validacao = ReceberValidacao::salvar($reservas);
        return Service::salvar($reservas, $campo, $validacao->listaErros(), $tabela);
    }

    /**
     * Método Responsável por retornar do banco uma lista de nomes procurados
     * @param string $name
     * @param string $tabela
     * @param string campo
     * @return array
     */
    public static function search($name, $tabela, $campo)
    {
        return Service::getLike($tabela, $campo, $name, true, 1);
    }

    /**
     * Método Responsável por retornar umm Objeto do Banco de Dados filtrado pela cláusula WHERE
     * @param string $tabela
     * @param array $campo
     * @param array $valor
     */
    public static function get($tabela, array $campo = [], array $valor = [], $eh_lista = false)
    {
        return Service::get($tabela, $campo, $valor, $eh_lista);
    }

    /**
     * Método Responsável por requirir uma query SQL completa e chama-lá para a execução retornando o resultado
     * @param string $sql
     */
    public static function select($sql, $eh_lista = true)
    {
        return Service::select($sql, $eh_lista);
    }

    /**
     * Método Responssável por excluir um determinado dado do DB
     * @param string $tabela
     * @param string $campo
     * @param string $valor
     */
    public static function delete($tabela, $campo, $valor)
    {
        return Service::excluir($tabela, $campo, $valor);
    }

    /**
     * Método Responsável por inclui o arquivo na pasta de arquivos receber e retornar o nome do arquivo
     * @param array $imagem
     * @param string $path
     * @param string $alt
     */
    public static function analisarimg($imagem, $path, $alt)
    {
        if (!($imagem['name'] == "")) {
            $foto = preg_replace('/[ -]+/', '-', $imagem['name']);
            $caminho = $path . $foto;
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
     * Método Responsável por verificar a extenção de cada arquivo e carregar a sua logo
     * @param array $dados
     */
    public static function corretaImg($dados)
    {
        $imgs = [];
        for ($key = 0; $key < count($dados); $key++) {
            $nome_arquivo = $dados[$key]->arquivo;

            $result = explode('.', $nome_arquivo);

            if ($result[1] == 'pdf') {
                array_push($imgs, 'pdf.png');
            } else {
                if (($result[1] == 'docx') || ($result[1] == 'doc')) {
                    array_push($imgs, 'word.png');
                } else {
                    if (($result[1] == 'xlsx') || ($result[1] == 'xlsm') || ($result == 'xls')) {
                        array_push($imgs, 'excel.png');
                    } else {
                        if ($result[1] == 'jpeg') {
                            array_push($imgs, 'jpeg.png');
                        } else {
                            if ($result[1] == 'jpg') {
                                array_push($imgs, 'jpg.png');
                            }
                        }
                    }
                }
            }
        }
        return $imgs;
    }

    /**
     * Método Responsável por pegar o valor total de contas e mada-lá a index
     * @param array $receber
     */
    public static function getTotal($receber)
    {
        $valores = [];
        for ($key = 0; $key < count($receber); $key++) {
            $valor = 0;

            $id_hospede = $receber[$key]->id;

            $result = ReceberService::select("SELECT * FROM detalhes WHERE detalhes.id_hospede = $id_hospede");

            for ($i = 0; $i < count($result); $i++) {
                $valor += $result[$i]->valor_detalhes;
            }
            array_push($valores, $valor);
            
        }

        return $valores;
    }

    /**
     * Método Responsável por pegar a quantidade de arquivos que o hóspede tem cadastrado naquela conta
     * @param array $detalhes
     */
    public static function getArquivos($detalhes)
    {
        $counts = [];
        for ($key = 0; $key < count($detalhes); $key++) {
            $result = self::select("SELECT * FROM arquivos WHERE id_detalhes = " . $detalhes[$key]->id_detalhes);

            array_push($counts, count($result));
        }

        return $counts;
    }

    /**
     * Método Responsável por pegar o número total de contas pagas e não pagas do hóspedes
     * @param array $receber
     */
    public static function getDetalhes($receber)
    {

        $contas_counts = [];
        for ($key = 0; $key < count($receber); $key++) {
            $id_hospede = $receber[$key]->id;

            $contas =  self::select("SELECT * FROM detalhes WHERE id_hospede = '$id_hospede'");

            array_push($contas_counts, count($contas));
        }

        return $contas_counts;
    }

    /**
     * Método Responsável por verificar se o hóspede solicitado já tem uma reserva cadastrada
     * @param integer $id_hospede
     */
    public static function existeReservaouReceber($id_hospede) {
        $ext = [];
        $ext = self::select("SELECT * FROM reservas WHERE hospede = '$id_hospede'");
        if (count($ext) == 0) {
            $ext = self::select("SELECT * FROM receber WHERE hospede = '$id_hospede'");
        }

        return $ext;
    }

    /**
     * Método Responsável por verificar se há ou não reserva para esse hóspede porque se não tiver, a URL será mudada
     * @param integer $id_detalhes
     */
    public static function SemReservas($id_detalhes, $explation='ID da tabela Detalhes') {
        if ($explation == 'ID da tabela Detalhes') {
            $dados = self::select("SELECT * FROM detalhes WHERE id_detalhes = '$id_detalhes' AND id_reserva = 0");
    
            if (count($dados) > 0) {
                return 'detailssem';
            } else {
                return 'details';
            }
        } else {
            $dados = self::select("SELECT * FROM receber WHERE hospede = '$id_detalhes' AND id_reserva = 0");
    
            if (count($dados) > 0) {
                return 'detailssem';
            } else {
                return 'details';
            }
        }
    }

    /**
     * Método Responsável por analisar qual filtro foi preenchido e devolver o resultado congruente
     * @param string $nome
     * @param integer $quarto
     * @param integer $exs
     */
    public static function FilterBills($nome, $quarto, $exs=1) {
        $result = '';
        
        
        if ($exs == 1) {
            if ($nome != "") {
                $result = self::select("SELECT * FROM detalhes, receber, hospedes, reservas WHERE hospedes.nome LIKE '$nome%' AND hospedes.id = detalhes.id_hospede AND detalhes.id_receber = receber.id_receber AND reservas.id_reserva = receber.id_reserva LIMIT 1");
            } else {
                $result = self::select("SELECT *, quartos.numero, quartos.tipo, quartos.id_quartos FROM detalhes, receber, hospedes, reservas, quartos WHERE hospedes.id = detalhes.id_hospede AND receber.id_reserva = reservas.id_reserva AND reservas.tipo_quarto = quartos.tipo AND reservas.quarto = quartos.id_quartos AND quartos.numero = '$quarto' LIMIT 1");
            }
        } else {
            if ($nome != "") {
                $result = self::select("SELECT * FROM detalhes, receber, hospedes WHERE hospedes.nome LIKE '$nome%' AND detalhes.id_hospede = hospedes.id AND receber.id_receber = detalhes.id_receber AND receber.id_reserva = 0 LIMIT 1");
            }
        }
        
        return $result;
    }
}
