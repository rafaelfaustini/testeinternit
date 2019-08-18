create table assinante(
  cpf varchar(11) Primary Key,
  permissao int,
  nome varchar(100) NOT NULL,
  email varchar(100) NOT NULL,
  senha varchar(255) NOT NULL,
  endereco varchar(150) NOT NULL,
  cidade varchar(50) NOT NULL,
  uf char(2) NOT NULL
);

create table noticia(
  id int Primary Key AUTO_INCREMENT,
  titulo varchar(200) NOT NULL,
  data int NOT NULL,
  resumo varchar(255) NOT NULL,
  conteudo text NOT NULL,
  destaque boolean
);

create table imagem(
  id int Primary Key AUTO_INCREMENT,
  noticiaID int,
  FOREIGN KEY (noticiaID) REFERENCES noticia(id),
  caminho varchar(255)
);
