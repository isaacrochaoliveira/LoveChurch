<div class="template-container">
    <button type="button" onclick="javascript:history.go(-1)" class="btn-goback">
        <span class="material-symbols-sharp" style="font-size:22pt">
            arrow_left_alt
        </span>
        Voltar
    </button>
</div>
<div class="template-container">
    <div class="d-flex flex-wrap">
        <?php
        for ($key = 0; $key < count($arquivos); $key++) {
        ?>
            <div id="view_file--receber" class="url__path_file">
                <div class="dropdown hover">
                    <span class="material-symbols-sharp">
                        keyboard_arrow_down
                    </span>
                    <div class="dropdown-menu">
                        <li>
                            <a href="<?= URL_BASE ?>receber/delfile/<?= $arquivos[$key]->id_arquivo ?>" class="dropdown-item">
                                <span class="material-symbols-sharp">
                                    folder_delete
                                </span>
                                Excluir Arquivo
                            </a>
                        </li>
                    </div>
                </div>
                <a href="<?= URL_IMAGEM ?>img/receber/<?= $arquivos[$key]->arquivo ?>" target="_blank">
                    <img src="<?= URL_IMAGEM ?>/img/<?= $corretaImg[$key] ?>" alt="Imagem Do Arquivo" width="120">
                    <hr>
                    <span><?= Date('d/m/Y', strtotime($arquivos[$key]->data_cad)) ?></span>
                    <h5 class="h5__file-img"><?= $arquivos[$key]->nome_arquivo ?></h5>
                    <div>
                        <p>Clique Para Abrir</p>
                    </div>
                </a>
            </div>
        <?php
        }
        ?>
    </div>
</div>