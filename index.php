<html>

<head>
	<meta charset="utf-8"/>

	<!-- Nossos imports! !-->
	<link rel="stylesheet" href="barra.css">
	<link rel="stylesheet" href="item.css">
	<link rel="stylesheet" href="global.css">

	<title>Projeto Final - ODAW - Diel e Conejo</title>
</head>

<body bgcolor='#454545'>
	<div class="bgBarraTop">
	</div>
	<div class="barraTop" id="barraTop">
		<a class="menuAtual" href="#index">Página Principal</a>
		<a href="#news">Tags</a>
		<?php
		if ( 1 == 1 ) {
			echo( "<a href='#contact'>Usuários</a>" );
		}
		?>
		<a href="#about">Sobre</a>
	</div>
	<main>
		<nav class="floating-menu">
			<div class="divLoco">
				<h3>Login</h3>
				<form>
					Nome: <input type="text" maxlength="15" size=15><br> Senha:
					<input type="password" maxlength="15" size=15/><br>
					<input type="Submit" value="Logar">
				</form>
			</div>
			<div class="arrow-left"></div>
		</nav>
	</main>

	<?php
	#Isso é por que usamos o Heroku
	$sqlURL = parse_url( getenv( "CLEARDB_DATABASE_URL" ) );
	$server = $sqlURL[ "host" ];
	$username = $sqlURL[ "user" ];
	$password = $sqlURL[ "pass" ];
	$db = substr( $sqlURL[ "path" ], 1 );

	$conn = new mysqli( $server, $username, $password, $db );
	
	// Caso falhe, estamos na udesc (provavelmente)
	if ( !$conn ) {
		$sqlURL = "localhost";
		$sqlUser = "gustavo";
		$sqlPw = "";
		$sqlDB = "odaw";

		$conn = new mysqli( $sqlURL, $sqlUser, $sqlPw );
	}


	if ( $conn->connect_error ) {
		echo( "<a>Deu merda! " . $conn->connect_error . "</a>" );
	}

	function getTagsLinks($tags){
		$ret = '';
		foreach ($tags as $tag){
			$ret = $ret.'<a href="https://www.ahnegao.com.br/t/salgadinhos-e-drogas">'.$tag.' </a>';
		}
		return $ret;
	}

	function gera($titulo, $link_titulo, $dia, $mes, $ano, $conteudo, $tags, $link_imagem, $sugestao ) {
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
								<p>'. (is_null($sugestao) ? "" : '<span style="color: #999999;">Dica do leitor '. $sugestao .'.</span>') .'</p>
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
			</article>' );
	}
	echo("<div class='artigos'>");
	gera("Teste", "google.com.br", 16, 'maio', 1996, "<p>Fazendo coisas legais</p><p>Oiiiii</p>", array('Felicidade', 'Coisas satanicas'), "http://www.oi.com.br/ArquivosEstaticos/oi/images/social-media/logo_oi.jpg", null);
	echo("</div>");
	?>
</body>

</html>