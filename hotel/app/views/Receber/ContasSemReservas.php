<div class="template-container">
    <form action="<?= URL_BASE ?>receber/billsfilters" method="post" class="padding-0">
        <div class="row">
            <div style="width: 40px" class="col-md-1 my-auto text-left">
                <div class="dropdown hover" id="submenu__option_receber">
                    <span class="material-symbols-sharp">
                        menu
                    </span>
                    <div class="dropdown-menu">
                        <li>
                            <a href="<?= URL_BASE ?>receber/index" class="btn-nova__contasemreservaconta dropdown-item">
                                <span class="material-symbols-sharp">
                                    domain_disabled
                                </span>
                                Hóspedes Com Reserva
                            </a>
                        </li>
                        <li>
                            <a href="<?= URL_BASE ?>receber/create" class="btn-nova__fileconta  dropdown-item">
                                <span class="material-symbols-sharp">
                                    note_add
                                </span>
                                Nova Conta
                            </a>
                        </li>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating">
                    <input type="text" name="nome" id="nome" placeholder="Pesquisar Pelo Nome" class="form-control">
                    <label for="nome">Pesquisar Pelo Nome</label>
                </div>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn_button-search__receber w-100">
                    Carregar Filtro
                </button>
            </div>
        </div>
    </form>
    <?php
    $this->verMsg();
    $this->verErro();
    ?>
</div>
<br>
<div class="template-container">
    <div class="d-flex flex-wrap justify-content-between">
        <div>
            <h3>
                Hóspedes Sem Reservas
            </h3>
        </div>
        <div>
            <a href="<?= URL_BASE ?>receber/semreservas" class="btn__reset--billsfilter">
                <span class="material-symbols-sharp">
                    restart_alt
                </span>
                RESET
            </a>
        </div>
    </div>
    <hr>
    <div class="row">
        <?php
        for ($key = 0; $key < count($receber); $key++) {
        ?>
            <div class="col-md-6">
                <div class="row square__receber">
                    <div class="col-md-8">
                        <div class="">
                            <p class="data__lanc_venc">Check-In: 00/00/000</p>
                            <span class="descricao__receber">Contas deste Hóspede</span>
                            <p class="receber__para"><?= $receber[$key]->nome ?></p>
                            <p class="receber__para">Valor total das Contas: <?= numfmt_format_currency($padrao, $total_contas[$key], 'BRL') ?></p>
                            <p class="receber__para">Este Hóspede tem <?= $detalhes[$key] ?> Contas</p>
                            <a href="<?= URL_BASE ?>receber/detailssem/<?= $receber[$key]->id ?>">
                                <button class="btn-more__info-receber w-100">
                                    Mais Informações
                                    <span class="material-symbols-sharp">
                                        lightbulb
                                    </span>
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 icon my-auto">
                        <span class="material-symbols-sharp">
                            person
                        </span>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>