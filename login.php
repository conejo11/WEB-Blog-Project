<html>
<head>
    <meta charset="utf-8" />
    <!-- Nossos imports! !-->
    <link rel="stylesheet" href="css/barra.css">
    <link rel="stylesheet" href="css/item.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/login.css">

    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

    <title>Login - ODAW - Diel e Conejo</title>
</head>

<body bgcolor='#454545'>
        <?php
            $currentPage = 'login';
            include 'bdconnect.php';

            $tentouLogar = false;
            $loginFoi = false;

            if (!empty($_SESSION["usuario"])) {
                header("Location: index.php");
            } else {
                if (!empty($_POST['login'])) {
                    $tentouLogar = true;
                    $res = $conn->query('SELECT * FROM usuario WHERE login=\''. $_POST['login'] .'\' AND senha=\''. $_POST['password'] .'\' ');
                    if ($res) {
                        $loginFoi = true;
                        $usuario = mysqli_fetch_assoc($res);
                        $message = 'Bem vindo de volta '.$usuario['nome_completo']. '!';
                        $_SESSION["usuario"] = $usuario;
                        header("Refresh: 3");
                    } else {
                        $message = 'Query falhou:<br>'. $conn->error;
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
                                <a rel="bookmark"><center>Faça seu login:</center></a>
                            </h2>
                            </div>
                        </header>
                        <div class="entry-content">
                            <div class="in">
                                <center>
                                    <div class="form">
                                        <ul class="tab-group">
                                            <?php
                                                if ($tentouLogar) {
                                                    echo('
                                                    <li class="tab active"><a href="#login">Entrar</a></li>
                                                    <li class="tab"><a href="#signup">Criar Conta</a></li>
                                                    ');
                                                } else {
                                                    echo('
                                                    <li class="tab active"><a href="#signup">Criar Conta</a></li>
                                                    <li class="tab"><a href="#login">Entrar</a></li>
                                                    ');
                                                }
                                            ?>
                                        </ul>
                                        <div class="tab-content">
                                            <?php
                                                if ($tentouLogar) {
                                                    echo('
                                                    <div id="login">
                                                        <h1>Bem vindo de volta!</h1>');
                                                    if ($loginFoi) {
                                                        echo("<h2 class='sucesso'>". $message ."</h2>");
                                                    } else {
                                                        echo("<h2 class='erro'>". $message ."</h2>");
                                                    }
                                                    echo('
                                                    </div>
                                                    <div id="signup">
                                                        <h1>Crie sua conta!</h1>
                                                        <form action="login.php" method="post">
                                                            <div class="field-wrap">
                                                                <label>
                                                                    Nome Completo<span class="req">*</span>
                                                                </label>
                                                                <input type="text" required autocomplete="off" />
                                                            </div>
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
                                                            <button type="submit" class="button button-block" />CRIAR CONTA</button>
                                                        </form>
                                                    </div>

                                                    ');
                                                } else {
                                                    echo('
                                                    <div id="signup">
                                                        <h1>Crie sua conta!</h1>
                                                        <form action="login.php" method="post">
                                                            <div class="field-wrap">
                                                                <label>
                                                                    Nome Completo<span class="req">*</span>
                                                                </label>
                                                                <input type="text" required autocomplete="off" />
                                                            </div>
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
                                                            <button type="submit" class="button button-block" />CRIAR CONTA</button>
                                                        </form>
                                                    </div>
                                                    <div id="login">
                                                        <h1>Bem vindo de volta!</h1>
                                                        <form action="login.php" method="post">
                                                            <div class="field-wrap">
                                                                <label>
                                                                    Usuário<span class="req">*</span>
                                                                </label>
                                                                <input type="text" name="login" required autocomplete="off" />
                                                            </div>
                                                            <div class="field-wrap">
                                                                <label>
                                                                    Senha<span class="req">*</span>
                                                                </label>
                                                                <input type="password" name="password" required autocomplete="off" />
                                                            </div>
                                                            <button class="button button-block" />ENTRAR</button>
                                                        </form>
                                                    </div>');
                                                }
                                            ?>

                                        </div>
                                    </div>
                                    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
                                    <script src="scripts/login.js"></script>
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
