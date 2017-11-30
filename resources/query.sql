/*
echo("usuario<br>");
$conn->query("CREATE TABLE usuario (id INT PRIMARY KEY,
    login VARCHAR(20),
    senha VARCHAR(20),
    nome_completo VARCHAR(100),
    tipo CHAR(1));");
echo($conn->error);

echo("<br>tag<br>");
$conn->query("CREATE TABLE tag (id INT PRIMARY KEY,
    nome_link VARCHAR(20),
    nome_completo VARCHAR(50));");
echo($conn->error);

echo("<br>noticia<br>");
$conn->query("CREATE TABLE noticia (id INT PRIMARY KEY,
    titulo_reduzido VARCHAR(20),
    titulo VARCHAR(50),
    corpo VARCHAR(1000),
    url_imagem VARCHAR(100),
    dia char(2),
    mes varchar(20),
    ano char(4),
    id_admin INT,
    CONSTRAINT `fk_admin` FOREIGN KEY (id_admin) REFERENCES usuario(id));");
echo($conn->error);

echo("<br>tag_noticia<br>");
$conn->query("CREATE TABLE tag_noticia (id_noticia INT,
    id_tag INT,
    PRIMARY KEY (id_noticia, id_tag),
    CONSTRAINT `fk_not` FOREIGN KEY (id_noticia) REFERENCES noticia(id),
    CONSTRAINT `fk_id_tag` FOREIGN KEY (id_tag) REFERENCES tag(id));");
echo($conn->error);

echo("<br>noticia_favorita<br>");
$conn->query("CREATE TABLE noticia_favorita (id_noticia INT,
    id_usuario INT,
    PRIMARY KEY (id_noticia, id_usuario),
    CONSTRAINT `fk_noticia` FOREIGN KEY (id_noticia) REFERENCES noticia(id),
    CONSTRAINT `fk_usuario` FOREIGN KEY (id_usuario) REFERENCES usuario(id));");
echo($conn->error);

echo("<br>sugestao<br>");
$conn->query("CREATE TABLE sugestao (id INT PRIMARY KEY,
    id_usuario INT NOT NULL,
    titulo_reduzido VARCHAR(20),
    titulo VARCHAR(50), corpo VARCHAR(1000),
    url_imagem VARCHAR(100),
    CONSTRAINT `fk_user` FOREIGN KEY (id_usuario) REFERENCES usuario(id));");
echo($conn->error);
*/

Usuarios:
insert into usuario values(1, 'admin', 'admin', 'Administrador', '1'),
    (2, 'diel', 'diel', 'Gustavo Diel', '1'),
    (3, 'conejo', '123', 'Gabriel Guebarra Conejo', '1'),
    (4, 'visitante', '123', 'Visitante :3', '2');


Funcao:
DELIMITER //
CREATE OR REPLACE FUNCTION inserirUsuario(nome_c VARCHAR(100), login VARCHAR(20), senha VARCHAR(20))
RETURNS CHAR(1)
BEGIN
    DECLARE nextId INTEGER;
    SELECT COUNT(*) INTO nextId FROM usuario;
    INSERT INTO usuario VALUES (nextId + 1, login, senha, nome_c, '2');
    RETURN ('1');
END //
DELIMITER ;

Noticias:
insert into noticia values (1, 'mulher_em_ti', 'Mulheres em TI', 'Faz todo o sentido ein', 'https://leninja.com.br/wp-content/uploads/2017/11/jessicao.jpg', '02', 'maio', '2017', '1');
