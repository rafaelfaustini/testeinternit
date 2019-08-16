<?php include 'modulos/exec_registro.php'; ?>

<!doctype html>
<html lang="en">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.0/css/mdb.min.css" rel="stylesheet">
 <body>
   <div class="container h-100">
 <div class="row h-100 justify-content-center align-items-center">
   <div class="card animated zoomIn" id="area_restrita" style="width: 45rem;">
 <div class="card-body text-muted m-3">


     <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="col-12" id="formulario">
       <div class="form-group">
         <?php
         if(isset($erro))
       echo '<div class="alert alert-danger" role="alert">'.$erro.'</div>';
         if(isset($alerta))
       echo '<div class="alert alert-success" role="alert">
           '.$alerta.'
         </div>';

          ?>
       </div>
       <div class="form-group mb-5">
         <p class="h4 text-center py-4">Criar sua Conta</h3>
       </div>
       <div class="md-form form-lg">
         <i class="fa fa-user prefix"></i>
         <input type="text" id="nome" name="nome" class="form-control form-control-lg" pattern=".{1,255}" required title="de 1 a 255 caracteres">
         <label for="nome">Nome</label>
       </div>
       <div class="md-form form-lg">
         <i class="fa fa-envelope prefix"></i>
         <input type="text" id="email" name="email" class="form-control form-control-lg" pattern=".{3,254}" required title="de 3 a 254 caracteres">
         <label for="email">Email</label>
       </div>
       <div class="md-form form-lg">
         <i class="fa fa-lock prefix"></i>
         <input type="password" id="senha" name="senha"  class="form-control form-control-lg" pattern=".{10,30}" required title="de 10 a 30 caracteres">
         <label for="senha">Senha</label>
       </div>
       <div class="md-form form-lg">
         <i class="fa fa-exclamation-triangle prefix"></i>
         <input type="password" id="csenha" name="csenha" class="form-control form-control-lg" pattern=".{10,30}" required title="de 10 a 30 caracteres">
         <label for="csenha">Confirmar Senha</label>
       </div>
       <div class="text-center mt-4">
         <button type="submit" class="btn btn-lg btn-primary" id="btnregistrar">Registrar</button>
       </div>
     </div>
     <div class="modal-footer mx-5 pt-3 mb-1">
     <p class="font-small grey-text d-flex justify-content-end">Já é membro? <a href="login.php" class="blue-text ml-1">Logue-se</a></p>
 </div>
 </div>
     </form>
   </div>
   <div class="form-group ">
    <div class="g-recaptcha" data-sitekey="6LcVzVYUAAAAANKu6D01viIsjC6Zl51aDz-vqkQ-
   " data-bind="btnregistrar" data-callback="submitForm"></div>
   </div>
 </div>

 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.0/js/mdb.min.js"></script>
</body>
</html>
