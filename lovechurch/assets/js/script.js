// FUNÇÃO JS PARA BUSCAR CEP
function popularform(resposta) {
    if ("erro" in resposta) {
        alert("CEP não encontrado");
        return;
    }
    console.log(resposta);
    bairro.value = resposta.bairro;
    cidade.value = resposta.localidade + " - " + resposta.uf;
    // enredeco.value = resposta.logradouro;
    //uf.value = resposta.uf;
}
$(document).ready(function() {
    let cep = document.querySelector('#cep');
    let bairro = document.querySelector('#bairro');
    let cidade = document.querySelector('#cidade');
    // let enredeco = document.querySelector('#endereco_hos');
    //let uf = document.querySelector('#uf');
    cep.addEventListener('blur', function(e) {
        let cep = e.target.value;
        let script = document.createElement('script');
        script.src = "https://viacep.com.br/ws/" + cep + "/json/?callback=popularform";
        document.body.appendChild(script);
    });

});