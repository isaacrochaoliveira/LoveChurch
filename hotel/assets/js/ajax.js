$(document).ready(function () {
    listar();
    legend();
});

function listar(p1, p2, p3, p4, p5) {
    $.ajax({
        url: 'paginas/' + pag + "/listar.php",
        method: 'POST',
        data: { p1, p2, p3, p4, p5 },
        dataType: "html",

        success: function (result) {
            $("#listar").html(result);
            $('#mensagem-excluir').text('');
        }
    });
}

function legend(p1, p2, p3, p4, p5) {
    $.ajax({
        url: 'paginas/' + pag + "/legend.php",
        method: 'POST',
        data: { p1, p2, p3, p4, p5 },
        dataType: "html",

        success: function (result) {
            $("#legend_apto").html(result);
            $('#mensagem-excluir').text('');
        }
    });
}

function inserir() {
    $('#mensagem').text('');
    $('#titulo_inserir').text('Inserir Registro');
    $('#modalForm').modal('show');
    limparCampos();
}

$("#form").submit(function () {

    event.preventDefault();
    var formData = new FormData(this);

    $.ajax({
        url: 'paginas/' + pag + "/salvar.php",
        type: 'POST',
        data: formData,

        success: function (mensagem) {
            $('#mensagem').text('');
            $('#mensagem').removeClass()
            if (mensagem.trim() == "Salvo com Sucesso") {

                $('#btn-fechar').click();
                listar();

            } else {

                $('#mensagem').addClass('text-danger')
                $('#mensagem').text(mensagem)
            }


        },

        cache: false,
        contentType: false,
        processData: false,

    });

});

function excluir(id) {
    $('#mensagem-excluir').text('Excluindo...')

    $.ajax({
        url: 'paginas/' + pag + "/excluir.php",
        method: 'POST',
        data: { id },
        dataType: "html",

        success: function (mensagem) {
            if (mensagem.trim() == "Excluído com Sucesso") {
                listar();
            } else {
                $('#mensagem-excluir').addClass('text-danger')
                $('#mensagem-excluir').text(mensagem)
            }
        }
    });
}

function ativar(id, acao) {
    $.ajax({
        url: 'paginas/' + pag + "/mudar-status.php",
        method: 'POST',
        data: { id, acao },
        dataType: "html",

        success: function (mensagem) {
            if (mensagem.trim() == "Alterado com Sucesso") {
                listar();
            } else {
                $('#mensagem-excluir').addClass('text-danger')
                $('#mensagem-excluir').text(mensagem)
            }
        }
    });
}


// Função para realizar a busca por nome
function searchByName() {
    // Obtém o valor do input com id 'nome_h'
    var nome = $("#nome_h").val();

    // Verifica se o nome não está vazio
    if (nome.trim() !== "") {
        // Objeto com os dados a serem enviados via AJAX
        var data = {
            nome: nome
        };

        // Configuração da requisição AJAX
        $.ajax({
            url: 'hospedes/' + pag + "/lista.php", // URL do servidor PHP para busca
            method: 'post',
            data: data,
            dataType: 'html',
            success: function (msg) {
                // Insere a resposta na página
                $("#resultados").html(msg);
            },
            error: function (xhr, status, error) {
                // Trata erros de AJAX
                console.error("Erro AJAX:", status, error);
            }
        });
    } else {
        // Trata caso o nome esteja vazio
        console.warn("Por favor, insira um nome para buscar.");
    }
}

$(document).ready(function () {
    $('.btn-search').click(function () {
        var nome = $("#nome").val();
        var tipo = $("#tipo_quarto").val();
        var check_in = $("#check_in").val();
        var check_out = $("#check_out").val();
        var desconto = $("#desconto").val();

        $("#tipo_quarto_create").val(tipo);
        $("#nome_hospede").val(nome);
        $("#check_in_create").val(check_in);
        $("#check_out_create").val(check_out);
        $("#desconto_create").val(desconto);

        $('.btn-enter').click();
    })
})

function saves() {
    $(".btn-search").click();
}

function click__submits_entrada() {
    $(".btn__formentrada").click();
}

