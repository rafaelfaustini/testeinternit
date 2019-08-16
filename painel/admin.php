<?php
require __DIR__ . '/../Model/Assinante.php';
require __DIR__ . '/../Controller/AdminController.php';
  session_start();
  $adm = new AdminController();
  if(!isset($_SESSION["assinante"])){
    $_SESSION["assinante"] = NULL;
  }
  $adm->isLogado($_SESSION["assinante"]);


 ?>
<!DOCTYPE html>
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
    <div class="table-responsive text-nowrap">
    <table id="tableAssinantes" class="table table-striped ">
      <p class="display-4 text-center mt-1">Assinantes</p>
      <thead>
  <tr>
    <th scope="col">Cpf</th>
    <th scope="col">Permissão</th>
    <th scope="col">Nome</th>
    <th scope="col">Email</th>
    <th scope="col">Endereço</th>
    <th scope="col">Cidade</th>
    <th scope="col">Uf</th>
  </tr>
</thead>
<tbody>
      <?php $adm->getAssinantes($_SESSION["assinante"]); ?>
</tbody>
    </table>
  </div>

<hr class="my-4">

    <div class="table-responsive text-nowrap">
    <table id="tableNoticias" class="table table-striped">
            <p class="display-4 text-center mt-1">Noticias</p>
      <button class="btn btn-primary">Criar notícia</button>
      <thead>
  <tr>
    <th scope="col">Id</th>
    <th scope="col">Data</th>
    <th scope="col">Resumo</th>
    <th scope="col">Destaque</th>
  </tr>
</thead>
<tbody>
      <?php $adm->getNoticias($_SESSION["assinante"]); ?>
</tbody>
    </table>

</div>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.0/js/mdb.min.js"></script>

  </body>

</html>
