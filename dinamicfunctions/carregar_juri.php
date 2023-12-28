<?php
    require "../services/conexao.php";  
    $ano = '';
    $nome = '';
    if(isset($_POST['opcao'])){
        $opcaoSelecionada = $_POST["opcao"];
        list($nome, $ano) = explode('-', $opcaoSelecionada);
    }

    
    $conn = new Conexao();
    $conn = $conn->conectar();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT DISTINCT FK_PESSOA_nome_artistico as nome_artistico
            FROM ENominado
            WHERE FK_PESSOA_nome_artistico NOT IN (SELECT FK_PESSOA_nome_artistico FROM ENominado WHERE FK_PREMIO_ano = :ano AND FK_PREMIO_nome = :nome)
            "; 
    $result = $conn->prepare($sql);
    $result->bindValue(':ano', $ano);
    $result->bindValue(':nome', $nome);
    $result->execute();

    $options = '';  
    foreach ($result as $row) {
        $options .= "<option value='{$row['nome_artistico']}'>{$row['nome_artistico']}</option>";
    }

    echo $options;  


?>