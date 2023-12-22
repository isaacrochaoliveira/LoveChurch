<div class="template-container">
    <div class="row">
        <div class="col-md-6 informations-leave-products">
            <p>Cód: <?= $produto[0]->id_produto ?></p>
            <p>Produto: <?= $produto[0]->nome ?></p>
            <p>Valor Venda: <?= numfmt_format_currency($padrao, $produto[0]->valor_venda, 'BRL') ?></p>
            <p>Valor Compra: <?= numfmt_format_currency($padrao, $produto[0]->valor_compra, 'BRL') ?></p>
            <p>Estoque: <?= $produto[0]->estoque ?></p>
            <p>Nível Limite: <?= $produto[0]->nivel_estoque ?></p>
            <p>Categoria: <?= $categoria[0]->nome ?></p>
        </div>
        <div class="col-md-6">
            <form action="<?= URL_BASE ?>produtos/leave/<?= $produto[0]->id_produto ?>" method="post">
                <div class="row ml-2">
                    <div class="col">
                        <div class="form-floating">
                            <input type="text" name="motivo" id="motivo" class="form-control" placeholder="Motivo da Saída de Produto">
                            <label for="motivo">Motivo</label>
                        </div>
                    </div>
                </div>
                <div class="row ml-2 mt-3">
                    <div class="col">
                        <div class="form-floating">
                            <input type="text" name="quantidade" id="quantidade" class="form-control" placeholder="Quantidade">
                            <label for="quantidade">Quantidade</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn-btn__leave w-100">Salvar Saída do Produto</button>
                    </div>
                    <div class="col">
                        <button class="btn-btn__goback w-100" onclick="javascript:history.go(-1)" type="button">Voltar à Lista de Produtos</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>