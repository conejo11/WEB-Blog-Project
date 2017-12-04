
<h1>Bem vindo de volta!</h1>
<form action="manage.php" method="post">
<?php
    print "<table border='2'>";
    if ($resultado = $conn->query("SELECT * FROM usuario", MYSQLI_ASSOC)){
        print "<tr><th>ID</th><th>Login</th><th>Nome Completo</th><th>Tipo</th><th>Excluir?</th></tr>";
        while ($linha = mysqli_fetch_array($resultado)){
            $codigo = "<td align='center'>".$linha['id']."</td>";
            $login = "<td align='center'>".$linha['login']."</td>";
            $nome_com = "<td align='center'>".$linha['nome_completo']."</td>";
            $tipo = "<td align='center'>".($linha['tipo'] == '1' ? 'Admin' : 'Usuario')."</td>";
            $deletar = "<td align='center'><input type='checkbox' name='excluir".$linha['id']."'/>";
            print  "<tr>".$codigo.$login.$nome_com.$tipo.$deletar."</tr>";
        }
    }
    print "</table>";
?>
<br>
<button class="button button-block" type="submit" name="excluir" value="Excluir">EXCLUIR SELECIONADOS</button>
</form>
</form>