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

        function getTagLink($tag)
        {
            return 'http://www.google.com.br';
        }

        function getTagsLinks($tags)
        {
            $ret = ' ';
            foreach ($tags as $tag) {
                $ret = $ret.'<a href="'. getTagLink($tag) .'">'.$tag.' </a>';
            }
            return $ret;
        }

        function gera($titulo, $link_titulo, $dia, $mes, $ano, $conteudo, $tags, $link_imagem, $admin, $sugestao)
        {
            echo('<article id="post-110982" class="post-110982 post type-post status-publish format-standard hentry category-imagens tag-salgadinhos-e-drogas">
					<div class="blog-item-wrap">
						<div class="post-inner-content">
							<header class="entry-header page-header">
								<div class="le-data">
									<span class="dia">'. $dia .'</span>
									<span class="mes">'. $mes .'</span>
									<span class="ano">'. $ano .'</span>
								</div>
								<div class="le-title">
									<h2 class="entry-title">
										<a href="'. $link_titulo .'" rel="bookmark">'. $titulo .'</a>
									</h2>
								</div>
							</header>
							<div class="entry-content">
								<div class="in">
									<p><img class="aligncenter size-full wp-image-110983" src="'. $link_imagem .'" alt="" srcset="'. $link_imagem .'" sizes="(max-width: 500px)" /></p>
									'. $conteudo .'
									<p>'. (is_null($sugestao) ? "" : '<span style="color: #999999;">Dica do leitor '. $sugestao .'.</span>') .'
									<span style="color: #999999;">Enviado por '. $admin .'.</span></p>
									<div class="clearfix"></div>
								</div>
								<div class="entry-meta">
									<div class="tagcloud col-lg-12 col-sm-12">
										<span>TAGS:</span>
										'.getTagsLinks($tags).'
									</div>
								</div>
							</div>
						</div>
					</div>
				</article>');
        }
        echo("<div class='artigos'>");
        /*
        echo("usuario<br>");
        $conn->query("CREATE TABLE usuario (id INT PRIMARY KEY,
            login VARCHAR(20),
            senha VARCHAR(20),
            nome_completo VARCHAR(100),
            tipo CHAR(1));");
        echo($conn->error);

        echo("<br>tag<br>");
        $conn->query("CREATE TABLE tag (id INT PRIMARY KEY,
            nome_link VARCHAR(20),
            nome_completo VARCHAR(50));");
        echo($conn->error);

        echo("<br>noticia<br>");
        $conn->query("CREATE TABLE noticia (id INT PRIMARY KEY,
            titulo_reduzido VARCHAR(20),
            titulo VARCHAR(50),
            corpo VARCHAR(1000),
            url_imagem VARCHAR(100),
            dia char(2),
            mes varchar(20),
            ano char(4),
            id_admin INT,
            CONSTRAINT `fk_admin` FOREIGN KEY (id_admin) REFERENCES usuario(id));");
        echo($conn->error);

        echo("<br>tag_noticia<br>");
        $conn->query("CREATE TABLE tag_noticia (id_noticia INT,
            id_tag INT,
            PRIMARY KEY (id_noticia, id_tag),
            CONSTRAINT `fk_not` FOREIGN KEY (id_noticia) REFERENCES noticia(id),
            CONSTRAINT `fk_id_tag` FOREIGN KEY (id_tag) REFERENCES tag(id));");
        echo($conn->error);

        echo("<br>noticia_favorita<br>");
        $conn->query("CREATE TABLE noticia_favorita (id_noticia INT,
            id_usuario INT,
            PRIMARY KEY (id_noticia, id_usuario),
            CONSTRAINT `fk_noticia` FOREIGN KEY (id_noticia) REFERENCES noticia(id),
            CONSTRAINT `fk_usuario` FOREIGN KEY (id_usuario) REFERENCES usuario(id));");
        echo($conn->error);

        echo("<br>sugestao<br>");
        $conn->query("CREATE TABLE sugestao (id INT PRIMARY KEY,
            id_usuario INT NOT NULL,
            titulo_reduzido VARCHAR(20),
            titulo VARCHAR(50), corpo VARCHAR(1000),
            url_imagem VARCHAR(100),
            CONSTRAINT `fk_user` FOREIGN KEY (id_usuario) REFERENCES usuario(id));");
        echo($conn->error);
        */

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
