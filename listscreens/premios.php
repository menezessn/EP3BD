<?php
require "../services/conexao.php";

try {
    $conn = new Conexao();
    $conn = $conn->conectar();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT tipo, FK_EDICAO_ano, FK_EVENTO_nome FROM Premio"; 
    $result = $conn->query($sql);

    

} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}


?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Pessoas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>

    <?php 

        include '../partials/header.php';

    ?>



    <div class="conteudo p-3">
        
        <div class="container">
            <?php 
                if (isset($_GET['sucess'])) {
                    $sucess = urldecode($_GET['sucess']);
                    echo '<div class="alert alert-success" role="alert">' . $sucess . '</div>';
                }
            ?>
            <div class="row">
                <h4 c>Selecione o prêmio</h4>
            </div>
            <div class="row">
                <div class="col"></div>
                <div class="col-6">

                    <form method="post" action="premios.php">

                        <div class="form-group mb-3">
                            <label  for="premio">Prêmio</label>
                            <select class="form-control" id="premio" name="premio">
                                <option selected>Escolher...</option>
                                <?php
                                    // Iterar sobre os resultados e criar opções
                                    foreach ($result as $row) {
                                        echo "<option value='{$row['tipo']}-{$row['FK_EVENTO_nome']}-{$row['FK_EDICAO_ano']}'>{$row['tipo']}-{$row['FK_EVENTO_nome']}-{$row['FK_EDICAO_ano']}</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        
                        <button type="submit" class="btn btn-primary mb-5">Enviar</button>

                    </form>

                    <div class="row">
                        
                        <?php if (count($_POST) > 0){ 
                            $tipo = '';
                            $FK_PREMIO_nome = '';
                            $FK_PREMIO_ano = '';
                            if(isset($_POST['premio'])){
                                list($tipo, $FK_PREMIO_nome, $FK_PREMIO_ano ) = explode('-', $_POST["premio"]);
                            }
                            $sql2 = "SELECT FK_FILME_titulo_original, FK_FILME_ano_producao, FK_PESSOA_nome_artistico, 
                                    FK_PREMIO_ano, FK_PREMIO_tipo, FK_PREMIO_nome, ganhou
                                    FROM Enominado
                                    WHERE FK_PREMIO_ano=:FK_PREMIO_ano and FK_PREMIO_tipo=:tipo and FK_PREMIO_nome=:FK_PREMIO_nome
                                    "; 
                            $stmt = $conn->prepare($sql2);

                            $stmt->bindValue(':FK_PREMIO_ano', $FK_PREMIO_ano);
                            $stmt->bindValue(':tipo', $tipo);
                            $stmt->bindValue(':FK_PREMIO_nome', $FK_PREMIO_nome);

                            $stmt->execute();

                            $sql3 = "SELECT FK_FILME_titulo_original, FK_FILME_ano_producao, 
                                    FK_PREMIO_ano, FK_PREMIO_tipo, FK_PREMIO_nome, ganhou
                                    FROM FilmeNominado
                                    WHERE FK_PREMIO_ano=:FK_PREMIO_ano and FK_PREMIO_tipo=:tipo and FK_PREMIO_nome=:FK_PREMIO_nome
                                    "; 
                            $stmt2 = $conn->prepare($sql3);

                            $stmt2->bindValue(':FK_PREMIO_ano', $FK_PREMIO_ano);
                            $stmt2->bindValue(':tipo', $tipo);
                            $stmt2->bindValue(':FK_PREMIO_nome', $FK_PREMIO_nome);

                            $stmt2->execute();




                            
                            ?>

                            <div class="row">
                                <h6>Ganhadores e nominados</h6>
                            </div>

                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">Título Original</th>
                                    <th scope="col">Ano de Produção</th>
                                    <?php if ($stmt->rowCount() > 0){ ?>
                                        <th scope="col">Nome Artístico</th>
                                    <?php 
                                    }
                                    ?>
                                    <th scope="col">Ano da edição</th>
                                    <th scope="col">Tipo do Prêmio</th>
                                    <th scope="col">Nome do Prêmio</th>
                                    <th scope="col">Ganhou?</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($stmt as $row) {
                                            echo "<tr>";
                                                echo "<td>{$row['FK_FILME_titulo_original']}</td>";
                                                echo "<td>{$row['FK_FILME_ano_producao']}</td>";
                                                echo "<td>{$row['FK_PESSOA_nome_artistico']}</td>";
                                                echo "<td>{$row['FK_PREMIO_ano']}</td>";
                                                echo "<td>{$row['FK_PREMIO_tipo']}</td>";
                                                echo "<td>{$row['FK_PREMIO_nome']}</td>";
                                                echo "<td>{$row['ganhou']}</td>";
                                            echo "</tr>";
                                        }
                                        foreach ($stmt2 as $row) {
                                            echo "<tr>";
                                                echo "<td>{$row['FK_FILME_titulo_original']}</td>";
                                                echo "<td>{$row['FK_FILME_ano_producao']}</td>";
                                                echo "<td>{$row['FK_PREMIO_ano']}</td>";
                                                echo "<td>{$row['FK_PREMIO_tipo']}</td>";
                                                echo "<td>{$row['FK_PREMIO_nome']}</td>";
                                                echo "<td>{$row['ganhou']}</td>";
                                            echo "</tr>";
                                        }
                                    ?>
                                        
                                </tbody>
                            </table>

                        <?php
                        }
                        ?>

                    </div>

                </div>
                <div class="col mb-5"></div>
            </div>
        </div>
        
    </div>
    <div style="margin-top: 350px;">
    <?php 
        
        include '../partials/footer.php';

    ?>
    </div>
</body>
</html>