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
      VALUES (:data, :caminho);" );

      $query->execute(array(
        ':data' => $Imagem->noticia->id,
        ':caminho' => $Imagem->caminho
      ));
    }

    public function editar($Imagem){
      $query = $this->banco->prepare(
        "UPDATE Imagem
        SET data = :data, caminho= :caminho
        WHERE id = :id"
      );

      $query->execute(array(
        ':id' => $Imagem->id,
        ':data' => $Imagem->data,
        ':caminho' => $Imagem->resumo
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

    public function listar($noticia){
      $query = $this->banco->prepare("SELECT * FROM Imagem WHERE noticiaID=:id");

      $query->execute(array(
        ':id' => $noticia->id
      ));

      $lista = array();
      while ($registro = $query->fetch()){$id, $data, $resumo, $destaque
        $Imagem = new Imagem($registro['id'], $registro['data'],
        $registro['resumo'], $registro['destaque']);
        array_push($lista, $assinante);
      }
      return $lista;
    }
  }

  ?>
