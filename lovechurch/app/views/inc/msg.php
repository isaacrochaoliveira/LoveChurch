<link rel="stylesheet" type="text/css" href="<?= URL_BASE ?>assets/plugins/toastr/toastr.min.css">
<script src="<?= URL_BASE ?>assets/plugins/jquery/jquery.min.js"></script>
<script src="<?= URL_BASE ?>assets/plugins/toastr/toastr.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        var msg = "<?= $msg->msg ?>";
        var classe = "<?= $msg->classe ?>";
        toastr.options = {
          "closeButton": true,
          "debug": false,
          "newestOnTop": true,
          "progressBar": true,
          "positionClass": "toast-bottom-right",
          "preventDuplicates": false,
          "onclick": null,
          "showDuration": "500",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        }

        toastr["<?=$msg->classe?>"]("<?= $msg->msg ?>")
    })
</script>