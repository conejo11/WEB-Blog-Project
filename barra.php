<html>
    <head>
        <meta charset="utf-8"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body>
        <div class="bgBarraTop"></div>
        <div class="barraTop" id="barraTop">

            <?php

                session_start();

                echo('<a '. ($currentPage == "index" ? 'class="menuAtual"' : "") .' href="index.php">Página Principal</a>');
                echo('<a '. ($currentPage == "tags" ? 'class="menuAtual"' : "") .' href="tags.php">Tags</a>');

                // Cara é registrado
                if (!empty($_SESSION['usuario'])) {
                    echo("<a ". ($currentPage == "fav" ? 'class="menuAtual"' : "") ." href='fav.php'>Favoritos</a>");
                    // Cara é admin
                    if ($_SESSION['usuario']['tipo'] == '1') {
                        echo("<a ". ($currentPage == "manage" ? 'class="menuAtual"' : "") ." href='manage.php'>Administração</a>");
                    }
                }
                echo('<a '. ($currentPage == "about" ? 'class="menuAtual"' : "") .' href="about.php">Sobre</a>');

                if (!empty($_SESSION['usuario'])) {
                    echo('<a style="float:right" '. ($currentPage == "login" ? 'class="menuAtual"' : "") .' href="perfil.php">Bem Vindo '. $_SESSION['usuario']['nome_completo'] .'</a>');
                } else {
                    echo('<a style="float:right" '. ($currentPage == "login" ? 'class="menuAtual"' : "") .' href="login.php">Login</a>');
                }

            ?>

        </div>
    </body>
</html>
