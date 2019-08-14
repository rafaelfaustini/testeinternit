<?php
class Noticia{
  private $id;
  private $data;
  private $resumo;
  private $destaque;

  function Noticia($id, $data, $resumo, $destaque)
{
    $this->id = $id;
    $this->data = $data;
    $this->resumo = $resumo;
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
