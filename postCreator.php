<html>
    <?php
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

    function gera($titulo, $link_titulo, $dia, $mes, $ano, $conteudo, $tags, $link_imagem, $admin, $sugestao)
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
                            <div class="entry-meta">
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
    ?>
</html>