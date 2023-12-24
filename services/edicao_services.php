<?php 
    
    require "conexao.php";

    try{
        $conexao = new Conexao();
        $conexao = $conexao->conectar();
        $query = 'INSERT INTO Edicao 
                    VALUES (:ano, :FK_EVENTO_nome, :date_, :localizacao)';
        $stmt = $conexao->prepare($query);

        $stmt->bindValue(':ano', $_POST['ano']);
        $stmt->bindValue(':FK_EVENTO_nome', $_POST['evento_nome']);
        $stmt->bindValue(':date_', $_POST['data']);
        $stmt->bindValue(':localizacao', $_POST['localizacao']);

        $stmt->execute();

        

        $sucess = urlencode("Edição adicionada com sucesso, você já pode adicionar outra");
        header("Location: ../registerscreens/cadastro_edicoes.php?sucess={$sucess}");
        exit();
    }catch(PDOException $e){
        echo $e;    
    }
    
?>