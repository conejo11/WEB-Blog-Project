<html>
<head>
    <meta charset="utf-8"/>

    <!-- Nossos imports! !-->
    <link rel="stylesheet" href="css/barra.css">
    <link rel="stylesheet" href="css/item.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/sugestao.css">

    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

    <title>Sugestão - ODAW - Diel e Conejo</title>
</head>

<body bgcolor='#454545'>

    <?php

        $currentPage = 'sugestao';
        include 'bdconnect.php';

        if (!isset($_SESSION['usuario'])){
            header("Refresh:0; url=index.php", true);
        }

        $tentouExecutarQuery = false;
        $message = '';
        $queryFoi = false;
        if (!empty($_POST['titulo'])) {
            $tentouExecutarQuery = true;
            $idUsuario = $_SESSION['usuario']['id'];
            $titulo = $_POST['titulo'];
            $titulo_reduzido = $_POST['titulo_reduzido'];
            $corpo = $_POST['corpo'];
            $url = $_POST['url'];

            $nextId = intval($conn->query("SELECT MAX(id) as id FROM sugestao;")->fetch_assoc()['id'] or '0') + 1;
            $res = $conn->query("INSERT INTO sugestao VALUES
                (".$nextId.", ".$idUsuario.", '".$titulo_reduzido."',  '".$titulo."',  '".$corpo."',  '".$url."');");
            if ($res){
                $queryFoi = true;
                $message = 'Sugestão enviada!';
            } else {
                echo("<h1>n: ". $conn->error ."</h1>");
            }
        }
    ?>

    <div class='artigos'>
        <article id="post-110982" class="post-110982 post type-post status-publish format-standard hentry category-imagens tag-salgadinhos-e-drogas">
            <div class="blog-item-wrap">
                <div class="post-inner-content">
                    <header class="entry-header page-header">
                        <div class="le-title">
                            <h2 class="entry-title">
                            <a rel="bookmark"><center><a>Informe sua sugestão:</center></a>
                        </h2>
                        </div>
                    </header>
                    <div class="entry-content">
                        <div class="in">
                            <center>
                                <div class="form">
                                    <ul class="tab-group">
                                        <li class="tab active"><a href="#adicionar">Adicionar Sugestão</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="adicionar">
                                            <?php
                                                include 'sugestao_adicionar.php';
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
                                <script src="scripts/manage.js"></script>
                            </center>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </div>
</body>
</html>
