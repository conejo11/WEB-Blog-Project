<html>
    <head>
        <meta charset="utf-8"/>

        <!-- Nossos imports! !-->
        <link rel="stylesheet" href="css/barra.css">
        <link rel="stylesheet" href="css/item.css">
        <link rel="stylesheet" href="css/global.css">
        <link rel="stylesheet" href="css/manage.css">

        <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

        <title>Administração - ODAW - Diel e Conejo</title>
    </head>

    <body bgcolor='#454545'>

        <?php

            $currentPage = 'manage';
            include 'postCreator.php';

            if (!isset($_SESSION['usuario'])){
                header("Refresh:0; url=index.php", true);
            }

            $tentouExecutarQuery = false;
            $message = '';
            $queryFoi = false;
            if (!empty($_POST['nova_tag'])){
              $tag = $_POST['nova_tag'];
              $nextId = intval($conn->query("SELECT MAX(id) as id FROM tag;")->fetch_assoc()['id']) + 1;
              $res = $conn->query("INSERT INTO tag VALUES
                  (".$nextId.", '".$tag."');");
              if ($res){
                      $queryFoi = true;
                      $message = 'Post Adicionado!';
                  
              } else {
                  echo("<h1>n: ". $conn->error ."</h1>");
              }
            }
            if (!empty($_POST['titulo'])) {
                $tentouExecutarQuery = true;
                $titulo = $_POST['titulo'];
                $titulo_reduzido = $_POST['titulo_reduzido'];
                $corpo = $_POST['corpo'];
                $url = $_POST['url'];
                $dia = date('d');
                $mes = date('F');
                $ano = date('Y');
                $tag = $_POST['tag'];

                $nextId = intval($conn->query("SELECT MAX(id) as id FROM noticia;")->fetch_assoc()['id']) + 1;

                $res = $conn->query("INSERT INTO noticia VALUES
                    (".$nextId.", '".$titulo_reduzido."',  '".$titulo."',  '".$corpo."',  '".$url."',  ".$dia.", '".$mes."',  ".$ano.", ".$_SESSION['usuario']['id'].");");
                if ($res){
                    $res = $conn->query("INSERT INTO tag_noticia VALUES (". $nextId .", ". $tag .");");
                    if (!$res){
                        echo("<h1>tn: ". $conn->error ."</h1>");
                    } else {
                        $queryFoi = true;
                        $message = 'Post Adicionado!';
                    }
                } else {
                    echo("<h1>n: ". $conn->error ."</h1>");
                }
            }

            if (!empty($_POST['adicionar_sugestao'])) {
                $tentouExecutarQuery = true;

                $id = $_POST['adicionar_sugestao'];

                $res = $conn->query("SELECT * FROM sugestao WHERE id = ". $id . ";");
                if (!$res){
                    echo($conn->error);
                    return;
                }
                $postagem = $res->fetch_assoc();

                $titulo = $postagem['titulo'];
                $titulo_reduzido = $postagem['titulo_reduzido'];
                $corpo = $postagem['corpo'];
                $url = $postagem['url_imagem'];
                $dia = date('d');
                $mes = date('F');
                $ano = date('Y');
                $tag = $_POST['tag'];

                $nextId = intval($conn->query("SELECT MAX(id) as id FROM noticia;")->fetch_assoc()['id']) + 1;

                $res = $conn->query("INSERT INTO noticia VALUES
                    (".$nextId.", '".$titulo_reduzido."',  '".$titulo."',  '".$corpo."',  '".$url."',  ".$dia.", '".$mes."',  ".$ano.", ".$_SESSION['usuario']['id'].");");
                if ($res){
                    $res = $conn->query("INSERT INTO tag_noticia VALUES (". $nextId .", ". $tag .");");
                    if (!$res){
                        echo("<h1>tn: ". $conn->error ."</h1>");
                    } else {
                        $res = $conn->query("DELETE FROM sugestao WHERE id =  ". $id .";");
                        $queryFoi = true;
                        $message = 'Post Adicionado!';
                    }
                } else {
                    echo("<h1>n: ". $conn->error ."</h1>");
                }
            }
            if (!empty($_POST["excluir"])){
                $tentouExecutarQuery = true;
                $total = 0;
                $array = "(";
                if ($resultado = $conn->query("SELECT * FROM usuario", MYSQLI_ASSOC)){
                    while ($linha = $resultado->fetch_assoc()){
                        $cod = $linha['id'];
                        if (isset($_POST['excluir'.$cod])){
                            $array = $array.$cod.',';
                            $total = $total + 1;
                        }
                    }
                    $array = rtrim($array, ",").")";
                    $resultado->close();

                }
                if ($total != 0){
                    if (!$conn->query("DELETE FROM usuario WHERE id in ".$array.";", MYSQLI_ASSOC)){
                        echo $conn->error;
                    } else {
                        $queryFoi = true;
                        $message = 'Usuario(s) excluidos';
                    }
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
                                <a rel="bookmark"><center><a>Administração:</center></a>
                            </h2>
                            </div>
                        </header>
                        <div class="entry-content">
                            <div class="in">
                                <center>
                                    <div class="form">
                                        <ul class="tab-group">
                                            <li class="tab active"><a href="#adicionar">Adicionar Post</a></li>
                                            <li class="tab"><a href="#users">Usuários</a></li>
                                            <li class="tab"><a href="#sugestoes">Sugestões</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div id="adicionar">
                                                <?php
                                                    include 'admin_adicionar.php';
                                                ?>
                                            </div>
                                            <div id="users">
                                                <?php
                                                    include 'admin_users.php';
                                                ?>
                                            </div>
                                            <div id="sugestoes">
                                                <?php
                                                    include 'admin_sugestoes.php';
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
