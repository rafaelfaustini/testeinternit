<?php

class EditarDadosController{


    private $conexao;
    private $banco;

    function EditarDadosController(){
      $this->conexao = new Conexao();
      $this->banco = $this->conexao->getBanco();
    }

    private function encriptar($senha){
      return password_hash($senha, PASSWORD_DEFAULT);
    }

    public function onEditar(){
          if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btnatualizar'])
          && isset($_POST['cpf']) &&  isset($_POST['nome'])
           && isset($_POST['email']) && isset($_POST['endereco'])
          && isset($_POST['cidade']) && isset($_POST['uf'])){

       $assinanteNovo = new Assinante($_POST['cpf'],$_SESSION["assinante"]->permissao,$_POST['nome'],$_POST['email'],
       "",$_POST['endereco'],$_POST['cidade'],$_POST['uf']);

       require_once __DIR__ . '/../Controller/AssinanteController.php';
       $controller = new AssinanteController();
       $controller->editar($assinanteNovo);
       if(isset($_POST['senha']) && !empty($_POST['senha'])){
       $controller->atualizarSenha($_SESSION["assinante"]->cpf,$this->encriptar($_POST['senha']));
       }
       session_destroy();
       header("Location: index.php");
       exit;
    }
}
}

 ?>
