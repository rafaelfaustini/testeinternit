<?php
require_once __DIR__ . '/../Model/Conexao.php';
require_once __DIR__ . '/../Model/Noticia.php';
class PainelController{

  private $conexao;
  private $banco;

  function PainelController(){
    $this->conexao = new Conexao();
    $this->banco = $this->conexao->getBanco();

  }



  private function listarDestaques(){
    $query = $this->banco->prepare("SELECT * FROM noticia where destaque=1 LIMIT 3");
    $query->execute();

    $lista = array();
    while ($registro = $query->fetch()){
      $noticia = new Noticia($registro['id'], $registro['data'],
      $registro['resumo'], $registro['destaque']);
      array_push($lista, $noticia);
    }
    return $lista;
  }

private function listarImagens($id){
  $query = $this->banco->prepare("SELECT * FROM imagem where noticiaID=$id");
  $query->execute();

  $lista = array();
  while ($registro = $query->fetch()){
    $imagem = new Imagem($registro['id'], $registro['noticiaID'],
    $registro['caminho']);
    array_push($lista, $imagem);
  }
  return $lista;
}

  public function visualizarDestaques(){
    $lista = $this->listarDestaques();
    if(sizeof($lista) != 0){
    foreach ($lista as $noticia){
    echo "<div class='card' style='width: 18rem;'>";

  $imagens = $this->listarImagens($noticia->id);

  if($imagens!= NULL){
  echo
  "<div id='carousel-example-1z' class='card-img-top carousel slide carousel-fade' data-ride='carousel'>
        <!--Indicators-->
        <ol class='carousel-indicators'>
          <li data-target='#carousel-example-1z' data-slide-to='0' class='active'></li>
          <li data-target='#carousel-example-1z' data-slide-to='1'></li>
          <li data-target='#carousel-example-1z' data-slide-to='2'></li>
        </ol>
        <!--/.Indicators-->
        <!--Slides-->
        <div class='carousel-inner' role='listbox'>";
  foreach($imagens as $imagem){
echo "
<div class='carousel-item active'>
  <img class='d-block w-100' src='$imagem->caminho'
    alt=''>
</div>";
  }


echo "
      </div>
      <!--/.Slides-->
      <!--Controls-->
      <a class='carousel-control-prev' href='#carousel-example-1z' role='button' data-slide='prev'>
        <span class='carousel-control-prev-icon' aria-hidden='true'></span>
        <span class='sr-only'>Previous</span>
      </a>
      <a class='carousel-control-next' href='#carousel-example-1z' role='button' data-slide='next'>
        <span class='carousel-control-next-icon' aria-hidden='true'></span>
        <span class='sr-only'>Next</span>
      </a>
      <!--/.Controls-->
    </div>";
}

  echo  "  <div class='card-body'>
        <h5 class='card-title'>$noticia->data</h5>
        <p class='card-text'>$noticia->resumo</p>
        <button class='btn btn-primary'>Saiba Mais</button>
      </div>
    </div>
    ";
  }
  echo "<button class='btn btn-secondary'>Veja mais notícias</button>";
} else {
  echo "<p class='text-center m-5'>Não há notícias disponíveis no momento</p>";
}
  }

  private function listarNoticias(){
    $query = $this->banco->prepare("SELECT * FROM noticia");
    $query->execute();

    $lista = array();
    while ($registro = $query->fetch()){
      $noticia = new Noticia($registro['id'], $registro['data'],
      $registro['resumo'], $registro['destaque']);
      array_push($lista, $noticia);
    }
    return $lista;
  }

  public function visualizarNoticias(){

    $lista = $this->listarNoticias();

    foreach ($lista as $noticia){
    echo "
    <div class='card' style='width: 18rem;'>

    <div id='carousel-example-1z' class='carousel slide carousel-fade' data-ride='carousel'>
      <!--Indicators-->
      <ol class='carousel-indicators'>
        <li data-target='#carousel-example-1z' data-slide-to='0' class='active'></li>
        <li data-target='#carousel-example-1z' data-slide-to='1'></li>
        <li data-target='#carousel-example-1z' data-slide-to='2'></li>
      </ol>
      <!--/.Indicators-->
      <!--Slides-->
      <div class='carousel-inner' role='listbox'>
        <!--First slide-->
";

  foreach($imagens as $imagem){
echo "
<div class='carousel-item active'>
  <img class='d-block w-100' src='$imagem->caminho'
    alt=''>
</div>";
  }

echo "
        <!--/First slide-->

      </div>
      <!--/.Slides-->
      <!--Controls-->
      <a class='carousel-control-prev' href='#carousel-example-1z' role='button' data-slide='prev'>
        <span class='carousel-control-prev-icon' aria-hidden='true'></span>
        <span class='sr-only'>Previous</span>
      </a>
      <a class='carousel-control-next' href='#carousel-example-1z' role='button' data-slide='next'>
        <span class='carousel-control-next-icon' aria-hidden='true'></span>
        <span class='sr-only'>Next</span>
      </a>
      <!--/.Controls-->
    </div>

      <div class='card-body'>
        <h5 class='card-title'>$noticia->data</h5>
        <p class='card-text'>$noticia->resumo</p>
        <button class='btn btn-primary'>Saiba Mais</button>
      </div>
    </div>
    ";
  }
  echo "<button class='btn btn-secondary'>Veja mais notícias</button>";

  }


}

 ?>
