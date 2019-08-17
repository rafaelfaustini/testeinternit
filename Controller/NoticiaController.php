<?php
require_once __DIR__ . '/../Model/Noticia.php';
class NoticiaController
{
  private $conexao;
  private $banco;

  function NoticiaController(){
    $this->conexao = new Conexao();
    $this->banco = $this->conexao->getBanco();
  }

  public function adicionar($noticia){
    $query = $this->banco->prepare(
      "INSERT INTO noticia (titulo, data, resumo, conteudo, destaque)
      VALUES (:titulo ,:data, :resumo, :conteudo, :destaque);" );

      $query->execute(array(
        ':titulo' => $noticia->titulo,
        ':data' => $noticia->data,
        ':resumo' => $noticia->resumo,
        ':conteudo' => $noticia->conteudo,
        ':destaque' => $noticia->destaque
      ));
      return $this->banco->lastInsertId();
    }

    public function editar($noticia){
      $query = $this->banco->prepare(
        "UPDATE noticia
        SET data = :data, resumo= :resumo, destaque= :destaque
        WHERE id = :id"
      );

      $query->execute(array(
        ':data' => $noticia->data,
        ':resumo' => $noticia->resumo,
        ':destaque' => $noticia->destaque
      ));
    }

    public function remover($id){
      $query = $this->banco->prepare(
        "DELETE FROM noticia WHERE id=:id"
      );

      $query->execute(array(
        ':id' => $id
      ));
    }

    public function listar(){
      $query = $this->banco->prepare("SELECT * FROM noticia");

      $query->execute();
      $lista = array();
      while ($registro = $query->fetch()){
        $noticia = new Noticia($registro['id'], $registro['titulo'], $registro['data'],
        $registro['resumo'], $registro['conteudo'], $registro['destaque']);
        array_push($lista, $noticia);
      }
      return $lista;
    }
  }

  ?>
