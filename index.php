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
        include 'bdconnect.php';

        include 'postCreator.php';

        echo("<div class='artigos'>");

        $result = $conn->query("SELECT *, u.nome_completo as nome_admin FROM noticia n join usuario u on u.id = n.id;");
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                gera($row['titulo'], $row['titulo_reduzido'], $row['dia'], $row['mes'], $row['ano'], $row['corpo'], array('Felicidade', 'Coisas satanicas'), $row['url_imagem'], $row['nome_admin'], null);
            }
        }
        echo("</div>");
        ?>
	</body>
</html>
