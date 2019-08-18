<?php
class ImagemController
{
  private $conexao;
  private $banco;

  public function ImagemController(){
    $this->conexao = new Conexao();
    $this->banco = $this->conexao->getBanco();
  }

  public function adicionar($Imagem){
    $query = $this->banco->prepare(
      "INSERT INTO imagem (noticiaID, caminho)
      VALUES (:noticiaid, :caminho);" );

      $query->execute(array(
        ':noticiaid' => $Imagem->noticia,
        ':caminho' => $Imagem->caminho
      ));
    }

    public function editar($Imagem){
      $query = $this->banco->prepare(
        "UPDATE imagem
        SET noticia = :noticia, caminho= :caminho
        WHERE id = :id"
      );
      $query->execute(array(
        ':id' => $Imagem->id,
        ':noticia' => $Imagem->noticia,
        ':caminho' => $Imagem->caminho
      ));
    }

    public function remover($Imagem){
      $query = $this->banco->prepare(
        "DELETE FROM imagem WHERE id=:id"
      );

      $query->execute(array(
        ':id' => $Imagem->id
      ));
    }

    public function removerImagensNoticia($id){
      $query = $this->banco->prepare(
        "SELECT caminho FROM imagem WHERE noticiaID=:id"
      );
      $query->execute(array(
        ':id' => $id
      ));

      while ($registro = $query->fetch()){
        unlink(realpath(dirname(dirname(__FILE__))).$registro['caminho']);
      }


      $query = $this->banco->prepare(
        "DELETE FROM imagem WHERE noticiaID=:id"
      );

      $query->execute(array(
        ':id' => $id
      ));

    }

    public function listar($Imagem){
      $query = $this->banco->prepare("SELECT * FROM imagem WHERE noticiaID=:id");
      $query->execute(array(
        ':id' => $noticia->id
      ));

      $lista = array();
      while ($registro = $query->fetch()){
        $Imagem = new Imagem($registro['id'], $registro['noticia'],
        $registro['caminho']);
        array_push($lista, $Imagem);
      }
      return $lista;
    }
  }

  ?>
