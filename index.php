<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TUSPELICULASFAVORITAS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">TUSPELICULASFAVORITAS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(página atual)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Cadastrar
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item " href="registerscreens/cadastro_pessoas.php">Pessoas</a>
                        <a class="dropdown-item " href="registerscreens/cadastro_filmes.php">Filmes</a>
                        <a class="dropdown-item " href="registerscreens/cadastro_pessoa_filme.php">Pessoas em filmes</a>
                        <a class="dropdown-item " href="registerscreens/cadastro_eventos.php">Eventos</a>
                        <a class="dropdown-item " href="registerscreens/cadastro_edicoes.php">Edição</a>
                        <a class="dropdown-item " href="registerscreens/cadastro_premios.php">Prêmios</a>
                        <a class="dropdown-item " href="registerscreens/cadastro_nominacoes.php">Nominações de pessoas</a>
                        <a class="dropdown-item " href="registerscreens/cadastro_filme_nominado.php">Nominações de filmes</a>
                        <a class="dropdown-item " href="registerscreens/cadastro_juri.php">Juri</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="listscreens/atrizes_atores_nominados.php">Atores/atrizes nominados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Prêmios</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container p-3">
        <div class="row">
            <div class="col">
                <h4>Atores/Atrizes com mais prêmios</h4>
                <img src="images/exemplo.png" alt="">
            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
                <h4>Filmes mais premiados</h4>
                <img src="images/exemplo.png" alt="">
            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
                <h4>Filmes com mais arrecadação</h4>
                <img src="images/exemplo.png" alt="">
            </div>
        </div>
    </div>

    <?php 

        include 'partials/footer.php';

    ?>
    
    
</body>
</html>