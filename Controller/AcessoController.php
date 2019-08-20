<?php
require __DIR__ . '/../Model/Assinante.php';
require 'AssinanteController.php';

class AcessoController{

  private $status;

public function autenticar(){
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST["email"]) && !empty($_POST["email"])){
      if (isset($_POST["senha"]) && !empty($_POST["senha"])){
        $email = htmlentities($_POST["email"]);
        $senha = htmlentities($_POST["senha"]);
        $this->status = $this->verificarAssinante($email, $senha);
      }
    }
  }
}

public function gerarAlertas(){
if(isset($this->status)){
  echo "<div class='alert alert-danger' role='alert'>";
  switch($this->status){
    case 900:
      echo "Senha Incorreta";
      break;
    case 800;
      echo "Email não encontrado";
      break;
  }
  echo "</div>";
}
}

private function verificarAssinante($email,$senha){
  $controlador = new AssinanteController();

  if(!is_int($assinante=$controlador->procura($email))){
    if(password_verify($senha, $assinante->senha)){
      session_start();
      $_SESSION["assinante"]=$assinante;
      if(!$assinante->permissao){
        // Usuário normal
        header('Location: painel/');
        die();
      } else if($assinante->permissao == 1){
        // Admin
        header("Location: painel/admin.php");
        die();
      }
    } else{
      return 900; // Senha incorreta
    }
  } else{
    return 800; // Email não encontrado
  }
  }
}

?>
