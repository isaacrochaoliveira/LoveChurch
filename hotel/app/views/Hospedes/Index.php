<div class="template-container">
    <a href="<?= URL_BASE ?>hospedes/create" class="btn-cad d-inline-block btn-verde">
        <span class="material-symbols-sharp">
            add
        </span>
        Novo Hóspede
    </a>
    <form action="<?= URL_BASE ?>hospedes/namesearch/" method="post" class="py-0">
        <div class="row">
            <div class="col-md-3">
                <label for="">Nome do Hóspede</label>
                <input type="text" name="hospede" id="hospede" class="form-control" placeholder="" required>
            </div>
            <div class="col-md-3">
                <label for=""></label>
                <p>
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
                </p>
            </div>
        </div>
    </form>
</div>
<div class="template-container">
    <?php 
        $this->verMsg();
        $this->verErro();
    ?>
    <div>
        <table id="dataTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Documento</th>
                    <th>Cadastro</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($lista as $hospedes) {
                ?>
                    <tr>
                        <td style="width: 100px;">
                            <div class="d-flex flex-wrap justify-content-between">
                                <div>
                                    <div class="dropup" id="dropdown__hospede">
                                        <span class="material-symbols-sharp">
                                            list
                                        </span>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="<?= URL_BASE ?>hospedes/edit/<?= $hospedes->id ?>" class="dropdown-item">
                                                    <span class="material-symbols-sharp">
                                                        edit
                                                    </span>
                                                    Editar
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= URL_BASE ?>hospedes/files/<?= $hospedes->id ?>" class="dropdown-item">
                                                    <span class="material-symbols-sharp">
                                                        description
                                                    </span>
                                                    Importar Arquivos
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= URL_BASE ?>hospedes/viewfiles/<?= $hospedes->id ?>" class="dropdown-item">
                                                    <span class="material-symbols-sharp">
                                                        preview
                                                    </span>
                                                    View Arquivo
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="<?= URL_BASE ?>hospedes/reservas/<?= $hospedes->id ?>">
                                                    <span class="material-symbols-sharp">
                                                        calendar_month
                                                    </span>
                                                    Verificar Reservas
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= URL_BASE ?>hospedes/info/<?= $hospedes->id ?>" class="dropdown-item">
                                                    <span class="material-symbols-sharp">
                                                        info
                                                    </span>
                                                    Info
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= URL_BASE ?>hospedes/delete/<?= $hospedes->id ?>" class="dropdown-item">
                                                    <span class="material-symbols-sharp">
                                                        delete_forever
                                                    </span>
                                                    Excluir
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div>
                                    <p style="font-size: 14pt;"><?php echo $hospedes->id ?></p>
                                </div>
                            </div>
                        </td>
                        <td><p style="font-size: 12pt;"><?php echo $hospedes->nome ?></p></td>
                        <td><p style="font-size: 12pt;"><?php echo $hospedes->email ?></p></td>
                        <td><p style="font-size: 12pt;"><?php echo $hospedes->telefone ?></p></td>
                        <td><p style="font-size: 12pt;"><?php echo $hospedes->cpf ?></p></td>
                        <td><p style="font-size: 12pt;"><?php echo $hospedes->data ?></p></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>