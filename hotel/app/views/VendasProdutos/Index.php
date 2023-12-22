<a href="<?= URL_BASE ?>products/create" class="btn-cad d-inline-block btn-verde">
    <span class="material-symbols-sharp">
        add
    </span>
    Nova Venda
</a>
<div class="template-container">
    <form action="<?= URL_BASE ?>products/filter" method="post">
        <div class="row">
            <div class="col-md-4">
                <select name="tipo_search" id="tipo_search" class="form-select">
                    <option value="">Selecione o modo de Pesquisa</option>
                    <option value="nome">Nome do Hóspede</option>
                    <option value="id">Id da Reserva</option>
                    <option value="quarto">Número do Quarto</option>
                </select>
            </div>
            <div class="col-md-3">
                <input type="text" name="search" id="search" class="form-control">
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn-search">
                    <div class="row">
                        <div class="col-md-3 div-magnifying-glass">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                        <div class="col-md-6">
                            Pesquisar
                        </div>
                    </div>
                </button>
            </div>
        </div>
    </form>
    <div class="row mt-3">
        <?php
        for ($key = 0; $key < count($vendas); $key++) {
        ?>
            <div class="col-md-6">
                <div class="square__detail">
                    <div class="row align-items-center">
                        <div class="col-md-9">
                            <p><?= $vendas[$key]->nome ?></p>
                            <p>(<?= $vendas[$key]->quantidade ?>) - <?= $vendas[$key]->nome ?></p>
                            <div class="more_information">
                                <p><?= numfmt_format_currency($padrao, $vendas[$key]->valor_vp * $vendas[$key]->quantidade, 'BRL') ?></p>
                                <p>Quarto <?= $vendas[$key]->numero ?></p>
                                <p>Check-In Dia <?= Date('d/m/Y', strtotime($vendas[$key]->check_in)) ?></p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <i class="fa-solid fa-burger"></i>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>