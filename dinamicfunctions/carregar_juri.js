function carregarJuri(){
    console.log("teste");
    var select_pessoa = document.getElementById("select-pessoa");  
    var select_edicao = document.getElementById("select-edicao");




    var opcaoSelecionada = select_edicao.value;

    $.ajax({
        type: 'POST',
        url: '../dinamicfunctions/carregar_juri.php',
        data: { opcao: opcaoSelecionada },
        dataType: 'text',
        success: function(data) {
            //
            select_pessoa.innerHTML = data;
            select_pessoa.disabled = false;
        },
        error: function(error) {
            console.error('Erro na solicitação AJAX:', error);
        }
    });
}