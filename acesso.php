<?php
require 'Controller/AcessoController.php';
$acesso = new AcessoController();
$acesso->autenticar();
 ?>

<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.0/css/mdb.min.css" rel="stylesheet">
  </head>

  <body>
  <div class="container h-100">
  <div class="row h-100 justify-content-center align-items-center">
      <div class="card animated zoomIn" id="area_restrita" style="width: 450px;">
    <div class="card-body text-muted m-3">
  <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" id="formulario">
  <div class="form-group mb-4">
    <p class="h4 py-4 gray" style="color: #212121;">Acesso</h3>
  </div>

  <div class="md-form form-lg">
    <i class="fa fa-envelope prefix"></i>
    <input type="text" id="email" name="email" class="form-control form-control-lg" required>
    <label for="login">Email</label>
  </div>
  <div class="md-form form-lg">
    <i class="fa fa-lock prefix"></i>
    <input type="password" id="senha" name="senha" class="form-control form-control-lg" required>
    <label for="login">Senha</label>
  </div>
  <div class="text-left mt-5">
  <p>Caso não esteja em um dispositivo próprio, logue-se por meio de uma janela privativa no navegador</p>
  </div>
    <div class="text-center mt-4">
    <button type="submit" class="btn btn-lg btn-primary" id="btnlogar">Entrar</button>
    </div>
      </form>
    </div>
    <div class="modal-footer mx-5 pt-3 mb-1">
    <p class="font-small grey-text d-flex justify-content-end">Não é membro? <a href="registro.php" class="blue-text ml-1">Cadastre-se</a></p>
</div>
</div>
</div>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.0/js/mdb.min.js"></script>
  </body>

</html>
