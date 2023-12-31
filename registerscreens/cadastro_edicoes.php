<?php
require "../services/conexao.php";

try {
    $conn = new Conexao();
    $conn = $conn->conectar();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT nome FROM Evento"; 
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
                <h4 c>Cadastro de Edição </h4>
            </div>
            <div class="row">
                <div class="col"></div>
                <div class="col-6">

                    <form method="post" action="../services/edicao_services.php">

                        <div class="form-group mb-3">
                            <label  for="evento_nome">Nome do evento</label>
                            <select class="form-control" id="evento_nome" name="evento_nome">
                                <option selected>Escolher...</option>
                                <?php
                                    // Iterar sobre os resultados e criar opções
                                    foreach ($result as $row) {
                                        echo "<option value='{$row['nome']}'>{$row['nome']}</option>";
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="ano">Ano</label>
                            <input type="text" class="form-control" id="ano" name="ano" required>
                        </div>
                        

                        <div class="form-group">
                            <label for="data">Data</label>
                            <input type="date" class="form-control" id="data" name="data" required>
                        </div>

                        <div class="form-group">
                            <label for="localizacao">Localização</label>
                            <input type="text" class="form-control" id="localizacao" name="localizacao" required>
                        </div>
                        
                        
                        <button type="submit" class="btn btn-primary mb-5">Enviar</button>

                    </form>
                </div>
                <div class="col mb-5"></div>
            </div>
        </div>
        
    </div>
    <div style="margin-top: 90px;">
    <?php 
        
        include '../partials/footer.php';

    ?>
    </div>
</body>
</html>