<?php 
    
    require "conexao.php";

    try{
        $conexao = new Conexao();
        $conexao = $conexao->conectar();
        $query = 'INSERT INTO Filme 
                    VALUES (:titulo_original, :ano_producao, :titulo_portugues, :arrecadacao_primeiro_ano, 
                    :idioma_original, :nacionalidade, :classe, :sala_exibicao, :data_estreia)';
        $stmt = $conexao->prepare($query);

        $stmt->bindValue(':titulo_original', $_POST['titulo_original']);
        $stmt->bindValue(':ano_producao', $_POST['ano_producao']);
        $stmt->bindValue(':titulo_portugues', $_POST['titulo_portugues']);
        $stmt->bindValue(':arrecadacao_primeiro_ano', $_POST['arrecadacao_primeiro_ano']);
        $stmt->bindValue(':idioma_original', $_POST['idioma_original']);
        $stmt->bindValue(':nacionalidade', $_POST['nacionalidade']);
        $stmt->bindValue(':classe', $_POST['classe']);
        $stmt->bindValue(':sala_exibicao', $_POST['sala_exibicao']);
        $stmt->bindValue(':data_estreia', $_POST['data_estreia']);

        $stmt->execute();

        $tabela_tipo = $_POST['tipo'];
        $query = "INSERT INTO $tabela_tipo 
                    VALUES (:titulo_original, :ano_producao)";

        $stmt = $conexao->prepare($query);

        $stmt->bindValue(':titulo_original', $_POST['titulo_original']);
        $stmt->bindValue(':ano_producao',$_POST['ano_producao']);

        $stmt->execute();

        $sucess = urlencode("Filme adicionado com sucesso, você já pode adicionar outro");
        header("Location: ../registerscreens/cadastro_filmes.php?sucess={$sucess}");
        exit();
    }catch(PDOException $e){
        echo $e;    
    }
    
?>