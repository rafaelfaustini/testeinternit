<?php
require __DIR__ . '/../Controller/AssinanteController.php';
require __DIR__ . '/../Controller/NoticiaController.php';

function redirecionar(){
  header("Location: admin.php");
  exit;
}

if (isset($_GET['deletar']) && isset($_GET['assinante'])){
  $controller = new AssinanteController();
  $controller->remover($_GET['deletar']);
  redirecionar();

}

if (isset($_GET['deletar']) && isset($_GET['noticia'])){
  $controller = new NoticiaController();
  $controller->remover($_GET['deletar']);
  redirecionar();
}




 ?>
