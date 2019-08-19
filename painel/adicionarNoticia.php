<?php
require_once __DIR__ . '/../Controller/AdicionarNoticiaController.php';
require_once __DIR__ . '/../Controller/AdminController.php';
session_start();
$adm = new AdminController();
$adm->kick($_SESSION["assinante"]);
if ($adm->isLogado($_SESSION["assinante"]) ){
  $controller = new AdicionarNoticiaController();
  $controller->onAdicionar();

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
          <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="col-12" id="formulario" enctype="multipart/form-data">
            <div class="form-group">
              <a class="fas fa-arrow-left" href="admin.php"></a>
            </div>
            <div class="form-group mb-5">
              <p class="h4 text-center py-4">Criar Notícia</h3>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Título</label>
                <input name="titulo" class="form-control" required>
              </div>
              <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="defaultUnchecked" name="destaque">
                    <label class="custom-control-label" for="defaultUnchecked" >Destaque</label>
                </div>
              </div>

              <div class="form-group">
                <label for="exampleFormControlInput1">Resumo</label>
                <input name="resumo" class="form-control" required>
              </div>

              <div class="form-group">
                <label for="exampleFormControlTextarea1">Conteúdo</label>
                <textarea class="form-control rounded-0" name="conteudo" rows="10" required></textarea>
              </div>


              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                </div>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="inputGroupFile01"
                  aria-describedby="inputGroupFileAddon01" name="imgupload[]" multiple="multiple" accept="image/*">
                  <label class="custom-file-label" for="inputGroupFile01">Escolher Imagem</label>
                </div>
              </div>
              <div class="text-center mt-4">
                <button type="submit" class="btn btn-lg btn-primary" name="btncriar">Criar</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </body>
  </html>
