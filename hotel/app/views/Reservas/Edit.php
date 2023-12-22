<div class="template-container">
    <h1 class="fs-22pt colors-dark-blue text-decoration-underline">Editar Reserva</h1>
    <form action="<?= URL_BASE?>reservas/edit/<?= $lista[0]->id ?>" method="post">
        <div class="row">
            <input type="hidden" name="nome_hospede" id="nome_hospede" class="form-control">
            <input type="hidden" name="tipo_quarto_create" id="tipo_quarto_create" value="" class="form-control">
            <input type="hidden" name="check_in_create" id="check_in_create" value="<?= @$check_in ?>" class="form-control">
            <input type="hidden" name="check_out_create" id="check_out_create" value="<?= @$check_out ?>" class="form-control">
            <input type="hidden" name="desconto_create" id="desconto_create" class="form-control">
            <!-- <div class="col-md-3"> -->
                <!-- <label for="">Nome do Hóspede</label> -->
                <!-- <input type="text" name="nome" id="nome" class="form-control" placeholder="Ex: José da Silva" value="<?= @$nome_salvo ?>"> -->
            <!-- </div> -->
            <!-- <div class="col-md-3"> -->
                <!-- <label for=""></label> -->
                <!-- <p> -->
                    <button type="button" class="btn-search d-none">
                        <div class="row">
                            <div class="col-md-3 div-magnifying-glass">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </div>
                            <div class="col-md-6">
                                Pesquisar
                            </div>
                        </div>
                    </button>
                    <button type="submit" class="d-none btn-enter"></button>
                <!-- </p> -->
            <!-- </div> -->
        <!-- </div> -->
    </form>
    <hr>
    <form action="<?= URL_BASE ?>reservas/salvar/<?= $lista[0]->id ?>" method="post">
        <div class="row">
            <div class="col-md-4">
                <label for="nome">Hóspede:</label>
                <select name="hospede" id="hospede" class="form-select">
                    <?php
                    foreach ($hospedes_load as $nomes) {
                    ?>
                        <option value="<?= $nomes->id ?>"><?= $nomes->nome ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-4">
                <label for="tipo_quarto">Tipo de Quarto</label>
                <select name="tipo_quarto" id="tipo_quarto" class="form-select" onchange="saves()">
                    <?php
                    if (!(count($tipos) == 1)) {
                    ?>
                        <option value="" selected>Selecione um quarto</option>
                        <?php
                    }
                    foreach ($tipos as $q) {
                        if ($RoomChoose == $q->id) {
                        ?>
                            <option value="<?= $q->id ?>" selected><?= $q->nome ?> </option>
                        <?php
                        } else {
                        ?>
                            <option value="<?= $q->id ?>"><?= $q->nome ?> </option>
                    <?php
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-1">
                <label for="quarto">Quarto</label>
                <select name="quarto" id="quarto" class="form-select">
                    <option value="<?= $quartos[0] ?>"><?= $quartos[1] ?></option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="pgto">Forma de Pagamento</label>
                <select name="pgto" id="pgto" class="form-select">
                    <?php
                    foreach ($pgto as $pag) {
                    ?>
                        <option value="<?= $pag->id ?>"><?= $pag->nome ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2">
                <label for="check_in">Check-In</label>
                <input type="date" name="check_in" id="check_in" class="form-control" value="<?= $check_in ?>" onchange="saves()">
            </div>
            <div class="col-md-2">
                <label for="check_out">Check-Out</label>
                <input type="date" name="check_out" id="check_out" class="form-control" value="<?= $check_out ?>" onchange="saves()">
            </div>
            <div class="col-md-3">
                <label for="valor_diaria">Valor Diária (R$)</label>
                <input type="text" name="valor_diaria" id="valor_diaria" step="0.01" class="form-control" value="<?= numfmt_format_currency($padrao, $valor_diaria, 'BRL') ?>">
            </div>
            <div class="col-md-3">
                <label for="valor_reserva">Valor Reserva (R$)</label>
                <input type="text" name="valor_reserva" id="valor_reserva" step="0.01" class="form-control" value="<?= numfmt_format_currency($padrao, $calculo, 'BRL') ?>">
            </div>
            <div class="col-md-2">
                <label for="valor_entrada">Valor da Entrada (R$)</label>
                <input type="number" name="valor_entrada" id="valor_entrada" step="0.01" class="form-control">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-3">
                <label for="quant_hospedes">Quant. Hóspedes</label>
                <input type="number" name="quant_hospedes" id="quant_hospedes" class="form-control">
            </div>
            <div class="col-md-3">
                <label for="desconto">Desconto (R$)</label>
                <input type="text" name="desconto" id="desconto" class="form-control" step="0.01" onkeyup="saves();" value="<?= $desconto ?>">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button type="submit" class="btn-success btn-arrow-up mt-2">
                    <div class="row">
                        <div class="col md-3 arrow-up">
                            <i class="fa-solid fa-arrow-up"></i>
                        </div>
                        <div class="col-md-6">
                            Salvar
                        </div>
                    </div>
                </button>
            </div>
        </div>
        <input type="hidden" name="valor_diaria_current" value="<?= $valor_diaria ?>">
        <input type="hidden" name="valor_reserva_current" value="<?= $calculo ?>">
    </form>
</div>