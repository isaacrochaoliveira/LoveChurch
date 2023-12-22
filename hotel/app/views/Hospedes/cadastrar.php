 <div class="window formulario" id="janela1" style="top: 46.177px; left: 185.5px; display: block;"> 

 <link rel="stylesheet" href="<?php echo URL_BASE ?>assets/css/estilo-modal.css">

<link rel="stylesheet" href="<?php echo URL_BASE ?>assets/componentes/js_modal.js">

<!-- <link rel="stylesheet" href="<?php echo URL_BASE ?>assets/componentes/js_mascara.js">

<link rel="stylesheet" href="<?php echo URL_BASE ?>assets/js/jquery.mask.js">  -->



<div class="window formulario" id="janela1">
<div class="p-4 width-100 d-inline-block">
<form action="<?php echo URL_BASE ."hospedes/salvar"?>" method="POST">
	<div class="rows">
		<div class="col-4">
			<span class="label text-label">Nome</span>
			<input type="text" name="nome" value="<?php echo isset($hospedes->nome) ? $hospedes->nome : null ?>" placeholder=" " class="form-campo campo-form">
		</div>
		
		<div class="col-4">
			<span class="label text-label">Tipo Pessoa</span>
			<select class="form-control" name="TipoPessoa" id="TipoPessoa">
				<option value="Fisica">Física</option>
				<option value="Juridica">Jurídica</option>
			</select>
		</div>
		<div class="col-4">
			<span class="label text-label">Email</span>
			<input type="text" name="email" value= "<?php echo isset($hospedes->email) ? $hospedes->email : null ?>" placeholder=" " class="form-campo campo-form">
		</div>


		<div class="col-4">
			<span class="label text-label">Telefone</span>
			<input type="text" name="telefone"  value="<?php echo isset($hospedes->telefone) ? $hospedes->telefone : null ?>" placeholder=" " class="form-campo mascara-celular">
		</div>
		<div class="col-4">
			<span class="label text-label">Documento (CPF)</span>
			<input type="text" name="cpf" value="<?php echo isset($hospedes->cpf) ? $hospedes->cpf : null ?>" placeholder=" " class="form-campo mascara-cpf">
		</div>

		
		<div class="col-4">
			<span class="label text-label">Placa Automóvel</span>
			<input type="text" name="placa" value="<?php echo isset($hospedes->placa) ? $hospedes->placa : null ?>" placeholder=" " class="form-campo campo-form">
		</div>

		<div class="col-4">
			<span class="label text-label">Responsável</span>
			<select class="form-control" name="responsavel" id="responsavel">
				<option value="Sim">Sim</option>
				<option value="Não">Não</option>
			</select>
		</div>

		<div class="col-4">
			<span class="label text-label">Data Cadastro</span>
			<input type="Date" name="DataCadastro" value="<?php echo isset($hospedes->DataCadastro) ? $hospedes->DataCadastro : null ?>" placeholder=" " class="form-campo campo-form">
		</div>

		<div class="col-4">
			<span class="label text-label">CEP</span>
			<input type="text" name="cep" id="cep" value="<?php echo isset($hospedes->cep) ? $hospedes->cep : null ?>" placeholder=" " class="form-campo mascara-cep busca_cep">
		</div>

		<div class="col-4">
			<span class="label text-label">Bairro</span>
			<input type="text" name="bairro" value="<?php echo isset($hospedes->bairro) ? $hospedes->bairro : null ?>" placeholder=" " class="form-campo bairro">
		</div>

		<div class="col-4">
			<span class="label text-label">Rua</span>
			<input type="text" name="endereco" value="<?php echo isset($hospedes->endereco) ? $hospedes->endereco : null ?>" placeholder=" " class="form-campo rua">
		</div>
		<div class="col-4">
			<span class="label text-label">Cidade/Estado</span>
			<input type="text" name="cidade" value="<?php echo isset($hospedes->cidade) ? $hospedes->cidade : null ?>" placeholder=" " class="form-campo cidade">
		</div>
		<div class="col-4">
			<span class="label text-label">Nacionalidade</span>
			<input type="text" name="nacionalidade" value="<?php echo isset($hospedes->nacionalidade) ? $hospedes->nacionalidade : null ?>" placeholder=" " class="form-campo campo-form">
		</div>
		<div class="col-4">
			<span class="label text-label">Inscrição Estadual</span>
			<input type="text" name="InscricaoEstadual" value="<?php echo isset($hospedes->InscricaoEstadual) ? $hospedes->InscricaoEstadual : null ?>" placeholder=" " class="form-campo campo-form">
		</div>
		<div class="col-4">
			<span class="label text-label">CNPJ</span>
			<input type="text" name="cnpj" value="<?php echo isset($hospedes->cnpj) ? $hospedes->cnpj : null ?>" placeholder=" " class="form-campo mascara-cnpj">
		</div>
		<div class="col-4">
			<span class="label text-label">Empresa</span>
			<input type="text" name="Empresa" value="<?php echo isset($hospedes->Empresa) ?$hospedes->Empresa :null ?>" placeholder=" " class="form-campo campo-form">
		</div>
		<div class="col-4">
			<span class="label text-label">Telefone Comercial</span>
			<input type="text" name="FoneComercial" value="<?php echo isset($hospedes->FoneComercial) ? $hospedes->FoneComercial : null ?>" class="form-campo campo-form">
		</div>
		<div class="col-4">
			<span class="label text-label">Profissão</span>
			<input type="text" name="Profissao" value="<?php echo isset($hospedes->Profissao) ? $hospedes->Profissao : null ?>" placeholder=" " class="form-campo campo-form">
		</div>
		<div class="col-md-8">
			<label>Observações</label>
			<input type="text" class="form-control" id="obs" name="obs" value="<?php echo isset($hospedes->obs) ? $hospedes->obs : null ?>" placeholder="Observações">
		</div>


		<input type="hidden" name="id" value="<?php echo isset($hospedes->id) ? $hospedes->id : null ?>" />
		<input type="submit" value="Cadastrar" class="btn">

		<div class="col-4 mt-3">
		<a href="<?php echo URL_BASE ."hospedes"?>" class="fechar">Fechar</a>
			
		</div>


		
	</div>
</form>
	
	</div>
</div>

</div>
<!-- <div id="mascara"></div> -->


		

		<script src="<?php echo URL_BASE ?>assets/js/datatables/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo URL_BASE ?>assets/js/datatables/js/dataTables.responsive.min.js"></script>
		
		<script src="<?php echo URL_BASE ?>assets/js/jquery.mask.js"></script>	
		<script src="<?php echo URL_BASE ?>assets/js/componentes/js_data_table.js"></script>

		