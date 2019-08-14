<?php
require_once __DIR__ . '/../Controller/AdminController.php';
require_once __DIR__ . '/../Controller/AssinanteController.php';
require_once __DIR__ . '/../Controller/NoticiaController.php';
session_start();

function redirecionar(){
  header("Location: admin.php");
  exit;
}

if(isset($_SESSION["assinante"])){
  $dados = $_SESSION["assinante"];
  $c = new AdminController();

if ($c->isLogado($dados)){
  if( isset($_GET["nome"]) && isset($_GET["id"]) ){

    $tipo = $_GET["nome"];
    $id = $_GET["id"];

    if($tipo == "assinante"){

      $controllerAssinante = new AssinanteController();

      $assinanteNovo = $controllerAssinante->get($id);

      $controllerAssinante->editar($assinanteNovo);

    } else if($tipo == "noticia") {

      $controllerNoticia = new NoticiaController();

      $noticiaNovo = $controllerNoticia->get($id);

      $controllerNoticia->editar($noticiaNovo);

    }

  }
}

}




 ?>
