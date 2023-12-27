<?php
    require "../services/conexao.php";  
    $titulo_original = '';
    $ano_producao = '';
    if(isset($_GET["opcao"])){
        $opcaoSelecionada = $_GET["opcao"];
        list($titulo_original, $ano_producao) = explode('|', $opcaoSelecionada);
    }

    $conn = new Conexao();
    $conn = $conn->conectar();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT FK_FILME_titulo_original
            FROM Documentario
            WHERE FK_FILME_titulo_original = :titulo_original AND FK_FILME_ano_producao = :ano_producao
            ";
    $result = $conn->prepare($sql);
    $result->bindValue(':titulo_original', $titulo_original);
    $result->bindValue(':ano_producao', $ano_producao);
    $result->execute();

    if($result->rowCount()>0){
        $sql = "SELECT FK_PESSOA_nome_artistico as nome_artistico
                FROM Diretor
                UNION
                SELECT FK_PESSOA_nome_artistico as nome_artistico
                FROM OutrasFuncoes
        ";
    }else{
        $sql = "SELECT nome_artistico as nome_artistico
                From Pessoa
        ";
    }
    $result = $conn->prepare($sql);
    $result->execute();
    $options = '';  
    $options .= "<option value=''>Selecione...</option>";
    foreach ($result as $row) {
        $options .= "<option value='{$row['nome_artistico']}'>{$row['nome_artistico']}</option>";
    }

    echo $options  


?>