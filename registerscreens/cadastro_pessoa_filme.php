<?php
require "../services/conexao.php";

try {
    $conn = new Conexao();
    $conn = $conn->conectar();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // $sql = "SELECT nome_artistico FROM Pessoa"; 
    // $result = $conn->query($sql);

    $sql2 = "SELECT titulo_original, ano_producao FROM Filme";
    $result2 = $conn->query($sql2);

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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="../dinamicfunctions/pessoa_em_filme.js"></script>
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
                <h4>Cadastro de Pessoas em Filmes </h4>
            </div>
            <div class="row">
                <div class="col"></div>
                <div class="col-6">

                    <form method="post" action="../services/pessoa_filme_services.php">
                    <div class="form-group mb-3">
                        <label  for="pessoa">Filme</label>
                        <select id="select-filme" class="form-control" id="filme" name="filme" onchange="verificarDocumentario()">
                            <option selected>Escolher...</option>
                            <?php
                                // Iterar sobre os resultados e criar opções
                                foreach ($result2 as $row) {
                                    echo "<option value='{$row['titulo_original']}|{$row['ano_producao']}'>{$row['titulo_original']} - {$row['ano_producao']}</option>";
                                    
                                }
                            ?>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label  for="nome_artistico">Pessoa</label>
                        <select id="select-pessoa" class="form-control" id="nome_artistico" name="nome_artistico" onchange="procurarFuncoes()" disabled>
                            <option selected>Selecione o filme primeiro...</option>
                            
                        </select>
                    </div>

                    Funcão <br>
                        <div class="form-check form-check-inline">
                            <input id="ator" class="form-check-input" type="checkbox" id="EAtor" value="EAtor" name="funcoes[]" disabled>
                            <label class="form-check-label" for="EAtor">Ator</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input id="diretor" class="form-check-input" type="checkbox" id="EDiretor" value="EDiretor" name="funcoes[]" disabled>
                            <label class="form-check-label" for="EDiretor">Diretor</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input id="outro" class="form-check-input" type="checkbox" id="EOutrasFuncoes" value="EOutrasFuncoes" name="funcoes[]" onchange="mostrarFuncao()" disabled>
                            <label class="form-check-label" for="EOutrasFuncoes" >Outro</label>
                        </div>

                        <small id="checkbox-texto" class="form-text text-muted">Selecione a pessoa primeiro</small>

                        <div class="form-group">
                            <input type="hidden" class="form-control" id="hidden" name="hidden">
                        </div>

                        <div class="form-group">
                            <label  for="Eprincipal">Principal?</label>
                            <select class="form-control" id="Eprincipal" name="Eprincipal">
                                <option selected>Escolher...</option>
                                <option value='sim'>Sim</option>"
                                <option value='nao'>Não</option>"
                            </select>
                        </div>

                        <div id="outra-funcao" style="display:none;" class="form-group">
                            <label for="outra-funcao">Outra função</label>
                            <input type="text" class="form-control" id="outra-funcao-input" name="outra-funcao">
                        </div>

                        <button type="submit" class="btn btn-primary mb-5">Enviar</button>

                    </form>
                </div>
                <div class="col mb-5"></div>
            </div>
        </div>
        
    </div>
    <div style="margin-top: 110px;">
    <?php 
        
        include '../partials/footer.php';

    ?>
    </div>

    

    
</body>
</html>