<!DOCTYPE html>
<html>

<head>
	<title>Sistemas Edsure</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Modal 123
	<link rel="stylesheet" href="<?php echo URL_BASE ?>assets/css/estilo-modal.css"> -->

	
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@24,400,0,0" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	
	
	<link rel="stylesheet" type="text/css" href="<?= URL_BASE ?>assets/css/adminlte.min.css">
	
	<link rel="stylesheet" type="text/css" href="<?php echo URL_BASE ?>assets/js/datatables/css/jquery.dataTables.min.css">
	
	<link rel="stylesheet" type="text/css" href="<?php echo URL_BASE ?>assets/js/datatables/css/responsive.dataTables.min.css">
	
	
	<!-- problema aqui -->
	<link rel="stylesheet" type="text/css" href="<?php echo URL_BASE ?>assets/js/datatables/css/style_dataTable.css">
	
	
	
	
	<link rel="stylesheet" type="text/css" href="<?php echo URL_BASE ?>assets/css/auxiliar.css">
	
	<link rel="stylesheet" href="<?php echo URL_BASE ?>assets/css/grade.css">
	<link rel="stylesheet" href="<?php echo URL_BASE ?>assets/css/style.css">
	
	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?= URL_BASE ?>assets/css/myStyle.css">

	<!-- font icones -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<script src="<?php echo URL_BASE ?>assets/js/jquery.min.js"></script>
	<script>
		var base_url = "<?php echo URL_BASE ?>";
	</script> 

</head>

<body>
	<!-- alterações edvaldo -->
	<div class="base-topo">
		<?php include "menu_mobile.php" ?>
	</div>
	<div class="site">
		<?php include "menu.php" ?>

		<div class="base-geral" id="base_geral">

			<?php $this->load($view, $viewData) ?>

		</div>
	</div>
	 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="https://kit.fontawesome.com/9480317a2f.js"></script>

	<script src="<?php echo URL_BASE ?>assets/js/datatables/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo URL_BASE ?>assets/js/datatables/js/dataTables.responsive.min.js"></script>
	<script src="<?php echo URL_BASE ?>assets/js/componentes/js_data_table.js"></script>
	
	 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="https://kit.fontawesome.com/9480317a2f.js"></script>


	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="https://kit.fontawesome.com/9480317a2f.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="https://kit.fontawesome.com/9480317a2f.js"></script>

	<!-- Modal / mascara -->
	<script src="<?php echo URL_BASE ?>assets/js/componentes/js_modal.js"></script>
	<script src="<?php echo URL_BASE ?>assets/js/componentes/js_mascara.js"></script>
	<script src="<?php echo URL_BASE ?>assets/js/js.js"></script>
	<script src="<?php echo URL_BASE ?>assets/js/ajax.js"></script> 
	<script src="<?= URL_BASE ?>assets/js/script.js"></script>

	

	<style>input, select, textarea{width: 70%; padding:22px; background:#EEE; border:0}</style>
	

</body>

</html>