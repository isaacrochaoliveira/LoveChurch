<div class="conteudo">
			<div class="caixa">
		
			 
	<div class="rows">	
		<div class="col-12">
            <div class="col-12 mt-3 mb-3">    				
				<div class="radius-4 p-2 mostraFiltro bg-padrao">    				
					<form action="" method="">
						<div class="rows px-2 pb-3">  	
							
							<div class="col-3 mt-4">	
								<!-- Button trigger modal -->
								<a href="<?php echo URL_BASE . "quarto/Create" ?>" class="btn d-inline-block mb-2 mx-1"><i class="fas fa fa-plus-circle" aria-hidden="true"></i> Cadastrar cliente</a>
							</div>

							<!-- <a href="<?php echo URL_BASE . "hospedes/cadastrar" ?>" class="btn d-inline-block mb-2 mx-1"><i class="fas fa fa-plus-circle" aria-hidden="true"></i> Cadastrar cliente</a> -->
							
						</div> 
					</form>
				</div>               
			</div>               
			<div class="col-12">
					<div class="tabela-responsiva px-0">
						
					<?php 
					   $this->verMsg();
					?>
						
			<form action="" method="">
		</div>
		<?php $this->verMsg() ?>
		<div class="tabela-responsiva">
			<table width="100%" border="0" cellspacing="0" cellpadding="0" id="dataTable">
				<thead>
					<tr>
						<th align="left">ID</th>
						<th align="left">Nome</th>
						<th align="left">Foto</th>
						<th align="center">Valor</th>
						<th align="center">Editar</th>
						<th align="center">Excluir</th>
					</tr>
				</thead>
				<tbody>

					<?php foreach ($lista as $quarto) { ?>
						<tr>
							<td align="center"><?php echo $quarto->id ?></td>
							<td align="left"><?php echo $quarto->nome ?></td>
							<td align="left"><?php echo $quarto->foto ?></td>
							<td align="center"><?php echo $quarto->valor ?></td>

							<td align="center"><a href="<?php echo URL_BASE . "quarto/edit/" . $quarto->id ?>" class="btn btn-verde d-inline-block">Editar</a></td>

							<td align="center"><a href="javascript:;" onclick="excluir(this)" data-entidade="quarto" data-id="<?php echo $quarto->id ?>" class="btn btn-vermelho d-inline-block">Excluir</a></td>


						</tr>
					<?php } ?>

				</tbody>

			</table>


					</div>
				</div> 
		
    </div>
   </div>
   </div>
   </div>

  





   