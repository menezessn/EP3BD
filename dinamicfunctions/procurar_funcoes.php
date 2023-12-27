<?php

    require "../services/conexao.php";

    try{

    $conn = new Conexao();
    $conn = $conn->conectar();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $funcoes = array();

    $tables = array('Ator', 'Diretor', 'OutrasFuncoes');

    foreach($tables as $table){
        $sql = "SELECT FK_PESSOA_nome_artistico
                FROM $table
                WHERE FK_PESSOA_nome_artistico = :nome_artistico
                ";
        $result = $conn->prepare($sql);
        $result->bindValue(':nome_artistico', $_POST['opcao']);
        $result->execute();
        if($result->rowCount() > 0){
            array_push($funcoes, true);
        }else{
            array_push($funcoes, false);
        }
    }
        
    echo json_encode($funcoes); 
    //echo json_encode([true,false, $_POST['nome_artistico']]);

    }catch(PDOException $e){
        echo $e->getMessage();
    }

?>