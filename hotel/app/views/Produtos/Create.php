<div class="template-container" style="padding: 30px 100px;">
    <form action="<?= URL_BASE ?>/produtos/salvar" method="post">
        <div class="row">
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" name="nome" id="nome" class="form-control">
                    <label for="nome">Nome do Produto</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-floating">
                    <input type="text" name="valor_compra" id="valor_compra" class="form-control">
                    <label for="valor_compra">Valor Compra (R$)</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-floating">
                    <input type="text" name="valor_venda" id="valor_venda" class="form-control">
                    <label for="valor_venda">Valor Venda (R$)</label>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="form-floating">
                    <select name="categoria" id="categoria" class="form-select">
                        <?php
                        foreach ($categorias as $cat) {
                        ?>
                            <option value="<?= $cat->id_categoria ?>"><?= $cat->nome_cat ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <label for="categoria">Categoria</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-floating">
                    <input type="text" name="estoque" id="estoque" class="form-control">
                    <label for="estoque">Estoque</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-floating">
                    <input type="text" name="nivel_estoque" id="nivel_estoque" class="form-control">
                    <label for="nivel_estoque">Nível Estoque</label>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="form-floating">
                        <textarea name="descricao" id="descricao" cols="30" rows="30" class="form-control">

                        </textarea>
                        <label for="descricao">Descriçao</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-4">
                <button type="submit" class="btn-cadstro-produto">
                    Salvar
                </button>
            </div>
        </div>
    </form>
</div>