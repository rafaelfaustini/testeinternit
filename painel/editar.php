<?php
require_once __DIR__ . '/../Controller/AdminController.php';
require_once __DIR__ . '/../Controller/AssinanteController.php';
require_once __DIR__ . '/../Controller/NoticiaController.php';
session_start();

function redirecionar(){
  header("Location: admin.php");
  exit;
}

 ?>



 <html>
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.0/css/mdb.min.css" rel="stylesheet">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta charset="utf-8" >
   </head>

   <body>
   <div class="container h-100">

<form action="<?=htmlentities(($_SERVER['PHP_SELF']))?>" method="POST">
<?php
if(isset($_SESSION["assinante"])){
  $dados = $_SESSION["assinante"];
  $c = new AdminController();

if ($c->isLogado($dados)){
  if( isset($_GET["nome"]) && isset($_GET["id"]) ){

    $tipo = $_GET["nome"];
    $id = $_GET["id"];


    if($tipo == "assinante"){

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['fromPerson'])){
      $controllerAssinante = new AssinanteController();

      $assinanteNovo = $controllerAssinante->get($id);

      $controllerAssinante->editar($assinanteNovo);
    }

    } else if($tipo == "noticia") {

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['botao'])){
      $controllerNoticia = new NoticiaController();

      private $resumo;
      private $destaque;
      $noticiaNovo = new Noticia($_POST[""]);

      $controllerNoticia->editar($noticiaNovo);
}

    }

  }
}
}
?>
</form>

 </div>


  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.0/js/mdb.min.js"></script>

    </body>

  </html>
