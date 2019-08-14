<?php

class Imagem{
  private $id;
  private $noticia;
  private $caminho;

  function Imagem($id,$noticia,$caminho)
{
    $this->id = $id;
    $this->noticia = $noticia;
    $this->caminho = $caminho;
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
