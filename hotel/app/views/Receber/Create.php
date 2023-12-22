<div class="template-container">
    <button type="button" onclick="javascript:history.go(-1)" class="btn-goback">
        <span class="material-symbols-sharp" style="font-size:22pt">
            arrow_left_alt
        </span>
        Voltar
    </button>
    <form action="<?= URL_BASE ?>receber/search" method="post" class="py-0">
        <div class="row mt-2">
            <div class="col-md-4">
                <div class="form-floating">
                    <input type="text" name="hospede" id="hospede" class="form-control">
                    <label for="hospede">Nome do Hópede</label>
                </div>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn-search__fileconta w-100">Carregar</button>
            </div>
        </div>
    </form>
</div>
<div class="template-container">
    <form action="<?= URL_BASE ?>receber/salvar" method="post" class="py-0">
        <div class="row">
            <div class="col-md-4">
                <label for="nome">Selecione o Hóspede</label>
                <select name="nome" id="nome" class="form-select">
                    <option value="">Nehum Selecionado</option>
                    <?php 
                        foreach ($hospedes as $nomes) {
                            ?>
                                <option value="<?= $nomes->id ?>"><?= $nomes->nome ?></option>
                            <?php
                        }
                    ?>
                </select>
            </div>
            <div class="col-md-8">
                <label for="descricao">Descrição</label>
                <input type="text" name="descricao" id="descricao" class="form-control">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2">
                <label for="valor">Valor</label>
                <input type="text" name="valor" id="valor" class="form-control">
            </div>
            <div class="col-md-2">
                <label for="data_venc">Data de Vencimento</label>
                <input type="date" name="data_venc" id="data_venc" class="form-control">
            </div>
            <div class="col-md-8">
                <label for="obs">Observação</label>
                <input type="text" name="obs" id="obs" class="form-control">
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-2">
                <button type="submit" class="btn-search__fileconta w-100">Salvar Conta</button>
            </div>
        </div>
    </form>
</div>