<html>
    <head>
        <meta charset="utf-8"/>

        <!-- Nossos imports! !-->
        <link rel="stylesheet" href="css/barra.css">
        <link rel="stylesheet" href="css/item.css">
        <link rel="stylesheet" href="css/global.css">

        <title>Tags - ODAW - Diel e Conejo</title>
    </head>

    <body bgcolor='#454545'>

        <?php
            $currentPage = 'tags';
            include 'bdconnect.php';

            include 'postCreator.php';

            echo("<div class='artigos'>");
            gera($_GET['tag'], 'lol', 'lol', 'lol', 'lol', 'lol', array('Felicidade', 'Coisas satanicas'), 'lol', 1, null);
            echo('</div>');
        ?>

    </body>
</html>
