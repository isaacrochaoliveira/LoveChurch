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
	<form action="<?= URL_BASE ?>hospedes/salvaredit/<?= $hospede[0]->id ?>" method="post" class="py-0">
		<div class="row">
			<div class="col-md-4">
				<label for="nome">Nome</label>
				<input type="text" name="nome" id="nome" class="form-control" placeholder="Nome" value="<?= $hospede[0]->nome ?>">
			</div>
			<div class="col-md-4">
				<label for="email">E-mail</label>
				<input type="text" name="email" id="email" class="form-control" placeholder="Email" value="<?= $hospede[0]->email ?>">
			</div>
			<div class="col-md-4">
				<label for="telefone">Telefone</label>
				<input type="text" name="telefone" id="telefone" class="form-control" placeholder="Telefone" value="<?= $hospede[0]->email ?>">
			</div>
		</div>
		<div class="row mt-4">
			<div class="col-md-4">
				<label for="bairro">Bairro</label>
				<input type="text" name="bairro" id="bairro" class="form-control" placeholder="Bairro" value="<?= $hospede[0]->bairro ?>">
			</div>
			<div class="col-md-4">
				<label for="endereco">Endereço</label>
				<input type="text" name="endereco" id="endereco_hos" class="form-control" placeholder="Endereço" value="<?= $hospede[0]->endereco ?>">
			</div>
			<div class="col-md-4">
				<label for="cidade">Cidade</label>
				<input type="text" name="cidade" id="cidade" class="form-control" placeholder="Cidade" value="<?= $hospede[0]->cidade ?>">
			</div>
		</div>
		<div class="row mt-4">
			<div class="col-md-3">
				<label for="documento">Documento (CPF)</label>
				<input type="text" name="documento" id="documento" class="form-control" placeholder="Documento" value="<?= $hospede[0]->cpf ?>">
			</div>
			<div class="col-md-3">
				<label for="placa">Placa Automóvel</label>
				<input type="text" name="place" id="placa" placeholder="Se Caso Exista" class="form-control" value="<?= $hospede[0]->placa ?>">
			</div>
			<div class="col-md-3">
				<label for="responsavel">Responsável</label>
				<select name="responsavel" id="responsavel" class="form-select">
					<option value="Sim">Sim</option>
					<option value="Não">Não</option>
				</select>
			</div>
			<div class="col-md-3">
				<label for="cep">CEP</label>
				<input type="text" name="cep" id="cep" class="form-control" placeholder="00000-00" value="<?= $hospede[0]->cep ?>">
			</div>
		</div>
		<div class="row mt-4">
			<div class="col-md-3">
				<label for="nacionalidade">Nacionalidade</label>
				<input type="text" name="nacionalidade" id="nacionalidade" class="form-control" placeholder="Nacionalidade" value="<?= $hospede[0]->nacionalidade ?>">
			</div>
			<div class="col-md-3">
				<label for="ie">Inscrição Estadual (IE)</label>
				<input type="text" name="ie" id="ie" class="form-control" placeholder="Inscrição Estadual (IE)" value="<?= $hospede[0]->ie ?>">
			</div>
			<div class="col-md-3">
				<label for="cnpj">CNPJ</label>
				<input type="text" name="cpnj" id="cnpj" class="form-control" placeholder="CNPJ" value="<?= $hospede[0]->InscricaoEstadual ?>">
			</div>
			<div class="col-md-3">
				<label for="profissao">Profissão</label>
				<input type="text" name="profissao" id="profissao" class="form-control" placeholder="Profissão" value="<?= $hospede[0]->Profissao ?>">
			</div>
		</div>
		<div class="row mt-4">
			<div class="col">
				<textarea cols="80" rows="4" name="obs" id="obs" class="form-control">
					<?= $hospede[0]->obs ?>
				</textarea>
			</div>
		</div>
		<div class="row mt-5">
			<div class="col-md-3">
				<button type="submit" class="submit__button_hos w-100">Salvar Hóspede</button>
			</div>
		</div>
	</form>
</div>