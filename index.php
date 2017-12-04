<html>
	<head>
		<meta charset="utf-8"/>

		<!-- Nossos imports! !-->
		<link rel="stylesheet" href="css/barra.css">
		<link rel="stylesheet" href="css/item.css">
		<link rel="stylesheet" href="css/global.css">

		<title>Inicio - ODAW - Diel e Conejo</title>
	</head>

	<body bgcolor='#454545'>

		<?php

        $currentPage = 'index';

        include 'postCreator.php';

        echo("<div class='artigos'>");
        
        $noticias = array();

        $result = $conn->query("SELECT *, u.nome_completo as nome_admin FROM noticia n join usuario u on u.id = n.id ORDER BY (n.id) DESC;");
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
        echo("</div>");
        ?>
	</body>
</html>
