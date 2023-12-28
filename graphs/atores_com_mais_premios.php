<?php
    require "services/conexao.php";

    $conn = new Conexao();
    $conn = $conn->conectar();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT
                FK_PESSOA_nome_artistico,
                COUNT(*) AS quantidade_ocorrencias	
            FROM
                ENominado
            WHERE
                FK_PREMIO_tipo = 'melhor ator' or FK_PREMIO_tipo = 'melhor atriz' 
            GROUP BY
                FK_PESSOA_nome_artistico
            ORDER BY quantidade_ocorrencias DESC
            LIMIT 10;"; 
    $result = $conn->query($sql);

    $labels = [];
    $data = [];

    foreach($result as $row) {
        array_push($labels, $row['FK_PESSOA_nome_artistico']);
        array_push($data, $row['quantidade_ocorrencias']);
    }

    $labels_json = json_encode($labels);
    $data_json = json_encode($data);

    echo '<script>var labels_bd = ' . $labels_json . ';</script>';
    echo '<script>var data_bd = ' . $data_json . ';</script>';
?>
