<?php 
    
    require "conexao.php";

    try{
        $conexao = new Conexao();
        $conexao = $conexao->conectar();
        $query = 'INSERT INTO Pessoa 
                    VALUES (:nome_artistico, :nome_verdadeiro, :sexo, :ano_nascimento, 
                    :site_, :ano_inicio, :anos_trabalhados, :status_)';
        $stmt = $conexao->prepare($query);

        $stmt->bindValue(':nome_artistico', $_POST['nome_artistico']);
        $stmt->bindValue(':nome_verdadeiro', $_POST['nome_verdadeiro']);
        $stmt->bindValue(':sexo', $_POST['sexo']);
        $stmt->bindValue(':ano_nascimento', $_POST['ano_nascimento']);
        $stmt->bindValue(':site_', $_POST['site']);
        $stmt->bindValue(':ano_inicio', $_POST['ano_inicio']);
        $stmt->bindValue(':anos_trabalhados', $_POST['anos_trabalhados']);
        $stmt->bindValue(':status_', $_POST['status']);

        $stmt->execute();

        echo 'SUCESSO';
    }catch(PDOException $e){
        echo 'ERRO';
    }
    
?>