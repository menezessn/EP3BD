function carregarPessoas(){
    var selectPessoa = document.getElementById("select-pessoa");
    var selectFilme = document.getElementById("select-filme");


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
    xhttp.open("GET", "../dinamicfunctions/carregar_pessoa.php?opcao=" + opcaoSelecionada, true);
    xhttp.send();

}