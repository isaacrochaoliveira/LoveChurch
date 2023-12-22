<div class="template-container">
    <div class="div__check-in">
        <div class="d-flex flex-wrap justify-content-around align-items-center">
            <div class="informations">
                <?php
                for ($key = 0; $key < count($lista); $key++) {
                ?>
                    <div class="d-flex flex-wrap justify-content-between">
                        <div>
                            <p><strong>Id da Reserva:</strong></p>
                        </div>
                        <div>
                            <?= $lista[$key]->id_reserva ?>
                        </div>
                    </div>
                    <div class="d-flex flex-wrap justify-content-between">
                        <div>
                            <p><strong>Nome do Hóspede:</strong></p>
                        </div>
                        <div>
                            <?= $hospede[$key]->nome ?>
                        </div>
                    </div>
                    <div class="d-flex flex-wrap justify-content-between">
                        <div>
                            <p><strong>Check-In e Check-Out:</strong></p>
                        </div>
                        <div>
                            <?= Date('d/m/y', strtotime($lista[$key]->check_in)) ?> | <?= Date('d/m/y', strtotime($lista[$key]->check_out)) ?>
                        </div>
                    </div>
                    <div class="d-flex flex-wrap justify-content-between">
                        <div>
                            <p><strong>Dias de Hóspedagem:</strong></p>
                        </div>
                        <div>
                            <?= date('d', strtotime($lista[$key]->check_out)) - date('d', strtotime($lista[$key]->check_in)) ?> Dia(s)
                        </div>
                    </div>
                    <div class="d-flex flex-wrap justify-content-between">
                        <div>
                            <p><strong>Valor da Diária:</strong></p>
                        </div>
                        <div>
                            <?= numfmt_format_currency($padrao, $lista[$key]->valor_diaria, 'BRL') ?>
                        </div>
                    </div>
                    <div class="d-flex flex-wrap justify-content-between">
                        <div>
                            <p><strong>Valor da Reserva:</strong></p>
                        </div>
                        <div>
                            <?= numfmt_format_currency($padrao, $lista[$key]->valor, 'BRL') ?>
                        </div>
                    </div>
                    <div class="d-flex flex-wrap justify-content-between">
                        <div>
                            <p><strong>Valor de Entrada:</strong></p>
                        </div>
                        <div>
                            <?= numfmt_format_currency($padrao, $lista[$key]->no_show, 'BRL') ?>
                        </div>
                    </div>
                    <div class="d-flex flex-wrap justify-content-between">
                        <div>
                            <p><strong>Consumo:</strong></p>
                        </div>
                        <div>
                            <?= numfmt_format_currency($padrao, $lista[$key]->consumo, 'BRL') ?>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex flex-wrap justify-content-between">
                        <div>
                            <p><strong>Restante à Pagar:</strong></p>
                        </div>
                        <div>
                            <?= numfmt_format_currency($padrao, ($lista[$key]->valor - $lista[$key]->no_show) + $lista[$key]->consumo, 'BRL') ?>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <span class="material-symbols-sharp door-front-out">
                door_front
            </span>
            <div>
                <div>
                    <a href="<?= URL_BASE ?>reservas/salvarcheckout/<?= $lista[0]->id_reserva ?>">
                        <button type="button" class="btn-check_out my-3">
                            <span class="material-symbols-sharp">
                                check_circle
                            </span>
                            CHECK-OUT
                        </button>
                    </a>
                </div>
                <div>
                    <a href="<?= URL_BASE ?>reservas" class="btn-goback my-3">
                        <span class="material-symbols-sharp">
                            arrow_back
                        </span>
                        VOLTAR
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>