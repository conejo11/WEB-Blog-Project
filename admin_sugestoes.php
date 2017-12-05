
<h1>Sugestões em análise:</h1>
<form action="manage.php" method="post">
    <?php

        echo("<div class='artigos'>");

        $noticias = array();

        $result = $conn->query("SELECT n.*, a.nome_completo as nome_usuario
                                FROM sugestao n
                                JOIN usuario a ON a.id = n.id_usuario
                                    ORDER BY (n.id) DESC;");
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                array_push($noticias, $row);
            }
        } else {
            echo($conn->error);
        }

        foreach($noticias as $row){
            geraSugestao($row['id'],
                $row['titulo'],
                $row['titulo_reduzido'],
                $row['corpo'],
                $row['url_imagem'],
                $row['nome_usuario'],
                $conn);

        }
        echo("</div>");

    ?>
</form>
