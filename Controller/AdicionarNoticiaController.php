<?php
require_once __DIR__ . '/../Model/Conexao.php';
require_once __DIR__ . '/../Model/Assinante.php';
require_once __DIR__ . '/../Model/Imagem.php';
require_once __DIR__ . '/../Controller/ImagemController.php';

class AdicionarNoticiaController{

  public function onAdicionar(){


    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btncriar'])
    && isset($_POST['titulo']) && isset($_POST['conteudo'])&& isset($_POST['resumo'])){
      if(isset($_POST['destaque'])){
        $destaque=1;
      } else{
        $destaque =0;
      }

    $controller = new NoticiaController();

  $data = time();

  $noticia = new Noticia(null, $_POST['titulo'], $data,
  $_POST['resumo'], $_POST['conteudo'], $destaque);

 $id= $controller->adicionar($noticia);

 foreach ($_FILES["imgupload"]["error"] as $key => $error) {
    if ($error == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES["imgupload"]["tmp_name"][$key];
        $extensao = preg_replace('@.+\.@', '', $_FILES["imgupload"]['name'][$key]);
        $name = md5(password_hash($_FILES["imgupload"]["name"][$key],  PASSWORD_DEFAULT));
        $diretorio =realpath(dirname(dirname(__FILE__))). "\img\\$name.$extensao";
        $movido = move_uploaded_file($tmp_name, $diretorio);
        if($movido){
          $controllerImagem = new ImagemController();
          $imagem = new Imagem(null, $id, $diretorio);
          $controllerImagem->adicionar($imagem);
        }
    }
}

header("Location: admin.php");
exit;


    }
  }
}

?>
