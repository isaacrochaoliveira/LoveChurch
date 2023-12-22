<?php
$total = 0;
$Subtotal = 0;
?>
<div class="template-container">
    <div class="d-flex">
        <div class="col-md-6 consumos">
            <?php
            for ($key = 0; $key < count($consumo); $key++) {
            ?>
                <div class="consumo__square">
                    <div class="d-flex flex-wrap justify-content-between">
                        <div>
                            <p>Consumo/Tipo do Consumo:</p>
                        </div>
                        <div>
                            <p><?= $consumo[$key]->nome ?> / <?= $consumo[$key]->nametag ?></p>
                        </div>
                    </div>
                    <div class="d-flex flex-wrap justify-content-between">
                        <div>
                            <p>Valor/Quantidade:</p>
                        </div>
                        <div>
                            <p><?= numfmt_format_currency($padrao, $consumo[$key]->valor, 'BRL') ?> (<?= $consumo[$key]->quantidade ?>)</p>
                        </div>
                    </div>
                    <div class="d-flex flex-wrap justify-content-between">
                        <div>
                            <p>SubTotal</p>
                        </div>
                        <div>
                            <p><?= numfmt_format_currency($padrao, ($consumo[$key]->quantidade * $consumo[$key]->valor), 'BRL') ?></p>
                        </div>
                    </div>
                </div>
            <?php
                $total += ($consumo[$key]->valor * $consumo[$key]->quantidade);
                $Subtotal += ($consumo[$key]->valor * $consumo[$key]->quantidade);
            }
            $total -= $lista[$key]->consumo_entrada;
            ?>
            <div class="d-flex flex-wrap justify-content-between consumo__square total">
                <div>
                    <p>Total:</p>
                </div>
                <div>
                    <span style="text-decoration: line-through; font-size: 14pt"><?= numfmt_format_currency($padrao, $Subtotal, 'BRL') ?></span>
                    <span><?= numfmt_format_currency($padrao, $total, 'BRL') ?></span>
                </div>
            </div>
            <div class="d-flex flex-wrap justify-content-between consumo__square total">
                <div>
                    <p>Entrada</p>
                </div>
                <div>
                    <span><?= numfmt_format_currency($padrao, $consumos, 'BRL') ?></span>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="d-flex flex-wrap justify-content-between">
                <div>
                    <p><strong>Id da Reserva:</strong></p>
                </div>
                <div>
                    <?= $lista[0]->id_reserva ?>
                </div>
            </div>
            <div class="d-flex flex-wrap justify-content-between">
                <div>
                    <p><strong>Nome do Hóspede:</strong></p>
                </div>
                <div>
                    <?= $hospede[0]->nome ?>
                </div>
            </div>
            <div class="d-flex flex-wrap justify-content-between">
                <div>
                    <p><strong>Check-In e Check-Out:</strong></p>
                </div>
                <div>
                    <?= Date('d/m/y', strtotime($lista[0]->check_in)) ?> | <?= Date('d/m/y', strtotime($lista[0]->check_out)) ?>
                </div>
            </div>
            <div class="d-flex flex-wrap justify-content-between">
                <div>
                    <p><strong>Dias de Hóspedagem:</strong></p>
                </div>
                <div>
                    <?= date('d', strtotime($lista[0]->check_out)) - date('d', strtotime($lista[0]->check_in)) ?> Dia(s)
                </div>
            </div>
            <div class="d-flex flex-wrap justify-content-between">
                <div>
                    <p><strong>Valor da Diária:</strong></p>
                </div>
                <div>
                    <?= numfmt_format_currency($padrao, $lista[0]->valor_diaria, 'BRL') ?>
                </div>
            </div>
            <div class="d-flex flex-wrap justify-content-between">
                <div>
                    <p><strong>Valor da Reserva:</strong></p>
                </div>
                <div>
                    <?= numfmt_format_currency($padrao, $lista[0]->valor, 'BRL') ?>
                </div>
            </div>
            <div class="d-flex flex-wrap justify-content-between">
                <div>
                    <p><strong>Valor de Entrada:</strong></p>
                </div>
                <div>
                    <?= numfmt_format_currency($padrao, $lista[0]->no_show, 'BRL') ?>
                </div>
            </div>
            <div class="d-flex flex-wrap justify-content-between">
                <div>
                    <p><strong>Consumo:</strong></p>
                </div>
                <div>
                    <?= numfmt_format_currency($padrao, $lista[0]->consumo, 'BRL') ?>
                </div>
            </div>
            <hr>
            <div class="d-flex flex-wrap justify-content-between">
                <div>
                    <p><strong>Restante à Pagar:</strong></p>
                </div>
                <div>
                    <?= numfmt_format_currency($padrao, ($lista[0]->valor - $lista[0]->no_show) + $lista[0]->consumo, 'BRL') ?>
                </div>
            </div>
            <div class="d-flex flex-wrap justify-content-between">
                <div>
                    <p><strong>Entrada:</strong></p>
                </div>
                <div>
                    <?= numfmt_format_currency($padrao, $lista[0]->no_show, 'BRL') ?>
                </div>
            </div>
        </div>
    </div>
    <div>
        <br>
        <br>
        <br>
        <form action="<?= URL_BASE ?>reservas/entradasin/<?= $lista[0]->id_reserva?>" method="post" class="form-entradas">
            <div class="row">
                <div class="col-md-6 text-center">
                    <label for="consumos">Entrada de Conumos</label>
                    <input type="text" name="consumos" id="consumos" placeholder="R$ 0,00" class="form-control text-center" onchange="click__submits_entrada()">
                </div>
                <div class="col-md-6 text-center">
                    <label for="reservas">Entrada de Reservas</label>
                    <input type="text" name="reservas" id="reservas" placeholder="R$ 0,00" class="form-control text-center" onchange="click__submits_entrada()">
                </div>
            </div>
            <button type="submit" class="d-none btn__formentrada"></button>
        </form>
    </div>
</div>