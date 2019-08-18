<?php
require_once __DIR__ . '/../Model/Conexao.php';
require_once __DIR__ . '/../Model/Noticia.php';
require_once __DIR__ . '/../Model/Imagem.php';
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
      $noticia = new Noticia($registro['id'], $registro['titulo'], $registro['data'],
      $registro['resumo'], $registro['conteudo'], $registro['destaque']);
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
    if(isset($_POST["btnvermais"])){
      $controller = new NoticiaController();
      $lista = $controller->listar();

      if(sizeof($lista) != 0){
        foreach ($lista as $noticia){
          echo "<div class='row justify-content-center'>";
          $this->cardNoticia($noticia);
          echo "</div>";
      }
  } else {
    echo "<p class='text-center m-5'>Não há notícias disponíveis no momento</p>";
  }
    } else{
      $lista = $this->listarDestaques();
      if(sizeof($lista) != 0){
      echo "<div class='card-deck'>";
        foreach ($lista as $noticia){
          $this->cardNoticia($noticia);
      }
      echo "</div>";
    echo "<form action='' method='POST'><div class='col d-flex justify-content-center'><button class='btn btn-secondary' name='btnvermais'>Veja mais notícias</button></div></form>";
  } else {
    echo "<p class='text-center m-5'>Não há notícias disponíveis no momento</p>";
  }
    }

  }

  private function cardNoticia($noticia){
    echo "<div class='card my-3' style='width: 25rem;'>";

  $imagens = $this->listarImagens($noticia->id);

  if($imagens!= NULL){
    $tamanho = sizeof($imagens);
  echo
  "
  <div id='carousel-example-1z' class='card-img-top carousel slide carousel-fade' data-ride='carousel'>
        <!--Indicators-->
        <ol class='carousel-indicators'>";
      for($i=0;$i<$tamanho;$i++){
          if(!$i){
            echo "<li data-target='#carousel-example-1z' data-slide-to='$i' class='active'></li>";
          } else {
          echo "<li data-target='#carousel-example-1z' data-slide-to='$i'></li>";
        }

      }

    echo "</ol>
        <!--/.Indicators-->
        <!--Slides-->
        <div class='carousel-inner' role='listbox'>";

$contador = 0;
  foreach($imagens as $imagem){
    if(!$contador){
      echo "
      <div class='carousel-item active'>
        <img class='d-block w-100' src='..$imagem->caminho'
          alt='' style='width: 100%;height: 15vw;object-fit: cover;'>
      </div>";
    } else{
echo "
<div class='carousel-item'>
  <img class='d-block w-100' src='..$imagem->caminho'
    alt='' style='width: 100%;height: 15vw;object-fit: cover;'>
</div>";
}
$contador++;
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
        <h4 class='card-title'>$noticia->titulo</h5>
        <h7 class='card-subtitle mb-2 text-muted'>".date('d/m/Y', $noticia->data)."</h7>
        <p class='card-text'>$noticia->resumo</p>
        <button class='btn btn-primary'>Saiba Mais</button>
      </div>
    </div>

    ";
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
