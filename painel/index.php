<?php
require __DIR__ . '/../Model/Assinante.php';
require __DIR__ . '/../Controller/PainelController.php';
  session_start();
  $painel = new PainelController();
  if(!isset($_SESSION["assinante"])){
    $parent = dirname(dirname($_SERVER['REQUEST_URI']));
    header("Location: $parent/acesso.php");
    exit;
  }
  require_once __DIR__ . '/../Controller/AdminController.php';
  $admin = new AdminController();
  $_SESSION['noticia'] = null;
 ?>
 <html>
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.0/css/mdb.min.css" rel="stylesheet">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta charset="utf-8">
   </head>
   <body>
     <nav class="mb-1 navbar navbar-expand-lg navbar-dark default-color">
       <a class="navbar-brand" href="#">Área Restrita</a>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
         aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
       </button>
       <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
         <ul class="navbar-nav mr-auto">
           <li class="nav-item active">
             <a class="nav-link" href="#">Início
               <span class="sr-only">(current)</span>
             </a>
           </li>
           <?php
           if($admin->checkAdmin($_SESSION["assinante"]))
           echo "
           <li class='nav-item'>
             <a class='nav-link' href='admin.php'>Admin</a>
           </li>";
           ?>
         </ul>
         <ul class="navbar-nav ml-auto nav-flex-icons">
           <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user"></i> <?=$_SESSION["assinante"]->nome; ?> </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
              <a class="dropdown-item waves-effect waves-light" href="dados.php">Meus Dados</a>
              <a class="dropdown-item waves-effect waves-light" href="logout.php">Sair</a>
            </div>
          </li>
         </ul>
       </div>
     </nav>
   <div class="container h-100">
     <?php
      $painel->visualizarDestaques()
      ?>
 </div>

 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.0/js/mdb.min.js"></script>

   </body>

 </html>
