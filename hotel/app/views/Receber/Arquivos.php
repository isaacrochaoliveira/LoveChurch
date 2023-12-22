<div class="template-container">
    <button type="button" onclick="javascript:history.go(-1)" class="btn-goback">
        <span class="material-symbols-sharp" style="font-size:22pt">
            arrow_left_alt
        </span>
        Voltar
    </button>
</div>
<div class="template-container">
    <?php
    $this->verMsg();
    $this->verErro();
    ?>
    <div class="row">
        <div class="col-md-6">
            <h5>Detalhes da Reserva</h5>
            <hr>
            <div class="d-flex flex-wrap justify-content-between">
                <div>
                    <p>Cod:</p>
                </div>
                <div>
                    <p><?= $detalhes[0]->id_detalhes ?></p>
                </div>
            </div>
            <div class="d-flex flex-wrap justify-content-between">
                <div>
                    <p>Cód Hóspede</p>
                </div>
                <div>
                    <p><?= $detalhes[0]->id_hospede ?></p>
                </div>
            </div>
            <div class="d-flex flex-wrap justify-content-between">
                <div>
                    <p>Hóspede</p>
                </div>
                <div>
                    <p><?= $detalhes[0]->nome ?></p>
                </div>
            </div>
            <div class="d-flex flex-wrap justify-content-between">
                <div>
                    <p>Descrição</p>
                </div>
                <div>
                    <p><?= $detalhes[0]->descricao_detalhes ?></p>
                </div>
            </div>
            <div class="d-flex flex-wrap justify-content-between">
                <div>
                    <p>Valor</p>
                </div>
                <div>
                    <p><?= numfmt_format_currency($padrao, $detalhes[0]->valor_detalhes, 'BRL') ?></p>
                </div>
            </div>
            <div class="d-flex flex-wrap justify-content-between">
                <div>
                    Lançamento/Vencimento
                </div>
                <div>
                    <p><?= Date('d/m/y', strtotime($detalhes[0]->data_lanc)) ?> - <?= Date('d/m/y', strtotime($detalhes[0]->data_venc)) ?></p>
                </div>
            </div>
            <div class="d-flex flex-wrap justify-content-between">
                <div>
                    <p>Arquivos Atribuídos</p>
                </div>
                <div>
                    <p><?= count($arquivos) ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h5>Upload de Arquivo</h5>
            <hr>
            <div class="text-center">
                <img src="<?= URL_IMAGEM ?>img/sem-foto.jpg" alt="" id="target" width="180">
                <form action="<?= URL_BASE ?>receber/file/<?= $detalhes[0]->id_detalhes ?>" method="post" enctype="multipart/form-data" class="py-0">
                    <input type="file" name="arquivo_receber" id="arquivo_receber" class="form-control mt-3" onchange="carregarImg()">
                    <input type="text" name="nome_arquivo" id="nome_arquivo" placeholder="Nome do Arquivo*" required class="form-control mt-2">
                    <br>
                    <div>
                        <button type="submit" class="btn__upload-file">
                            Salvar Arquivo
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>