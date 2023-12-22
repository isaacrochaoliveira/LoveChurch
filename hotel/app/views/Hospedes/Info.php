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
		<div class="col-md-4 square__info">
			<h4>Informações Pessoais</h4>
			<div class="d-flex flex-wrap justify-content-between">
				<div class="word">
					CPF
				</div>
				<div>
					<?= $info[0]->cpf ?>
				</div>
			</div>
			<div class="d-flex flex-wrap justify-content-between">
				<div class="word">
					Email
				</div>
				<div>
					<?= $info[0]->email ?>
				</div>
			</div>
			<div class="d-flex flex-wrap justify-content-between">
				<div class="word">
					Telefone
				</div>
				<div>
					<?= $info[0]->telefone ?>
				</div>
			</div>
			<div class="d-flex flex-wrap justify-content-between">
				<div class="word">
					CNPJ
				</div>
				<div>
					<?= $info[0]->cnpj ?>
				</div>
			</div>
			<div class="d-flex flex-wrap justify-content-between">
				<div class="word">
					Profissão
				</div>
				<div>
					<?= $info[0]->Profissao ?>
				</div>
			</div>
		</div>
		<div class="col-md-4 square__info">
			<h4>Informações Endereçais</h4>
			<div class="d-flex flex-wrap justify-content-between">
				<div class="word">
					Endereço					
				</div>
				<div>
					<?= $info[0]->endereco ?>
				</div>
			</div>
			<div class="d-flex flex-wrap justify-content-between">
				<div class="word">
					Bairro
				</div>
				<div>
					<?= $info[0]->bairro ?>
				</div>
			</div>
			<div class="d-flex flex-wrap justify-content-between">
				<div class="word">
					Cidade
				</div>
				<div>
					<?= $info[0]->cidade ?>
				</div>
			</div>
			<div class="d-flex flex-wrap justify-content-between">
				<div class="word">
					CEP
				</div>
				<div>
					<?= $info[0]->cep ?>
				</div>
			</div>
			<div class="d-flex flex-wrap justify-content-between">
				<div class="word">
					Nacionalidade
				</div>
				<div>
					<?= $info[0]->nacionalidade ?>
				</div>
			</div>
		</div>
		<div class="col-md-4 square__info">
			<h4>Outros Dados</h4>
			<div class="d-flex flex-wrap justify-content-between">
				<div class="word">
					Data Cadastro
				</div>
				<div>
					<?= $info[0]->data ?>
				</div>
			</div>
			<div class="d-flex flex-wrap justify-content-between">
				<div class="word">
					Place
				</div>
				<div>
					<?= $info[0]->placa ?>
				</div>
			</div>
			<div class="d-flex flex-wrap justify-content-between">
				<div class="word">
					Responsável 
				</div>
				<div>
					<?= $info[0]->responsavel ?>
				</div>
			</div>
			<div class="d-flex flex-wrap justify-content-between">
				<div class="word">
					IE
				</div>
				<div>
					<?= $info[0]->ie ?>
				</div>
			</div>
			<div class="d-flex flex-wrap justify-content-between">
				<div class="word">
					OBS
				</div>
				<div>
					<?= $info[0]->obs ?>
				</div>
			</div>
		</div>
	</div>
</div>