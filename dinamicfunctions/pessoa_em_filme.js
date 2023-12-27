function teste(){
    //console.log("procurarFuncao");
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


