<?php

use app\core\Controller;
?>
<a href="<?= URL_BASE ?>produtos/create" class="btn-cad d-inline-block btn-verde">
    <span class="material-symbols-sharp">
        add
    </span>
    Novo Produto
</a>
<div class="template-container">
    <div>
        <?php
        $this->verMsg();
        $this->verErro();
        ?>
    </div>
    <table class="table">
        <thead>
            <th>Cód</th>
            <th>Produto</th>
            <th>Valor Compra/Venda</th>
            <th>Nível Mínimo</th>
            <th>Estoque</th>
            <th>Foto</th>
            <th>Ativo</th>
        </thead>
        <tbody>
            <?php
            for ($key = 0; $key < count($produtos); $key++) {
            ?>
                <tr>
                    <td class="options">
                        <p class="id">
                            <?= $produtos[$key]->id_produto ?>
                        </p>
                        <div class="dropup">
                            <span class="material-symbols-sharp more_horiz">
                                more_horiz
                            </span>
                            <ul class="dropdown-menu">
                                <div class="d-flex">
                                    <li class="dropdrown-item image">
                                        <a href="<?= URL_BASE ?>produtos/imagem/<?= $produtos[$key]->id_produto ?>" class="drodown-link" title="Escolher Imagem">
                                            <span class="material-symbols-sharp">
                                                add_a_photo
                                            </span>
                                            <!-- Escolher Imagem -->
                                        </a>
                                    </li>
                                    <li class="dropdown-item editar">
                                        <a href="<?= URL_BASE ?>produtos/edit/<?= $produtos[$key]->id_produto ?>" class="dropdown-link" title="Editar Produto">
                                            <span class="material-symbols-sharp">
                                                ink_pen
                                            </span>
                                            <!-- <p>Editar Produto</p> -->
                                        </a>
                                    </li>
                                    <li class="dropdown-item delete">
                                        <a href="<?= URL_BASE ?>produtos/delete/<?= $produtos[$key]->id_produto ?>" class="dropdown-link" title="Excluir Produto">
                                            <span class="material-symbols-sharp">
                                                delete_forever
                                            </span>
                                            <!-- Excluir Produto -->
                                        </a>
                                    </li>
                                    <li class="dropdown-item toggle">
                                        <a href="<?= URL_BASE ?>produtos/toggle/<?= $produtos[$key]->id_produto ?>" class="dropdown-link" title="Desativar/Ativar">
                                            <?php
                                            if ($produtos[$key]->ativo == 'Sim') {
                                            ?>
                                                <span class="material-symbols-sharp">
                                                    toggle_off
                                                </span>
                                            <?php
                                            } else {
                                            ?>
                                                <span class="material-symbols-sharp">
                                                    toggle_on
                                                </span>
                                            <?php
                                            }
                                            ?>
                                            <!-- Desativar -->
                                        </a>
                                    </li>
                                    <li class="dropdown-item saidas">
                                        <a href="<?= URL_BASE ?>produtos/saida/<?= $produtos[$key]->id_produto ?>" class="dropdown-link" title="Saída de Produtos">
                                            <span class="material-symbols-sharp" title="Saídas de Produtos">
                                                turn_right
                                            </span>
                                            <!-- Saída de Produto -->
                                        </a>
                                    </li>
                                    <li class="dropdown-item entradas">
                                        <a href="<?= URL_BASE ?>produtos/entradas/<?= $produtos[$key]->id_produto ?>" class="dropdown-link" title="Entradas de Produtos">
                                            <span class="material-symbols-sharp">
                                                turn_left
                                            </span>
                                            <!-- Entrada de Produto -->
                                        </a>
                                    </li>
                                    <li class="dropdown-item sell">
                                        <a href="<?= URL_BASE ?>produtos/sellpickup/<?= $produtos[$key]->id_produto ?>" class="dropdown-link" title="Vender Este  Produto">
                                            <span class="material-symbols-sharp">
                                                sell
                                            </span>
                                            <!-- Vender este Produto -->
                                        </a>
                                    </li>
                                </div>
                            </ul>
                        </div>
                    </td>
                    <td><?= $produtos[$key]->nome ?></td>
                    <td><?= numfmt_format_currency($padrao, $produtos[$key]->valor_venda, 'BRL') ?> / <?= numfmt_format_currency($padrao, $produtos[$key]->valor_compra, 'BRL') ?></td>
                    <td><?= $produtos[$key]->nivel_estoque ?></td>
                    <td><?= $produtos[$key]->estoque ?></td>
                    <td>
                        <img src="<?= URL_IMAGEM ?>img/produtos/<?= $produtos[$key]->foto ?>" alt="Foto do Produto" width="60">
                    </td>
                    <td>
                        <?php
                        if ($produtos[$key]->ativo == 'Sim') {
                        ?>
                            <i class="fa-solid fa-stop text-success" style="font-size: 20pt"></i>
                        <?php
                        } else {
                        ?>
                            <i class="fa-solid fa-stop text-danger" style="font-size: 20pt"></i>
                        <?php

                        }
                        ?>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>