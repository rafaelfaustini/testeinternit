<?php

class PainelController{

  private $conexao;
  private $banco;

  function PainelController(){
    $this->conexao = new Conexao();
    $this->banco = $this->conexao->getBanco();

  }


  private function listarDestaques(){
    $query = $this->banco->prepare("SELECT * FROM noticia where destaque=1");
    $query->execute();

    $lista = array();
    while ($registro = $query->fetch()){
      $noticia = new Noticia($registro['id'], $registro['data'],
      $registro['resumo'], $registro['destaque']);
      array_push($lista, $assinante);
    }
    return $lista;
  }
  public function visualizarDestaques(){
    $lista = $this->listarDestaques();

    foreach ($lista as $noticia)
    echo "
    <div class='card' style='width: 18rem;'>
      <div class='card-body'>
        <h5 class='card-title'>$noticia->data</h5>
        <p class='card-text'>$noticia->resumo</p>
      </div>
    </div>
    "
  }

  public function visualizarNoticias(){

  }


}

 ?>
