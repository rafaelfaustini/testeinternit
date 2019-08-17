<?php
require_once __DIR__ . '/../Controller/EditarAssinanteController.php';
require_once __DIR__ . '/../Controller/AdminController.php';
session_start();
$adm = new AdminController();
if ($adm->isLogado($_SESSION["assinante"]) ){
  $controller = new EditarImagemController();
    $controller->onEditar();
  $assinante = $controller->getDados();

}else{
  header("Location: admin.php");
  exit;
}


?>

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
              <a class="fas fa-arrow-left" href="admin.php"></a>
            </div>
            <div class="form-group mb-5">
              <p class="h4 text-center py-4">Editar notícia <?=$assinante->nome ?></h3>
              </div>

              <div class="form-group">
                <label for="exampleFormControlInput1">Id</label>
                <input name="cpf" class="form-control disabled" value="<?=$assinante->cpf ?>">
              </div>

              <div class="form-group">
                <label for="exampleFormControlInput1">Resumo</label>
                <input name="permissao" type="number" class="form-control" value="<?=$assinante->permissao ?>">
              </div>

              <div class="form-group">
                <label for="exampleFormControlInput1">Destaque</label>
                <input name="nome" class="form-control" value="<?=$assinante->nome ?>">
              </div>
              <div class="text-center mt-4">
                <button type="submit" class="btn btn-lg btn-primary" name="btneditar">Editar</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
