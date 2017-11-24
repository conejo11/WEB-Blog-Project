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
            include 'bdconnect.php';
            $tentouExecutarQuery = false;
            $message = '';
            $queryFoi = false;
            if (!empty($_POST['query'])) {
                $tentouExecutarQuery = true;
                $res = $conn->query($_POST['query']);
                if ($res) {
                    $queryFoi = true;
                    $message = 'Query executada com sucesso!';
                } else {
                    $message = 'Query falhou:<br>'. $conn->error;
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
                                            <li class="tab active"><a href="#query"> Executar Query</a></li>
                                            <li class="tab"><a href="#users">Usuários</a></li>
                                            <li class="tab"><a href="#sugestoes">Sugestões</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div id="query">
                                                <h1>Execute uma Query no Banco de Dados</h1>
                                                <?php
                                                    if ($tentouExecutarQuery) {
                                                        if ($queryFoi) {
                                                            echo("<h2 class='sucesso'>". $message ."</h2>");
                                                        } else {
                                                            echo("<h2 class='erro'>". $message ."</h2>");
                                                        }
                                                    }
                                                ?>
                                                <form action="manage.php" method="post">
                                                    <div class="field-wrap">
                                                        <label>
                                                            Query<span class="req">*</span>
                                                        </label>
                                                        <input type="text" name='query' required autocomplete="off" />
                                                    </div>
                                                    <button type="submit" class="button button-block">EXECUTAR</button>
                                                </form>
                                            </div>
                                            <div id="users">
                                                <h1>Bem vindo de volta!</h1>
                                                <form action="manage.php" method="post">
                                                    <div class="field-wrap">
                                                        <label>
                                                            Usuário<span class="req">*</span>
                                                        </label>
                                                        <input type="text" required autocomplete="off" />
                                                    </div>
                                                    <div class="field-wrap">
                                                        <label>
                                                            Senha<span class="req">*</span>
                                                        </label>
                                                        <input type="password" required autocomplete="off" />
                                                    </div>
                                                    <button class="button button-block" />ENTRAR</button>
                                                </form>
                                            </div>
                                            <div id="sugestoes">
                                                <h1>Sugestões em análize:</h1>
                                                <form action="manage.php" method="post">
                                                    <div class="field-wrap">
                                                        <label>
                                                            Usuário<span class="req">*</span>
                                                        </label>
                                                        <input type="text" required autocomplete="off" />
                                                    </div>
                                                    <div class="field-wrap">
                                                        <label>
                                                            Senha<span class="req">*</span>
                                                        </label>
                                                        <input type="password" required autocomplete="off" />
                                                    </div>
                                                    <button class="button button-block" />ENTRAR</button>
                                                </form>
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
