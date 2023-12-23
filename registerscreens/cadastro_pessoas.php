<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Pessoas</title>
</head>
<body>
    <div>
        <h1>Cadastrar Pessoas</h1>
    </div>

    <div>
        <form method="post" action="../services/pessoa_services.php">
            Nome artístico: <input type="text" name="nome_artistico"> <br>
            Nome verdadeiro: <input type="text" name="nome_verdadeiro"> <br>
            Sexo: <input type="text" name="sexo"> <br>
            Ano de nascimento: <input type="date" name="ano_nascimento"> <br>
            Site: <input type="text" name="site"> <br>
            Ano início: <input type="date" name="ano_inicio"> <br>
            Anos trabalhados: <input type="text" name="anos_trabalhados"> <br>
            Status: <input type="text" name="status"> <br>

            <button type="submit">Enviar</button>
        </form>
    </div>

</body>
</html>