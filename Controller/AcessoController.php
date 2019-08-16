<?php
require __DIR__ . '/../Model/Assinante.php';
require 'AssinanteController.php';

class AcessoController{

public function autenticar(){
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST["email"]) && !empty($_POST["email"])){
      if (isset($_POST["senha"]) && !empty($_POST["senha"])){
        $email = htmlentities($_POST["email"]);
        $senha = htmlentities($_POST["senha"]);
        $this->verificarAssinante($email, $senha);
      }
    }
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
        header('Location: painel/painel.php');
        die();
      } else if($assinante->permissao == 1){
        // Admin
        header("Location: painel/");
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
