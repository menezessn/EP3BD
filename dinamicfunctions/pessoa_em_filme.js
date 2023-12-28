function procurarFuncoes(){
    var pessoa = document.getElementById("select-pessoa");  
    var ator = document.getElementById("ator");
    var diretor = document.getElementById("diretor");
    var outro = document.getElementById("outro");
    var checkboxTexto = document.getElementById("checkbox-texto");

    var opcaoSelecionada = pessoa.value;

    $.ajax({
        type: 'POST',
        url: '../dinamicfunctions/procurar_funcoes.php',
        data: { opcao: opcaoSelecionada },
        dataType: 'json',
        success: function(data) {
            //
            ator.checked = false;
            diretor.checked = false;
            outro.checked = false;
            // Manipular os dados recebidos
            ator.disabled = !data[0];
            diretor.disabled = !data[1];
            outro.disabled = !data[2];
            checkboxTexto.style.display = "none"
        },
        error: function(error) {
            console.error('Erro na solicitação AJAX:', error);
        }
    });
}

function mostrarFuncao(){
    var outro = document.getElementById("outro");
    var outraFuncao = document.getElementById("outra-funcao");
    

    if (outro.checked){
        outraFuncao.style.display = "block";    
        outraFuncao.setAttribute("required", "required");
    } else {
        outraFuncao.style.display = "none";
        outraFuncao.removeAttribute("required");
    }
}

function verificarDocumentario(){
    var selectFilme = document.getElementById("select-filme");
    var selectPessoa = document.getElementById("select-pessoa");
    var teste = document.getElementById("teste");



    selectPessoa.innerHTML = "<option value=''>Carregando...</option>";

    var opcaoSelecionada = selectFilme.value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Atualiza o conteúdo do segundo select com os dados recebidos
            selectPessoa.innerHTML = this.responseText;
            // Habilita o segundo select
            selectPessoa.disabled = false;
        }
    };
    xhttp.open("GET", "../dinamicfunctions/verificar_documentario.php?opcao=" + opcaoSelecionada, true);
    xhttp.send();

}


