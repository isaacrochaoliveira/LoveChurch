<div class="template-container">
    <a href="<?= URL_BASE ?>funcionarios">
    	<button type="button" class="btn-goback">
    		<span class="material-symbols-sharp" style="font-size:22pt">
    			arrow_left_alt
    		</span>
    		Voltar
    	</button>
	</a>
</div>
<div class="template-container">
	<form action="<?= URL_BASE ?>funcionarios/salvaredit/<?= $funcionario[0]->id_funcionario ?>" method="post" class="py-0">
		<div class="row">
			<div class="col-md-4">
				<label for="nome">Nome</label>
				<input type="text" name="nome" id="nome" placeholder="Nome do Funcionario" class="form-control" value="<?= $funcionario[0]->nome ?>">
			</div>
			<div class="col-md-4">
				<label for="email">Email</label>
				<input type="text" name="email" id="email" placeholder="Email do Funcionario" class="form-control" value="<?= $funcionario[0]->email ?>">
			</div>
			<div class="col-md-4">
				<label for="telefone">Telefone</label>
				<input type="tel" name="telefone" id="telefone" placeholder="Telefone do Funcionário" class="form-control" value="<?= $funcionario[0]->telefone ?>">
			</div>
		</div>
		<div class="row mt-4">
			<div class="col-md-3">
				<label for="cargo">Cargo</label>	
				<select name="cargo" id="cargo" class="form-select">
					<option value="Administrador">Administrador</option>
					<option value="Camareira">Camareira</option>
					<option value="Gerente">Gerente</option>
					<option value="Recepcionista">Recepcionista</option>
					<option value="Recreador">Recreador</option>
				</select>
			</div>
			<div class="col-md-3">
				<label for="cpf">CPF</label>
				<input type="text" name="cpf" id="cpf" placeholder="CPF do Funcionário" class="form-control" value="<?= $funcionario[0]->cpf ?>">
			</div>
			<div class="col-md-3">
				<label for="chave_pix">Chave Pix</label>
				<input type="text" name="chave_pix" id="chave_pix" placeholder="Chave Pix do Funcionário" class="form-control" value="<?= $funcionario[0]->chave_pix ?>">
			</div>
			<div class="col-md-3">
				<label for="endereco">Endereço</label>
				<input type="text" name="endereco" id="endereco" placeholder="Endereço do Funcionário" class="form-control" value="<?= $funcionario[0]->endereco ?>">
			</div>
		</div>
		<div class="row mt-4">
			<div class="col">
				<textarea cols="80" rows="7" name="obs" id="obs" class="form-control" placeholder="Obervações sobre o Funcionário">
					<?= $funcionario[0]->obs ?>
				</textarea>
			</div>
		</div>
		<div class="row mt-4">
			<div class="col-md-3">
				<button type="submit" class="btn__funcionario_create w-100">Salvar Funcionário</button>
			</div>
		</div>
	</form>
</div>