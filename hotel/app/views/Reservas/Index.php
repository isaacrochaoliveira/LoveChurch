<a href="<?= URL_BASE ?>reservas/create" class="btn-cad d-inline-block btn-verde">
    <span class="material-symbols-sharp">
        add
    </span>
    Nova Reserva
</a>
<div class="template-container bs-exmaple widget-shadow">
    <div class="row" style="margin-top: 20px;">
        <div class="col-md-8">
            <div class="d-flex flex-wrap justify-content-center">
                <?php
                for ($key = 0; $key < count($lista); $key++) {
                ?>
                    <div class="square__reserva">
                        <div class="more-info text-left">
                            <div class="dropup">
                                <span class="material-symbols-sharp icons-expand expand_more">
                                    expand_more
                                </span>
                                <ul class="dropdown-menu bg-light">
                                    <p class="font-italic">
                                        <b class="fs-11pt">
                                            Nome:
                                        </b>
                                        <?= @$hospede[$key]->nome ?>
                                    </p>
                                    <p class="font-italic">
                                        <b class="fs-11pt">
                                            CPF/Tel:
                                        </b>
                                        <?= @$hospede[$key]->cpf . ' - ' . @$hospede[$key]->telefone ?>
                                    </p>
                                    <p class="font-italic">
                                        <b class="fs-11pt">
                                            Quant. de Hóspede:
                                        </b>
                                        <?= @$lista[$key]->hospedes ?>
                                    </p>
                                    <p class="font-italic">
                                        <b class="fs-11pt">
                                            Forma de Pgto:
                                        </b>
                                        <?= @$pgto_form[$key]->nome ?>
                                    </p>
                                    <p class="font-italic">
                                        <b class="fs-11pt">
                                            Valor:
                                        </b>
                                        <?= numfmt_format_currency($padrao, $lista[$key]->valor, 'BRL') ?>
                                    </p>
                                    <p class="font-italic">
                                        <b class="fs-11pt">
                                            Entrada:
                                        </b>
                                        <?= numfmt_format_currency($padrao, $lista[$key]->no_show, 'BRL') ?>
                                    </p>
                                    <p class="font-italic">
                                        <b class="fs-11">
                                            Total Consumo/Restante
                                        </b>
                                        <?= @numfmt_format_currency($padrao, $lista[$key]->consumo, 'BRL') . ' / ' ?>
                                        <?= @numfmt_format_currency($padrao, ($lista[$key]->valor - $lista[$key]->no_show) + $lista[$key]->consumo, 'BRL') ?>
                                    </p>
                                </ul>
                            </div>
                        </div>
                        <div class="info-in-view">
                            <div class="d-flex flex-wrap justify-content-around align-items-center">
                                <span class="material-symbols-sharp door-front">
                                    door_front
                                </span>
                                <p class="number_room"><?= $quarto[$key] ?></p>
                            </div>
                            <hr>
                            <div class="d-flex dates">
                                <div class="check-in_div text-center">
                                    <?php
                                    if ($lista[$key]->hora_checkin == '00:00:00') {
                                        $classe = 'd-none';
                                    ?>
                                        <a href="<?= URL_BASE ?>reservas/checkin/<?= $lista[$key]->id_reserva ?>" class="text-success">
                                            <span class="material-symbols-sharp icon-check-in">
                                                calendar_month
                                            </span>
                                        </a>
                                    <?php
                                    } else {
                                    ?>
                                        <div class="dropdown click">
                                            <span class="material-symbols-sharp icon-check-in text-darkblue" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                calendar_month
                                            </span>
                                            <div class="dropdown-menu">
                                                <ul>
                                                    <li>
                                                        <p>Quarto: <?= $quarto[$key] ?></p>
                                                        <p>Hora do Check-In: <?= $lista[$key]->hora_checkin ?></p>
                                                        <p>Valor Check-In: <?= numfmt_format_currency($padrao, $lista[$key]->valor_diaria, 'BRL') ?></p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <p><?= @Date('d/m/Y', strtotime($lista[$key]->check_in)) ?></p>
                                </div>
                                <div class="check-out_div text-center">
                                    <?php
                                    if ($lista[$key]->hora_checkout == '00:00:00') {
                                    ?>
                                        <a href="<?= URL_BASE ?>reservas/checkout/<?= $lista[$key]->id_reserva ?>" class="text-danger">
                                            <span class="material-symbols-sharp icon-check-in">
                                                calendar_month
                                            </span>
                                        </a>
                                    <?php
                                    } else {
                                    ?>
                                        <div class="dropdown click">
                                            <span class="material-symbols-sharp icon-check-in text-darkblue" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                calendar_month
                                            </span>
                                            <div class="dropdown-menu">
                                                <ul>
                                                    <li>
                                                        <p>Quarto: <?= $quarto[$key] ?></p>
                                                        <p>Hora do Check-Out: <?= $lista[$key]->hora_checkout ?></p>
                                                        <p>Valor Check-In: <?= numfmt_format_currency($padrao, $lista[$key]->valor_diaria, 'BRL') ?></p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <p><?= Date('d/m/Y', strtotime($lista[$key]->check_out)) ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="footer_reserva">
                            <div class="d-flex">
                                <div>
                                    <a href="<?= URL_BASE ?>reservas/edit/<?= $lista[$key]->id_reserva ?>" class="edit__button-link" title="Editar Reserva">
                                        <span class="material-symbols-sharp">
                                            edit
                                        </span>
                                    </a>
                                </div>
                                <div>
                                    <?php
                                    if (($lista[$key]->hora_checkin == '00:00:00')) {
                                    ?>
                                        <a href="<?= URL_BASE ?>reservas/delete/<?= $lista[$key]->id_reserva ?>" class="delete__button-link" title="Deletar Reserva">
                                            <span class="material-symbols-sharp">
                                                block
                                            </span>
                                        </a>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div>
                                    <a href="<?= URL_BASE ?>reservas/entradas/<?= $lista[$key]->id_reserva ?>" class="entradas__button-link" title="Entradas">
                                        <span class="material-symbols-sharp">
                                            cloud_upload
                                        </span>
                                    </a>
                                </div>
                                <div>
                                    <a href="<?= URL_BASE ?>products/create" class="products_venda__buton">
                                        <span class="material-symbols-sharp">
                                            local_pizza
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="col-md-4">
            <h1>Olá, Mundo!</h1>
        </div>
    </div>
</div>