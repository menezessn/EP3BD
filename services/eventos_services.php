<?php 
    
    require "conexao.php";

    try{
        $conexao = new Conexao();
        $conexao = $conexao->conectar();
        $query = 'INSERT INTO Evento 
                    VALUES (:nome, :ano_inicio, :nacionalidade, :tipo)';
        $stmt = $conexao->prepare($query);

        $stmt->bindValue(':nome', $_POST['nome']);
        $stmt->bindValue(':ano_inicio', $_POST['ano_inicio']);
        $stmt->bindValue(':nacionalidade', $_POST['nacionalidade']);
        $stmt->bindValue(':tipo', $_POST['tipo']);

        $stmt->execute();

        

        $sucess = urlencode("Evento adicionado com sucesso, você já pode adicionar outro");
        header("Location: ../registerscreens/cadastro_eventos.php?sucess={$sucess}");
        exit();
    }catch(PDOException $e){
        echo $e;    
    }
    
?>