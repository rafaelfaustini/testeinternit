<?php
class ImagemController
{
  private $conexao;
  private $banco

  function ImagemController(){
    $this->conexao = new Conexao();
    $this->banco = $this->conexao->getBanco();
  }

  public function adicionar($Imagem){
    $query = $this->banco-prepare(
      "INSERT INTO Imagem (noticiaID, caminho)
      VALUES (:noticiaid, :caminho);" );

      $query->execute(array(
        ':boticiaid' => $Imagem->noticia->id,
        ':caminho' => $Imagem->caminho
      ));
    }

    public function editar($Imagem){
      $query = $this->banco->prepare(
        "UPDATE Imagem
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
        "DELETE FROM Imagem WHERE id=:id"
      );

      $query->execute(array(
        ':id' => $Imagem->id
      ));
    }

    public function listar($Imagem){
      $query = $this->banco->prepare("SELECT * FROM Imagem WHERE noticiaID=:id");

      $query->execute(array(
        ':id' => $noticia->id
      ));

      $lista = array();
      while ($registro = $query->fetch()){$id, $noticia, $caminho
        $Imagem = new Imagem($registro['id'], $registro['noticia'],
        $registro['caminho']);
        array_push($lista, $Imagem);
      }
      return $lista;
    }
  }

  ?>
