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
                <h4 c>Cadastro de Pessoas</h4>
            </div>
            <div class="row">
                <div class="col"></div>
                <div class="col-6">

                    <form method="post" action="../services/pessoa_services.php">

                        <div class="form-group">
                            <label for="nome_artistico">Nome artístico</label>
                            <input type="text" class="form-control" id="nome_artistico" name="nome_artistico" required>
                        </div>
                        <div class="form-group">
                            <label for="nome_verdadeiro">Nome verdadeiro</label>
                            <input type="text" class="form-control" id="nome_verdadeiro" name="nome_verdadeiro" required>
                        </div>
                        <div class="form-group">
                            <label for="sexo">Sexo</label>
                            <input type="text" class="form-control" id="sexo" name="sexo" required>
                        </div>
                        <div class="form-group">
                            <label for="ano_nascimento">Ano de nascimento</label>
                            <input type="date" class="form-control" id="ano_nascimento" name="ano_nascimento" required>
                        </div>
                        <div class="form-group">
                            <label for="site">Site</label>
                            <input type="text" class="form-control" id="site" name="site" required>
                        </div>
                        <div class="form-group">
                            <label for="ano_inicio">Ano de início</label>
                            <input type="date" class="form-control" id="ano_inicio" name="ano_inicio" required>
                        </div>
                        <div class="form-group">
                            <label for="anos_trabalhados">Anos trabalhados</label>
                            <input type="text" class="form-control" id="anos_trabalhados" name="anos_trabalhados" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="text" class="form-control" id="status" name="status" required>
                        </div>

                        Funcão <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="ator" value="ator" name="funcoes[]">
                            <label class="form-check-label" for="ator">Ator</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="diretor" value="diretor" name="funcoes[]">
                            <label class="form-check-label" for="diretor">Diretor</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="outro" value="outro" name="funcoes[]">
                            <label class="form-check-label" for="outro">Outro</label>
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