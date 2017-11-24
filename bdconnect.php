<html>
    <?php
        include 'barra.php';

        $conn = null;
        $isLocal = true;

        if (!$isLocal) {
            #Isso é por que usamos o Heroku
            $sqlURL = parse_url(getenv("CLEARDB_DATABASE_URL"));
            $server = $sqlURL[ "host" ];
            $username = $sqlURL[ "user" ];
            $password = $sqlURL[ "pass" ];
            $db = substr($sqlURL[ "path" ], 1);

            $conn = new mysqli($server, $username, $password, $db);
        } else {
            // Caso falhe, estamos na udesc (provavelmente)

            $sqlURL = "localhost";
            $sqlUser = "root";
            $sqlPw = "";
            $sqlDB = "odaw";

            $conn = new mysqli($sqlURL, $sqlUser, $sqlPw, $sqlDB);
        }

        if ($conn->connect_error) {
            echo("<a>Deu merda! " . $conn->connect_error . "</a>");
        }
    ?>
</html>
