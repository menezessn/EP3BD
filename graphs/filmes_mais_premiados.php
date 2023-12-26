<?php

    $conn = new Conexao();
    $conn = $conn->conectar();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT
                FK_FILME_titulo_original,
                COUNT(*) AS quantidade_ocorrencias	
            FROM
                FilmeNominado 
            GROUP BY
                FK_FILME_titulo_original
            ORDER BY quantidade_ocorrencias DESC
            LIMIT 10;"; 
    $result = $conn->query($sql);

    $labels = [];
    $data = [];

    foreach($result as $row) {
        array_push($labels, $row['FK_FILME_titulo_original']);
        array_push($data, $row['quantidade_ocorrencias']);
    }

    $labels_filmes_mais_premiados = json_encode($labels);
    $data_filmes_mais_premiados = json_encode($data);

    echo '<script>var labels_filmes_mais_premiados = ' . $labels_filmes_mais_premiados . ';</script>';
    echo '<script>var data_filmes_mais_premiados = ' . $data_filmes_mais_premiados . ';</script>';
?>
