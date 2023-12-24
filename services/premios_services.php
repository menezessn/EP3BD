<?php 
    
    require "conexao.php";

    try{
        $FK_EVENTO_nome = '';
        $FK_EDICAO_ano = '';
        if(isset($_POST['edicao'])){
            list($FK_EVENTO_nome, $FK_EDICAO_ano) = explode('-', $_POST["edicao"]);
        }
        $conexao = new Conexao();
        $conexao = $conexao->conectar();
        $query = 'INSERT INTO Premio 
                    VALUES (:tipo, :FK_EDICAO_ano, :FK_EVENTO_nome, :nome)';
        $stmt = $conexao->prepare($query);

        $stmt->bindValue(':tipo', $_POST['tipo']);
        $stmt->bindValue(':FK_EDICAO_ano', $FK_EDICAO_ano);
        $stmt->bindValue(':FK_EVENTO_nome', $FK_EVENTO_nome);
        $stmt->bindValue(':nome', $_POST['nome']);

        $stmt->execute();

        

        $sucess = urlencode("Prêmio adicionado com sucesso, você já pode adicionar outro");
        header("Location: ../registerscreens/cadastro_premios.php?sucess={$sucess}");
        exit();
    }catch(PDOException $e){
        echo $e;    
    }
    
?>