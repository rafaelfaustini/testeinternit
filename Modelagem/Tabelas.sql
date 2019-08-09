create table assinante(
  cpf varchar(14) Primary Key,
  permissao int,
  nome varchar(100),
  email varchar(100),
  senha varchar(255),
  endereco varchar(150),
  cidade varchar(50),
  uf char(2)
);

create table noticia(
  id int Primary Key AUTO_INCREMENT,
  data date NOT NULL,
  resumo text,
  destaque boolean
);

create table imagens(
  id int Primary Key AUTO_INCREMENT,
  noticiaID int,
  FOREIGN KEY (noticiaID) REFERENCES noticia(id),
  caminho varchar(255)
);
