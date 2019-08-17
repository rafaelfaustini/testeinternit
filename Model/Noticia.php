<?php

class Noticia{
  private $id;
  private $titulo;
  private $data;
  private $resumo;
  private $conteudo;
  private $destaque;

  function Noticia($id, $titulo, $data, $resumo, $conteudo, $destaque)
{
    $this->id = $id;
    $this->titulo = $titulo;
    $this->data = $data;
    $this->resumo = $resumo;
    $this->conteudo = $conteudo;
    $this->destaque = $destaque;
}

  public function __get($property) {
    if (property_exists($this, $property)) {
      return $this->$property;
    }
  }

  public function __set($property, $value) {
    if (property_exists($this, $property)) {
      $this->$property = $value;
    }

    return $this;
  }

}
 ?>
