function procurarFuncoes(){
    console.log("procurarFuncao");
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


