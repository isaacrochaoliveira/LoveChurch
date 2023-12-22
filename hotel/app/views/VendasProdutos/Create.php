<div class="template-container">
    <div>
        <a href="<?= URL_BASE ?>produtos/index">
            <button class="btn-gotopage">
                Ver todos os Produtos
                <span class="material-symbols-sharp">
                    chevron_right
                </span>
            </button>
        </a>
    </div>
    <div class="square__product">
        <?php
        for ($key = 0; $key < 4; $key++) {
        ?>
            <a href="<?= URL_BASE ?>products/pickup/<?= $produtos[$key]->id_produto ?>">
                <div class="square__each">
                    <img src="<?= URL_IMAGEM ?>img/produtos/<?= $produtos[$key]->foto ?>" alt="Foto do Produto" class="img__produto">
                    <div class="informations">
                        <p><?= $produtos[$key]->nome ?></p>
                        <p><?= numfmt_format_currency($padrao, $produtos[$key]->valor_venda, 'BRL') ?></p>
                    </div>
                </div>
            </a>
        <?php
        }
        ?>
    </div>
    <div class="<?= $display ?>">
        <div class="whole_square__venda">
            <div class="col-md-6">
                <div class="informations__square">
                    <img src="<?= URL_IMAGEM ?>/img/produtos/<?= $choosed[0]->foto ?>" alt="Foto do Produto" class="img__venda">
                    <div class="informations__squarevenda">
                        <p>Cód. Produto: <?= $choosed[0]->id_produto ?></p>
                        <p>Nome: <?= $choosed[0]->nome ?></p>
                        <p>Descrição: <?= $choosed[0]->descricao ?></p>
                        <p>Valor:<?= numfmt_format_currency($padrao, $choosed[0]->valor_venda, 'BRL') ?></p>
                        <p>Estoque: <?= $choosed[0]->estoque ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <form action="<?= URL_BASE ?>products/salvar/<?= $choosed[0]->id_produto ?>" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" name="nome" id="nome" placeholder="Pesquisar Pelo Nome" class="form-control input_create_form">
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="quarto" id="quarto" placeholder="Pesquisar Pelo Quarto" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <input type="text" name="quantidade" id="quantidade" placeholder="Quantidade" class="form-control" onchange="calculo()">
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="total" id="total" placeholder="R$ 0,00" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn-saved">Procurar e Salvar</button>
                    </div>
                    <input type="hidden" name="id_produto" id="id_produto" value="<?= $choosed[0]->id_produto ?>">
                    <input type="hidden" name="valor" id="valor" value="<?= $choosed[0]->valor_venda ?>">
                </form>
            </div>
        </div>
    </div>
</div>