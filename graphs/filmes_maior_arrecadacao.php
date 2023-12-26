<?php

    $conn = new Conexao();
    $conn = $conn->conectar();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT
                titulo_original,
                arrecadacao_primeiro_ano
            FROM
                Filme 
            ORDER BY arrecadacao_primeiro_ano DESC
            LIMIT 10;"; 
    $result = $conn->query($sql);

    $labels = [];
    $data = [];

    foreach($result as $row) {
        array_push($labels, $row['titulo_original']);
        array_push($data, $row['arrecadacao_primeiro_ano']);
    }

    $labels_filmes_maior_arrecadacao = json_encode($labels);
    $data_filmes_maior_arrecadacao = json_encode($data);

    echo '<script>var labels_filmes_maior_arrecadacao = ' . $labels_filmes_maior_arrecadacao . ';</script>';
    echo '<script>var data_filmes_maior_arrecadacao = ' . $data_filmes_maior_arrecadacao . ';</script>';
?>
