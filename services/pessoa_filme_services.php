<?php 
    
    require "conexao.php";

    try{
        $titulo_original = '';
        $ano_producao = '';
        if(isset($_POST["filme"])){
            list($titulo_original, $ano_producao) = explode('|', $_POST["filme"]);
        }
        $conexao = new Conexao();
        $conexao = $conexao->conectar();

        if (isset($_POST["funcoes"]) && is_array($_POST["funcoes"]) && count($_POST["funcoes"]) > 0) {
            // Recuperar os interesses selecionados
            $funcoes = $_POST["funcoes"];

            foreach ($funcoes as $funcao) {
                    $query = "INSERT INTO $funcao 
                    VALUES (:nome_artistico, :ano_producao, :titulo_original, :EPrincipal)";

                    if ($funcao == 'EOutrasFuncoes'){
                        $query = "INSERT INTO $funcao 
                        VALUES (:nome_artistico, :ano_producao, :titulo_original, :outra_funcao)";
                    }


                    $stmt = $conexao->prepare($query);

                    $stmt->bindValue(':nome_artistico', $_POST['nome_artistico']);
                    $stmt->bindValue(':ano_producao',$ano_producao);
                    $stmt->bindValue(':titulo_original', $titulo_original);
                    if($funcao == 'EOutrasFuncoes'){
                        $stmt->bindValue(':outra_funcao', $_POST['outra-funcao']);
                    }else{
                        $stmt->bindValue(':EPrincipal', $_POST['Eprincipal']);
                    }


                    $stmt->execute();

            }
        }
    

        $sucess = urlencode("Pessoa adicionada ao filme com sucesso, você já pode adicionar outra");
        header("Location: ../registerscreens/cadastro_pessoa_filme.php?sucess={$sucess}");
        exit();
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
?>