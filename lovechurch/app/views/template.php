<?php 
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>LoveChurch</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" type="text/css" href="<?= URL_BASE ?>assets/css/fonts.css">
	<link rel="stylesheet" type="text/css" href="<?= URL_BASE ?>assets/css/vars.css">
	<link rel="stylesheet" type="text/css" href="<?= URL_BASE ?>assets/css/config.css">
	<link rel="stylesheet" type="text/css" href="<?= URL_BASE ?>assets/css/styles.css">
</head>
<body>
	<?php 
		include "menu.php" 
	?>
	<div class="base-geral" id="base_geral">
		<?php $this->load($view, $viewData) ?>
	</div>
	<?php 
		include "rodape.php";
	?>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	<script src="<?= URL_BASE ?>assets/js/myFunctions/primary.js"></script>
</body>
</html>