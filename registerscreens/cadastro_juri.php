<?php
require "../services/conexao.php";

try {
    $conn = new Conexao();
    $conn = $conn->conectar();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $sql3 = "SELECT ano, FK_EVENTO_nome FROM Edicao"; 
    $result3 = $conn->query($sql3);

    

} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}


?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Juri</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="../dinamicfunctions/carregar_juri.js"></script>
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
                <h4>Cadastro de Juri</h4>
                <h2 id="teste-h2"></h2>
            </div>
            <div class="row">
                <div class="col"></div>
                <div class="col-6">

                    <form method="post" action="../services/juri_services.php">

                        
                        <div class="form-group mb-3">
                            <label  for="edicao">Edição</label>
                            <select id="select-edicao" class="form-control" id="edicao" name="edicao" onchange="carregarJuri()">
                                <option selected>Escolher...</option>
                                <?php
                                    // Iterar sobre os resultados e criar opções
                                    foreach ($result3 as $row) {
                                        echo "<option value='{$row['FK_EVENTO_nome']}-{$row['ano']}'>{$row['FK_EVENTO_nome']}-{$row['ano']}</option>";
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label  for="pessoa">Pessoa</label>
                            <select id="select-pessoa" class="form-control" id="pessoa" name="pessoa" disabled>
                                <option value="">Selecione a edição primeiro...</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mb-5">Enviar</button>

                    </form>
                </div>
                <div class="col mb-5"></div>
            </div>
        </div>
        
    </div>
    <div style="margin-top: 260px;">
    <?php 
        
        include '../partials/footer.php';

    ?>
    </div>
</body>
</html>