<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Filmes</title>
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
                <h4 c>Cadastro de Filmes</h4>
            </div>
            <div class="row">
                <div class="col"></div>
                <div class="col-6">

                    <form method="post" action="../services/filme_services.php">

                        <div class="form-group">
                            <label for="titulo_original">Título original</label>
                            <input type="text" class="form-control" id="titulo_original" name="titulo_original" required>
                        </div>
                        <div class="form-group">
                            <label for="ano_producao">Ano de Produção</label>
                            <input type="number" class="form-control" id="ano_producao" name="ano_producao" required>
                        </div>
                        <div class="form-group">
                            <label for="titulo_portugues">Título em português</label>
                            <input type="text" class="form-control" id="titulo_portugues" name="titulo_portugues" required>
                        </div>
                        <div class="form-group">
                            <label for="arrecadacao_primeiro_ano">Arrecadação do primeiro ano</label>
                            <input type="number" class="form-control" id="arrecadacao_primeiro_ano" name="arrecadacao_primeiro_ano" required>
                        </div>
                        <div class="form-group">
                            <label for="idioma_original">Idioma original</label>
                            <input type="text" class="form-control" id="idioma_original" name="idioma_original" required>
                        </div>
                        <div class="form-group">
                            <label for="nacionalidade">Nacionalidade</label>
                            <input type="text" class="form-control" id="nacionalidade" name="nacionalidade" required>
                        </div>
                        <div class="form-group">
                            <label for="classe">Classe</label>
                            <input type="text" class="form-control" id="classe" name="classe" required>
                        </div>
                        <div class="form-group">
                            <label for="sala_exibicao">Sala de exibição</label>
                            <input type="number" class="form-control" id="sala_exibicao" name="sala_exibicao" required>
                        </div>
                        <div class="form-group">
                            <label for="data_estreia">Data de estreia</label>
                            <input type="date" class="form-control" id="data_estreia" name="data_estreia" required>
                        </div>

                        Tipo <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="Documentario" value="Documentario" name="tipo">
                            <label class="form-check-label" for="Documentario">Documentário</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="Outros" value="Outros" name="tipo" checked>
                            <label class="form-check-label" for="Outros">Outros</label>
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="hidden" name="hidden">
                        </div>

                        <button type="submit" class="btn btn-primary">Enviar</button>

                    </form>
                </div>
                <div class="col"></div>
            </div>
        </div>
        
    </div>

    <?php 

        include '../partials/footer.php';

    ?>

</body>
</html>