<html>
    <head>
        <meta charset="utf-8"/>

        <!-- Nossos imports! !-->
        <link rel="stylesheet" href="barra.css">
        <link rel="stylesheet" href="item.css">
        <link rel="stylesheet" href="global.css">
        
        <title>Projeto Final - ODAW - Diel e Conejo</title>
    </head>
    <body bgcolor='#454545'>
        <div class="bgBarraTop">
        </div>
        <div class="barraTop" id="barraTop">
            <a class="menuAtual" href="#index">Página Principal</a>
            <a href="#news">Tags</a>
            <?php
                if (1 == 1){
                    echo("<a href='#contact'>Usuários</a>");
                }
            ?>
            <a href="#about">Sobre</a>
        </div> 
        <main>
            <p>Scroll down and watch the menu remain fixed in the same position, as though it was floating.</p>
            <nav class="floating-menu">
                <div class="divLoco">
                    <h3>Login</h3>
                    <form>
                        Nome: <input type="text" maxlength="15" size=15><br>
                        Senha:<input type="password" maxlength="15" size=15/><br>
                        <input type="Submit" value="Logar">
                    </form> 
                </div>
                <div class="arrow-left"></div>
            </nav>
        </main>

        <div>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tenetur suscipit deleniti unde odio vero hic veniam. Molestias iste quod expedita temporibus qui accusantium omnis, et voluptate nihil consectetur hic cupiditate!</div>
        <br>
        <div> oiiii </div>

        <?php
            $sqlURL = "mysql://b9d4708c7887da:14ff0a87@us-cdbr-iron-east-05.cleardb.net/heroku_3154d21c8bd766a?reconnect=true";
            $sqlUser = "b9d4708c7887da";
            $sqlPw = "14ff0a87";
            $sqlConnection = mysqli_connect($sqlURL, $sqlUser, $sqlPw);

            if (!$sqlConnection){
                echo ("Deu merda! " . mysql_error());
            } else {
                echo("Conectamos!");
            }

            function gera() {
                echo('<article id="post-110982" class="post-110982 post type-post status-publish format-standard hentry category-imagens tag-salgadinhos-e-drogas">
                        <div class="blog-item-wrap">
                            <div class="post-inner-content">
                                <header class="entry-header page-header">
                                    <div class="le-data">
                                        <span class="dia">06</span>
                                        <span class="mes">nov</span>
                                        <span class="ano">2017</span>
                                    </div>
                                    <div class="le-title">
                                        <h2 class="entry-title">
                                            <a href="https://www.ahnegao.com.br/2017/11/vai-rolar-uma-festinha-diferenciada-esse-fim-de-semana.html" rel="bookmark">
                                                Vai rolar uma festinha diferenciada esse fim de semana						</a>
                                        </h2>
                                    </div>
                                    
                                </header><!-- .entry-header -->
                        
                                <div class="entry-content">
                                    <div class="in">
                                        <p><img class="aligncenter size-full wp-image-110983" src="https://www.ahnegao.com.br/wp-content/uploads/2017/11/festinha.jpg" alt="" width="500" height="641" srcset="https://www.ahnegao.com.br/wp-content/uploads/2017/11/festinha.jpg 500w, https://www.ahnegao.com.br/wp-content/uploads/2017/11/festinha-234x300.jpg 234w" sizes="(max-width: 500px) 100vw, 500px" /></p>
                    <p>Poxa, queria ajudar mas hoje em dia não tá fácil encontrar rissole barato&#8230;</p>
                    <p>Mas cocaína tem em qualquer esquina, se não tiver eu conheço um cara no senado que pode fornecer&#8230;</p>
                    <p><span style="color: #999999;">Dica do leitor Anderson Jardim.</span></p>
                                            <div class="clearfix"></div>
                                    </div>
                                    <div class="entry-meta">
                                    <div class="tagcloud col-lg-12 col-sm-12">
                                        <span>TAGS:</span>
                                        <a href="https://www.ahnegao.com.br/t/salgadinhos-e-drogas">Salgadinhos e drogas</a> 
                                    </div>
                    
                                    </div>
                    
                                    <div class="le-bottom-footer">
                                        <div class="le-autor">
                                            <img src="https://www.ahnegao.com.br/wp-content/themes/s4f_ahnegao_2.0/content/autor/negao-1.jpg"/>
                                            <span>Postado por <b><a href="https://www.ahnegao.com.br/author/joe">Joe</a></b> em <b><a href="https://www.ahnegao.com.br/c/imagens">Imagens</a></b></span>
                                        </div>
                                    </div>
                                </div><!-- .entry-content -->
                    
                            </div>
                        </div>
                    </article>');
            }
            gera();
            gera();
        ?>
    </body>

</html>