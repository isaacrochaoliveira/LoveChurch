<link rel="stylesheet" type="text/css" href="<?= URL_BASE ?>assets/css/adminlte.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script type="text/javascript" src="<?= URL_BASE ?>assets/js/myFunctions/adminlte.min.js"></script>

<div class="alert alert-<?= $msg->classe ?> alert-dismissible">
    <button type="button" class="close" data-dismiss="alert"
        aria-hidden="true">&times;</button>
    <h5><i class="<?= $msg->icone ?>"></i>LoveChurch</h5>
    <?= $msg->msg ?>
</div>