<?php
require_once __DIR__ . '/../Model/Conexao.php';
require_once __DIR__ . '/../Model/Assinante.php';

class EditarAssinanteController{
  private $conexao;
  private $banco;

  function EditarAssinanteController(){
    $this->conexao = new Conexao();
    $this->banco = $this->conexao->getBanco();
  }

  public function getDados(){
    if(isset($_GET["id"])){
      $id = $_GET["id"];
      $query = $this->banco->prepare("SELECT * FROM assinante where cpf=:cpf");

        $query->execute(array(
          ':cpf' => $id
        ));

      while ($registro = $query->fetch()){
        $assinante = new Assinante($registro['cpf'], $registro['permissao'],
        $registro['nome'], $registro['email'], $registro['senha'],
        $registro['endereco'], $registro['cidade'], $registro['uf']);
      }
      return $assinante;
    } else{
      die();
    }
  }

  public function onEditar(){
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btneditar'])
    && isset($_POST['cpf']) &&  isset($_POST['nome']) && isset($_POST['cpf'])
    && isset($_POST['permissao']) && isset($_POST['email']) && isset($_POST['endereco'])
    && isset($_POST['cidade']) && isset($_POST['uf'])){

 $assinanteNovo = new Assinante($_POST['cpf'],$_POST['permissao'],$_POST['nome'],$_POST['email'],
 "",$_POST['endereco'],$_POST['cidade'],$_POST['uf']);

 $controller = new AssinanteController();
 $controller->editar($assinanteNovo);

 header("Location: admin.php");
 exit;


    }
  }
}

?>
