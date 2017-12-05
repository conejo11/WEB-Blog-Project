
<h1>Preencha os dados para adicionar uma postagem:</h1>
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
            Título<span class="req">*</span>
        </label>
        <input type="text" name='titulo' required autocomplete="off" />
    </div>
    <div class="field-wrap">
        <label>
            Título abreviado<span class="req">*</span>
        </label>
        <input type="text" name='titulo_reduzido' required autocomplete="off" />
    </div>
    <div class="field-wrap">
        <label>
            Corpo<span class="req">*</span>
        </label>
        <input type="text" name='corpo' required autocomplete="off"/>
    </div>
    <div class="field-wrap">
        <label>
            Link para Imagem<span class="req">*</span>
        </label>
        <input type="text" name='url' required autocomplete="off" />
    </div>
    <div class="field-wrap">
        <select name="tag">
            <?php
                $res = $conn->query("SELECT id, nome_completo FROM tag;");
                if ($res){
                    while($row = $res->fetch_assoc()){
                        echo("<option value='". $row['id'] ."'>". $row['nome_completo'] ."</option>");
                    }
                }
            ?>
        </select>
    </div>
    <button type="submit" class="button button-block">ADICIONAR</button>
</form>

<form action="manage.php" method="post">
  <input type="text" name='nova_tag' required autocomplete="off" />
  <input type="submit" name="submit" value="Adicionar TAG"/>
</form>
