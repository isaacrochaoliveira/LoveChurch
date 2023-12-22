<div class="window formulario" id="janela1" style="top: 46.177px; left: 185.5px; display: block;"> 

<link rel="stylesheet" href="<?php echo URL_BASE ?>assets/css/estilo-modal.css">

<link rel="stylesheet" href="<?php echo URL_BASE ?>assets/componentes/js_modal.js">

<!-- <link rel="stylesheet" href="<?php echo URL_BASE ?>assets/componentes/js_mascara.js">

<link rel="stylesheet" href="<?php echo URL_BASE ?>assets/js/jquery.mask.js">  -->



<div class="window formulario" id="janela1">
<div class="p-4 width-100 d-inline-block">
<form action="<?php echo URL_BASE ."quarto/salvar"?>" method="POST">
   <div class="rows">
	   <div class="col-4">
		   <span class="label text-label">Nome</span>
		   <input type="text" name="nome" value="<?php echo isset($quarto->nome) ? $quarto->nome : null ?>" placeholder=" " class="form-campo campo-form">
	   </div>
	   

	   <div class="col-4">
		   <span class="label text-label">Valor</span>
		   <input type="text" name="valor" value= "<?php echo isset($quarto->valor) ? $quarto->valor : null ?>" placeholder=" " class="form-campo campo-form">
	   </div>


	  
	   

	 
	   <div class="col-md-12">
		   <label>descricao</label>
		   <input type="text" class="form-control" id="descricao" name="descricao" value="<?php echo isset($quarto->descricao) ? $quarto->descricao : null ?>" placeholder="descricao">
	   </div>



	

	  
	 
	   <div class="col-md-12">
		   <label>especificacoes</label>
		   <input type="text" class="form-control" id="obs" name="especificacoes" value="<?php echo isset($quarto->especificacoes) ? $quarto->especificacoes : null ?>" placeholder="especificacoes">
	   </div>


	   <input type="hidden" name="id" value="<?php echo isset($quarto->id) ? $quarto->id : null ?>" />

	   <input type="submit" value="Cadastrar" <?php echo URL_BASE ."quarto"?> class="btn">

	   <div class="col-4 mt-3">
	   <a href="<?php echo URL_BASE ."quarto"?>">Fechar</a>
	   
		   
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

	   