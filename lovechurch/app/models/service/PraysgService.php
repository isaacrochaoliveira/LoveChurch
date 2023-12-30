<?php

namespace app\models\service;
use app\models\validacao\PraysgValidacao;
class PraysgService {
    /**
     * Método Responsável por salvar os dados no bando de dados
     * @param stdClass $reservas
     * @param string $campo
     * @param string $tabela
     */
    public static function salvar($std, $campo, $tabela)
    {
        $validacao = PraysgValidacao::salvar($std);
        return Service::salvar($std, $campo, $validacao->listaErros(), $tabela);
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
     * Método Responsável por excluir uma determuinada imagem de sua pasta
     * @param string $img
     * @param string $path
     */
    public static function unload($img, $path) {
        unlink($path.$img);
    }

	/**
	* Método Responsável por retornar todos os email dos usuários que fizeram os grupos
	* @param stdClass $datas
	*/
	public static function getEmailPath($datas) {
		$emails = [];
		for ($key = 0; $key < count($datas); $key++) {
			$email = self::select("SELECT * FROM pray_group, usuarios WHERE pray_group.id_usuario = usuarios.id_usuario");

			array_push($emails, $email[0]->email);
		}

		return $emails;
	}

	/**
	* Método Responsável por retornar os grupos que não estão bloqueadas pelo usuário
	* @param integer $id_usuario
	*/
	public static function getGroupsAvailable($id_usuario) {
		$groups = new \stdClass();
		$datas = self::select("SELECT * FROM pray_group;");
		$blocks = self::select("SELECT * FROM block_groupsp;");
		for ($key = 0; $key < count($datas); $key++) {
			for ($i = 0; $i < count($blocks); $i++) {
				if (($datas[$key]->id_praygroup == $blocks[$i]->id_group) AND ($id_usuario == $blocks[$i]->id_usuario)) {
					$groups->id_praygroup = $datas[$key]->id_praygroup;
				}
			}
		}

		return $groups;
	}
}
