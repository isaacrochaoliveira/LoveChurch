<div class="template-container">
    <div>
        <div>
            <a href="<?= URL_BASE ?>receber">
                <button type="button" class="btn-goback">
                    <span class="material-symbols-sharp" style="font-size:22pt">
                        arrow_left_alt
                    </span>
                    Voltar
                </button>
            </a>
        </div>
        <div class="mt-2">
            <a href="<?= URL_BASE ?>receber/createbill/<?= $detalhes[0]->id ?>" class="btn__create-bills-on-person">
                <span class="material-symbols-sharp">
                    arrow_back
                </span>
                Criar Conta para Este Hóspede
            </a>
        </div>
    </div>
</div>
<div class="template-container">
    <?php
    $this->verMsg();
    $this->verErro();
    ?>
    <div>
        <p class="hospede__view_adm">Hóspede a ser visualizado: <?= $detalhes[0]->nome ?></p>
    </div>
    <table class="table">
        <thead>
            <th>#</th>
            <th>Descrição</th>
            <th>Hóspede</th>
            <th>Valor</th>
            <th>Quarto</th>
            <th>Lançamento/Vencimento</th>
            <th>Pago</th>
            <th>Arquivos Carregados</th>
            <th>Pago</th>
        </thead>
        <tbody>
            <?php
            for ($key = 0; $key < count($detalhes); $key++) {
                if ($detalhes[$key]->id_reserva == 0) {
                    $detalhes[$key]->numero = 0;
                }
            ?>
                <tr>
                    <th>
                        <p class="id_detalhes"><?= $detalhes[$key]->id_detalhes ?></p>
                        <div class="dropright" id="subReceber">
                            <span class="material-symbols-sharp more_horiz">
                                more_horiz
                            </span>
                            <ul class="dropdown-menu">
                                <li class="bg-primary-hover">
                                    <a href="<?= URL_BASE ?>receber/edit/<?= $detalhes[$key]->id_detalhes ?>" class="dropdown-item">
                                        <span class="material-symbols-sharp">
                                            edit
                                        </span>
                                        Editar Conta
                                    </a>
                                </li>
                                <li class="bg-primary-hover">
                                    <a href="<?= URL_BASE ?>receber/delete/<?= $detalhes[$key]->id_detalhes ?>" class="dropdown-item">
                                        <span class="material-symbols-sharp">
                                            delete
                                        </span>
                                        Deletar Conta
                                    </a>
                                </li>
                                <li class="bg-primary-hover">
                                    <a href="<?= URL_BASE ?>receber/paybills/<?= $detalhes[$key]->id_detalhes ?>" class="dropdown-item">
                                        <span class="material-symbols-sharp">
                                            local_atm
                                        </span>
                                        Pagar Conta
                                    </a>
                                </li>
                                <li class="bg-primary-hover">
                                    <a href="<?= URL_BASE ?>receber/files/<?= $detalhes[$key]->id_detalhes ?>" class="dropdown-item">
                                        <span class="material-symbols-sharp">
                                            drive_folder_upload
                                        </span>
                                        Incluir Arquivo
                                    </a>
                                </li>
                                <li class="bg-primary-hover">
                                    <a href="<?= URL_BASE ?>receber/views/<?= $detalhes[$key]->id_detalhes ?>" class="dropdown-item">
                                        <span class="material-symbols-sharp">
                                            folder
                                        </span>
                                        Ver Arquivo(s)
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </th>
                    <td><?= $detalhes[$key]->descricao_detalhes ?></td>
                    <td><?= $detalhes[$key]->nome ?></td>
                    <td><?= numfmt_format_currency($padrao, $detalhes[$key]->valor_detalhes, 'BRL') ?></td>
                    <td><?= $detalhes[$key]->numero ?></td>
                    <td><?= Date("d/m/y", strtotime($detalhes[$key]->data_lanc)) . ' - ' . Date("d/m/y", strtotime($detalhes[$key]->data_venc)) ?></td>
                    <td><?= $detalhes[$key]->pago ?></td>
                    <td><?= $arquivos[$key] ?></td>
                    <td>
                        <?php
                        if ($detalhes[$key]->pago == 'Não') {
                        ?>
                            <i class="fa-solid fa-square text-danger" style="font-size: 18pt"></i>
                        <?php
                        } else {
                        ?>
                            <i class="fa-solid fa-square text-success" style="font-size: 18pt"></i>
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