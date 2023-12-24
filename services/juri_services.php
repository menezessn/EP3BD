<?php 
    
    require "conexao.php";

    try{
        $FK_PREMIO_nome = '';
        $ano = '';
        if(isset($_POST['edicao'])){
            list($FK_PREMIO_nome, $ano ) = explode('-', $_POST["edicao"]);
        }
        $conexao = new Conexao();
        $conexao = $conexao->conectar();
        $query = 'INSERT INTO Ejuri 
                VALUES (:FK_PESSOA_nome_artistico, :FK_EDICAO_ano, :FK_EDICAO_nome )';
        $stmt = $conexao->prepare($query);

        $stmt->bindValue(':FK_PESSOA_nome_artistico', $_POST['pessoa']);
        $stmt->bindValue(':FK_EDICAO_ano', $ano );
        $stmt->bindValue(':FK_EDICAO_nome', $FK_PREMIO_nome);

        $stmt->execute();

        $sucess = urlencode("Juri adicionado com sucesso, você já pode adicionar outro");
        header("Location: ../registerscreens/cadastro_juri.php?sucess={$sucess}");
        exit();
    }catch(PDOException $e){
        echo $e;    
    }
    
?>