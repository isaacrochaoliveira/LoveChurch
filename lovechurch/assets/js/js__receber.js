// PARA PÁGINA DE RECEBER: QUANTO CLICAR NO ENTER CLICA NO BUTTON FILTRO
$(document).keypress(function(e) {
    if (e == 13) {
        $('#submit--receber__filter').click();
    }
});

