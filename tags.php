<html>
    <head>
        <meta charset="utf-8"/>

        <!-- Nossos imports! !-->
        <link rel="stylesheet" href="css/barra.css">
        <link rel="stylesheet" href="css/item.css">
        <link rel="stylesheet" href="css/global.css">

        <title>Tags - ODAW - Diel e Conejo</title>
    </head>

    <body bgcolor='#454545'>

        <?php
            $currentPage = 'tags';

            include 'postCreator.php';

            echo("<div class='artigos'>");
            if (!empty($_GET['tag'])){
                $resExisteTag = $conn->query("SELECT 1 as oi FROM tag WHERE nome_completo = '". $_GET['tag'] ."';")->fetch_assoc();
                if (!isset($resExisteTag['oi'])){
                    echo ("<h1><center>Tag não existe!</center></h1></div>");
                    return;
                }
                $noticias = array();
                    $result = $conn->query("SELECT *, u.nome_completo as nome_admin
                    FROM noticia n join usuario u on u.id = n.id
                        WHERE n.id
                            IN (SELECT tn.id_noticia
                                FROM tag_noticia tn
                                    JOIN tag t ON t.id = tn.id_tag
                                        AND t.nome_completo = '" . $_GET['tag'] . "') ORDER BY (n.id) DESC;");
                if ($result || $result->count() == 0) {

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            array_push($noticias, $row);
                        }
                    }
                    $result->close();
            
                    foreach($noticias as $row){
                        $tags = array();
                        $result = $conn->query("SELECT nome_completo  FROM tag_noticia JOIN tag ON id = id_tag WHERE id_noticia = ". $row['id'] .";");
                        if ($result){
                            while ($tag = $result->fetch_assoc()) {
                                array_push($tags, $tag['nome_completo']);
                            }
                        }
                        gera($row['id'], $row['titulo'], $row['titulo_reduzido'], $row['dia'], $row['mes'], $row['ano'], $row['corpo'], $tags, $row['url_imagem'], $row['nome_admin'], null, $conn);
                        
                    }
                } else {
                    echo("<center><h1>Nenhuma postagem com a tag ". $_GET['tag'] ."</h1></center>");
                }
            } else {
                echo("<h1><center>Nenhuma postagem com essa tag</center></h1>");
            }

           

            echo('</div>');
        ?>

    </body>
</html>
