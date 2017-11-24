<html>
    <head>
        <meta charset="utf-8"/>

        <!-- Nossos imports! !-->
        <link rel="stylesheet" href="css/barra.css">
        <link rel="stylesheet" href="css/item.css">
        <link rel="stylesheet" href="css/global.css">
        <link rel='stylesheet' href="css/perfil.css">

        <title>Perfil - ODAW - Diel e Conejo</title>
    </head>

    <body bgcolor='#454545'>

        <?php
            $currentPage = 'login';
            include 'barra.php';

            if (!empty($_POST["logout"])) {
                unset($_SESSION["usuario"]);
                echo("<center><br><br><h1>Tchau!!</h1><br>Redirecionando em 3 segundos...<hr></center>");
                header("Refresh:3; url=index.php", true);
                return;
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
                                    <form method="post">
                                        <button type="submit" name="logout" value="Submit">Sair</button>
                                    </form>
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
