
<h1>Preencha os dados para adicionar uma sugestão:</h1>
<?php
    if ($tentouExecutarQuery) {
        if ($queryFoi) {
            echo("<h2 class='sucesso'>". $message ."</h2>");
        } else {
            echo("<h2 class='erro'>". $message ."</h2>");
        }
    }
?>
<form action="sugestao.php" method="post">
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
    <button type="submit" class="button button-block">ADICIONAR</button>
</form>