<?php 
    
    require "conexao.php";

    try{
        $titulo_original = '';
        $ano_producao = '';
        if(isset($_POST['filme'])){
            list($titulo_original, $ano_producao) = explode('-', $_POST["filme"]);
        }
        $tipo = '';
        $FK_PREMIO_ano = '';
        $FK_PREMIO_nome = '';
        if(isset($_POST['premio'])){
            list($tipo, $FK_PREMIO_ano, $FK_PREMIO_nome ) = explode('-', $_POST["premio"]);
        }
        $conexao = new Conexao();
        $conexao = $conexao->conectar();
        $query = 'INSERT INTO FilmeNominado 
                VALUES (:FK_FILME_titulo_original, :FK_FILME_ano_producao, :FK_PREMIO_nome, :FK_PREMIO_ano, :FK_PREMIO_tipo, :ganhou)';
        $stmt = $conexao->prepare($query);

        $stmt->bindValue(':FK_FILME_titulo_original', $titulo_original);
        $stmt->bindValue(':FK_FILME_ano_producao', $ano_producao);
        $stmt->bindValue(':FK_PREMIO_nome', $FK_PREMIO_nome);
        $stmt->bindValue(':FK_PREMIO_ano', $FK_PREMIO_ano);
        $stmt->bindValue(':FK_PREMIO_tipo', $tipo);
        $stmt->bindValue(':ganhou', $_POST['ganhou']);

        $stmt->execute();

        $sucess = urlencode("Nominação/Premiação adicionada com sucesso, você já pode adicionar outra");
        header("Location: ../registerscreens/cadastro_filme_nominado.php?sucess={$sucess}");
        exit();
    }catch(PDOException $e){
        echo $e;    
    }
    
?>