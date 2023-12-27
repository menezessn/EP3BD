<?php
    require "../services/conexao.php";  
    $titulo_original = '';
    $ano_producao = '';
    if(isset($_GET['opcao'])){
        $opcaoSelecionada = $_GET["opcao"];
        list($titulo_original, $ano_producao) = explode('-', $opcaoSelecionada);
    }

    
    $conn = new Conexao();
    $conn = $conn->conectar();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT FK_ATOR_nome_artistico as nome_artistico
            FROM Eator
            WHERE FK_OUTROS_titulo_original = :titulo_original AND FK_OUTROS_ano_producao = :ano_producao
            UNION
            SELECT FK_DIRETOR_nome_artistico as nome_artistico
            FROM EDiretor
            WHERE FK_FILME_titulo_original = :titulo_original AND FK_FILME_ano_producao = :ano_producao
            UNION
            SELECT FK_OUTRASFUNCOES_nome_artistico as nome_artistico
            FROM EOutrasFuncoes
            WHERE FK_FILME_titulo_original = :titulo_original AND FK_FILME_ano_producao = :ano_producao
            "; 
    $result = $conn->prepare($sql);
    $result->bindValue(':titulo_original', $titulo_original);
    $result->bindValue(':ano_producao', $ano_producao);
    $result->execute();

    $options = '';  
    foreach ($result as $row) {
        $options .= "<option value='{$row['nome_artistico']}'>{$row['nome_artistico']}</option>";
    }

    echo $options;  


?>