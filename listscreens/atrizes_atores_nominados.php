<?php
require "../services/conexao.php";

try {
    $conn = new Conexao();
    $conn = $conn->conectar();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT FK_PESSOA_nome_artistico, FK_PREMIO_nome, FK_PREMIO_ano, ganhou
            FROM ENominado
            WHERE FK_PREMIO_tipo = 'melhor atriz' or FK_PREMIO_tipo = 'melhor ator'
            "; 
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
            <div class="row mb-3">
                <h4>Lista de atrizes/atores nominados a prêmios</h4>
            </div>
            <div class="row">
                <div class="col"></div>
                <div class="col-6">
                    
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Nome Artístico</th>
                        <th scope="col">Evento</th>
                        <th scope="col">Ano</th>
                        <th scope="col">Ganhou?</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($result as $row) {
                                echo "<tr>";
                                echo "<td>{$row['FK_PESSOA_nome_artistico']}</td>";
                                echo "<td>{$row['FK_PREMIO_nome']}</td>";
                                echo "<td>{$row['FK_PREMIO_ano']}</td>";
                                echo "<td>{$row['ganhou']}</td>";
                                echo "</tr>";
                            }
                        ?>
                            
                    </tbody>
                </table>

                </div>
                <div class="col mb-5"></div>
            </div>
        </div>
        
    </div>
    <div style="margin-top: 250px;">
    <?php 
        
        include '../partials/footer.php';

    ?>
    </div>
</body>
</html>