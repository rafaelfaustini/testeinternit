<?php
require_once __DIR__ . '/../Controller/AssinanteController.php';
require_once __DIR__ . '/../Controller/NoticiaController.php';
require_once __DIR__ . '/../Controller/AdminController.php';
require_once __DIR__ . '/../Controller/ImagemController.php';

  session_start();
  $adm = new AdminController();
  $adm->kick($_SESSION["assinante"]);
  if(!isset($_SESSION["assinante"])){
    $_SESSION["assinante"] = NULL;
  }
  $adm->isLogado($_SESSION["assinante"]);


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
  $controllerimg = new ImagemController();
  $controllerimg->removerImagensNoticia($_GET['deletar']);
  $controller->remover($_GET['deletar']);
  redirecionar();
}




 ?>
