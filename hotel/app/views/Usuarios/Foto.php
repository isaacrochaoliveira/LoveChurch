<div class="template-container">
    <a href="<?= URL_BASE ?>hospedes">
    	<button type="button" class="btn-goback">
    		<span class="material-symbols-sharp" style="font-size:22pt">
    			arrow_left_alt
    		</span>
    		Voltar
    	</button>
	</a>
</div>
<div class="template-container">
	<div class="row">
		<div class="col-md-6">
			<h5><?= $usuario[0]->nome ?></h5>
			<hr>
			<div class="d-flex flex-wrap justify-content-between">
				<div>
					<p>Id</p>
				</div>
				<div>
					<p><?= $usuario[0]->id_usuario ?></p>
				</div>
			</div>
			<div class="d-flex flex-wrap justify-content-between">
				<div>
					<p>Nome</p>
				</div>
				<div>
					<p><?= $usuario[0]->nome ?></p>
				</div>
			</div>
			<div class="d-flex flex-wrap justify-content-between">
				<div>
					<p>Email</p>
				</div>
				<div>
					<p><?= $usuario[0]->email ?></p>
				</div>
			</div>
			<div class="d-flex flex-wrap justify-content-between">
				<div>
					<p>Nível</p>
				</div>
				<div>
					<p><?= $usuario[0]->nivel ?></p>
				</div>
			</div>
			<div class="d-flex flex-wrap justify-content-between">
				<div>
					<p>Ativo</p>
				</div>
				<div>
					<p><?= $usuario[0]->ativo ?></p>
				</div>
			</div>
			<div class="d-flex flex-wrap justify-content-between">
				<div>
					<p>
						Data de Cadastro
					</p>
				</div>
				<div>
					<p>
						<?= Date('d/m/y', strtotime($usuario[0]->data)) ?>
					</p>
				</div>
			</div>
			<div class="d-flex flex-wrap justify-content-between">
				<div>
					<p>Senha</p>
				</div>
				<div>
					<p><?= $usuario[0]->senha ?></p>
				</div>
			</div>
		</div>
		<div class="col-md-6 text-center">
			<img src="<?= URL_BASE ?>assets/img/sem-foto.jpg" alt="Foto do Usuário" width="240" id="target">
			<div class="mt-3">
				<form class="py-0" action="<?= URL_BASE ?>usuarios/profile/<?= $usuario[0]->id_usuario ?>" onchange="carregarImg()" method="post" enctype="multipart/form-data"> 
					<input type="file" name="photo" id="arquivo_receber" class="form-control">
					<button type="submit" class="btn__upload_photo w-75 mt-4">Salvar Imagem</button>
				</form>
			</div>
		</div>
	</div>
</div>