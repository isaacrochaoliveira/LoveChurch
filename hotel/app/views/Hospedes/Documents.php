<div class="template-container">
    <button type="button" onclick="javascript:history.go(-1)" class="btn-goback">
        <span class="material-symbols-sharp" style="font-size:22pt">
            arrow_left_alt
        </span>
        Voltar
    </button>
</div>
<div class="template-container">
	<div class="row">
		<div class="col-md-6">
			<h4>Hóspede: <?= $hospedes[0]->nome ?></h4>
			<hr>
			<div class="d-flex flex-wrap justify-content-between">
				<div>
					<p>Cód</p>
				</div>
				<div>
					<p><?= $hospedes[0]->id ?></p>
				</div>
			</div>
			<div class="d-flex flex-wrap justify-content-between">
				<div>
					<p>Nome</p>
				</div>
				<div>
					<p><?= $hospedes[0]->nome ?></p>
				</div>
			</div>
			<div class="d-flex flex-wrap justify-content-between">
				<div>
					<p>Email: </p>
				</div>
				<div>
					<p><?= $hospedes[0]->email ?></p>
				</div>
			</div>
			<div class="d-flex flex-wrap justify-content-between">
				<div>
					<p>CPF</p>
				</div>
				<div>
					<p><?= $hospedes[0]->cpf ?> </p>
				</div>
			</div>
			<div class="d-flex flex-wrap justify-content-between">
				<div>
					<p>Data Cadastro</p>
				</div>
				<div>
					<p><?= $hospedes[0]->data ?></p>
				</div>
			</div>
			<div class="d-flex flex-wrap justify-content-between">
				<div>
					<p>Observação</p>
				</div>
				<div>
					<p><?= $hospedes[0]->obs ?></p>
				</div>
			</div>
			<div class="d-flex flex-wrap justify-content-between">
				<div>
					<p>CEP</p>
				</div>
				<div>
					<p><?= $hospedes[0]->cep ?></p>
				</div>
			</div>
			<div class="d-flex flex-wrap justify-content-between">
				<div>
					<p>Nascionalidade</p>
				</div>
				<div>
					<p><?= $hospedes[0]->nacionalidade ?></p>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<h4>Importe seu documento para este Hóspede</h4>
			<hr>
			<div class="text-center">
                <img src="<?= URL_IMAGEM ?>img/sem-foto.jpg" alt="" id="target" width="180">
                <form action="<?= URL_BASE ?>hospedes/savefile/<?= $hospedes[0]->id ?>" method="post" enctype="multipart/form-data" class="py-0">
                    <input type="file" name="arquivo_hospede" id="arquivo_hospede" class="form-control mt-3" onchange="carregarImg()">
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
<div>
