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
	<form action="<?= URL_BASE ?>fornecedores/salvaredit/<?= $fornecedor[0]->id_fornecedores ?>" method="post" class="py-0">
		<div class="row">
			<div class="col-md-4">
				<label for="nome">Nome</label>
				<input type="text" name="nome" id="nome" placeholder="Nome do Fornecedor" class="form-control" value="<?= $fornecedor[0]->nome ?>">
			</div>
			<div class="col-md-4">
				<label for="email">Email</label>
				<input type="text" name="email" id="email" placeholder="Email do Fornecedor" class="form-control" value="<?= $fornecedor[0]->email ?>">
			</div>
			<div class="col-md-4">
				<label for="telefone">Telefone</label>
				<input type="tel" name="telefone" id="telefone" placeholder="Telefone do Fornecedor" class="form-control" value="<?= $fornecedor[0]->telefone ?>">
			</div>
		</div>
		<div class="row mt-4">
			<div class="col-md-3">
				<label for="endereco">Endereço</label>
				<input type="text" name="endereco" id="endereco" placeholder="Informe seu Endereço" class="form-control" value="<?= $fornecedor[0]->endereco ?>">
			</div>
			<div class="col-md-3">
				<label for="chave_pix">Chave PIX</label>
				<input type="text" name="chave_pix" id="chave_pix" placeholder="Chave PIX do Fornecedor" class="form-control" value="<?= $fornecedor[0]->chave_pix ?>">
			</div>
		</div>
		<div class="row mt-5">
			<div class="col-md-3">
				<button type="submit" class="btn__save_forn w-100">Salvar Fornecedor</button>
			</div>
		</div>
	</form>
</div>