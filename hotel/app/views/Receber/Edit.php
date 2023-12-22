<div class="template-container">
    <button type="button" onclick="javascript:history.go(-1)" class="btn-goback">
        <span class="material-symbols-sharp" style="font-size:22pt">
            arrow_left_alt
        </span>
        Voltar
    </button>
</div>

<div class="template-container">
    <div>
        <p class="hospede__view_adm">Editando A Conta De <?= $hospede[0]->nome ?> (<?= $hospede[0]->id ?>)</p>
    </div>
    <form action="<?= URL_BASE ?>receber/editbill/<?= $hospede[0]->id_detalhes ?>" method="post" class="py-0">
        <div class="row">
            <div class="col-md-6">
                <label for="descricao">Descrição</label>
                <input type="text" name="descricao" id="descricao" class="form-control" value="<?= $hospede[0]->descricao_detalhes ?>">
            </div>
            <div class="col-md-6">
                <label for="obs">Observação</label>
                <input type="text" name="obs" id="obs" class="form-control" value="<?= $hospede[0]->obs ?>">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2">
                <label for="valor">Valor</label>
                <input type="text" name="valor" id="valor" class="form-control" value="<?= $hospede[0]->valor_detalhes ?>">
            </div>
            <div class="col-md-2">
                <label for="data_venc">Data de Vencimento</label>
                <input type="date" name="data_venc" id="data_venc" class="form-control" value="<?= $hospede[0]->data_venc ?>">
            </div>

        </div>
        <div class="row mt-5">
            <div class="col-md-2">
                <button type="submit" class="btn-search__fileconta w-100">Salvar Conta</button>
            </div>
        </div>
    </form>
</div>