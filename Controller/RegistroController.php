<?php
require_once "AssinanteController.php";
require_once __DIR__ . '/../Model/Assinante.php';
class RegistroController{

  private $conexao;
  private $banco;

  function RegistroController(){
    $this->conexao = new Conexao();
    $this->banco = $this->conexao->getBanco();
  }

  private function limpaCPF($valor){
 $valor = trim($valor);
 $valor = str_replace(".", "", $valor);
 $valor = str_replace(",", "", $valor);
 $valor = str_replace("-", "", $valor);
 $valor = str_replace("/", "", $valor);
 return $valor;
}

  private function isDuplicado($cpf,$email){
    $query = $this->banco->prepare("select * from assinante where cpf=:cpf or email=:email");

    $query->execute(array(
      ':cpf' => $cpf,
      ':email' => $email
    ));

    $quantidade = 0;
    while ($registro = $query->fetch()){
      $quantidade++;
    }
    return $quantidade;
  }


private function hashear($senha){
  $senha = trim($senha);
  $senha = password_hash($senha, PASSWORD_DEFAULT);
  return $senha;
}

public function registrar(){

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

//print_r($_POST);
if(isset($_POST["cpf"]) && isset($_POST["nome"]) && isset($_POST["email"]) && isset($_POST["end"]) &&
isset($_POST["cidade"]) && isset($_POST["uf"]) && isset($_POST["senha"]) && isset($_POST["csenha"]) ){

if(!$this->isDuplicado($_POST["cpf"],$_POST["nome"])){ // Se não houver emails e cpfs iguais cadastrados
  if($_POST["senha"] == $_POST["csenha"]){ // Confirmação Válida
    $hash = $this->hashear($_POST["senha"]);
  //  $cpf, $permissao, $nome, $email, $senha, $endereco, $cidade, $uf
    $cpf = $this->limpaCPF($_POST["cpf"]);
    $assinante = new Assinante($cpf, 0 ,$_POST["nome"],$_POST["email"], $hash ,$_POST["end"], $_POST["cidade"], $_POST["uf"]);
    $controller = new AssinanteController();
    $controller->adicionar($assinante);
    $parent = dirname(dirname($_SERVER['REQUEST_URI']));
    echo $_SERVER['REQUEST_URI'];
    header("Location: acesso.php");
    exit;
}
}
}
}
}
}



?>
