<html>
    <?php

    include 'bdconnect.php';

    if (isset($_POST['id_favorito'])){
        echo('asdadds');
        $idfav = $_POST['id_favorito'];
        $res = $conn->query('INSERT INTO noticia_favorita VALUES ('.$idfav .', '. $_SESSION['usuario']['id'] .');');
        if (!$res){
            echo($conn->error);
        }
    }
    function getTagLink($tag)
    {
        return 'tags.php?tag=' . $tag;
    }

    function getTagsLinks($tags)
    {
        $ret = ' ';
        foreach ($tags as $tag) {
            $ret = $ret.'<a href="'. getTagLink($tag) .'">'.$tag.' </a>';
        }
        return $ret;
    }

    function gera($id, $titulo, $link_titulo, $dia, $mes, $ano, $conteudo, $tags, $link_imagem, $admin, $sugestao, $conn)
    {
        echo('<article id="post-110982" class="post-110982 post type-post status-publish format-standard hentry category-imagens tag-salgadinhos-e-drogas">
                <div class="blog-item-wrap">
                    <div class="post-inner-content">
                        <header class="entry-header page-header">
                            <div class="le-data">
                                <span class="dia">'. $dia .'</span>
                                <span class="mes">'. $mes .'</span>
                                <span class="ano">'. $ano .'</span>
                            </div>
                            <div class="le-title">
                                <h2 class="entry-title">
                                    <a href="'. $link_titulo .'" rel="bookmark">'. $titulo .'</a>
                                </h2>
                            </div>
                        </header>
                        <div class="entry-content">
                            <div class="in">
                                <p><img class="aligncenter size-full wp-image-110983" src="'. $link_imagem .'" alt="" srcset="'. $link_imagem .'" sizes="(max-width: 500px)" /></p>
                                '. $conteudo .'
                                <p>'. (is_null($sugestao) ? "" : '<span style="color: #999999;">Dica do leitor '. $sugestao .'.</span>') .'
                                <span style="color: #999999;">Enviado por '. $admin .'.</span></p>
                                <div class="clearfix"></div>
                            </div>
                            ');

                            if (isset($_SESSION['usuario'])){
                                $resExisteTag = $conn->query("SELECT 1 as oi FROM noticia_favorita WHERE id_usuario = ". $_SESSION['usuario']['id'] ." AND id_noticia = '". $id ."';")->fetch_assoc();
                                if (!isset($resExisteTag['oi']))
                                echo('
                                <form method="POST">
                                    <input value="Adicionar aos favoritos" name="id_favorito" type="submit" onclick="this.value = '.$id.'" ></input>
                                </form>');
                            }
                            echo('<div class="entry-meta">
                                <div class="tagcloud col-lg-12 col-sm-12">
                                    <span>TAGS:</span>
                                    '.getTagsLinks($tags).'
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>');
    }

    function geraSugestao($id, $titulo, $link_titulo, $conteudo, $link_imagem, $sugestao, $conn)
    {
        $dia = date('d');
        $mes = date('F');
        $ano = date('Y');

        echo('<article id="post-110982" class="post-110982 post type-post status-publish format-standard hentry category-imagens tag-salgadinhos-e-drogas">
                <div class="blog-item-wrap">
                    <div class="post-inner-content">
                        <header class="entry-header page-header">
                            <div class="le-data">
                                <span class="dia">'. $dia .'</span>
                                <span class="mes">'. $mes .'</span>
                                <span class="ano">'. $ano .'</span>
                            </div>
                            <div class="le-title">
                                <h2 class="entry-title">
                                    <a href="'. $link_titulo .'" rel="bookmark">'. $titulo .'</a>
                                </h2>
                            </div>
                        </header>
                        <div class="entry-content">
                            <div class="in">
                                <p><img class="aligncenter wp-image-110983" src="'. $link_imagem .'" alt="" srcset="'. $link_imagem .'" style="width: 70%" /></p>
                                '. $conteudo .'
                                <p>'. (is_null($sugestao) ? "" : '<span style="color: #999999;">Dica do leitor '. $sugestao .'.</span>') .'
                                <div class="clearfix"></div>
                            </div>
                            <form method="POST">
                            <select name="tag">');
                                $res = $conn->query("SELECT id, nome_completo FROM tag;");
                                if ($res){
                                    while($row = $res->fetch_assoc()){
                                        echo("<option value='". $row['id'] ."'>". $row['nome_completo'] ."</option>");
                                    }
                                }
                            echo('</select>
                            
                                <input value="Adicionar postagem" name="adicionar_sugestao" type="submit" onclick="this.value = '.$id.'" ></input>
                            </form>');
                            
                    echo('</div>
                    </div>
                </div>
            </article>');
    }
    ?>
</html>
