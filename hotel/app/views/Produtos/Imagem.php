<div class="template-container">
    <form action="<?= URL_BASE ?>produtos/salvarimg/<?= $produtos[0]->id_produto ?>" enctype="multipart/form-data" method="post">
        <div class="row">
            <div class="col-md-6">
                <div class="drag-area">
                    <div class="icon">
                        <i class="fa-solid fa-cloud-arrow-up"></i>
                    </div>
                    <h3 class="fontsize-36px" id="headerP">Tap the button to upload image</h3>
                    <button id="buttonWP" type="button">Browser File</button>
                </div>
                <input class="form-control" id="picture" name="picture" type="file" capture hidden onchange="carregarImg()">
            </div>
            <div class="col-md-6 informations">
                <span>Editando o Produto:</span>
                <h2><?= $produtos[0]->nome ?></h2>
                <hr>
                <div class="row">
                    <div class="col-md-6 mt-3">
                        <p>Cód: <?= $produtos[0]->id_produto ?></p>
                        <p>Valor Compra: <?= numfmt_format_currency($padrao, $produtos[0]->valor_compra, 'BRL') ?></p>
                        <p>Valor Venda: <?= numfmt_format_currency($padrao, $produtos[0]->valor_venda, 'BRL') ?></p>
                        <p>Estoque: <?= $produtos[0]->estoque ?></p>
                        <button type="submit" class="btn-forwards-products__image">Guardar Imagem</button>
                    </div>
                    <div class="col-md-6 text-right">
                        <img src="<?= URL_IMAGEM ?>img/produtos/<?= $produtos[0]->foto ?>" alt="" width="260" id="target" name="target">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>