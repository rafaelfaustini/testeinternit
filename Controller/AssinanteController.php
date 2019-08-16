<?php
require __DIR__ . '/../Model/Conexao.php';
require_once __DIR__ . '/../Model/Assinante.php';
class AssinanteController
{
  private $conexao;
  private $banco;

  function AssinanteController(){
    $this->conexao = new Conexao();
    $this->banco = $this->conexao->getBanco();
  }

  public function adicionar($assinante){
    $query = $this->banco->prepare(
      "INSERT INTO assinante (cpf, permissao, nome, email,senha, endereco, cidade, uf)
      VALUES (:cpf, 0, :nome, :email, :senha, :endereco, :cidade, :uf);" );

      $query->execute(array(
        ':cpf' => $assinante->cpf,
        ':nome' => $assinante->nome,
        ':email' => $assinante->email,
        ':senha' => $assinante->senha,
        ':endereco' => $assinante->endereco,
        ':cidade' => $assinante->cidade,
        ':uf' => $assinante->uf
      ));

    }



    public function editar($assinante){
      $query = $this->banco->prepare(
        "UPDATE assinante
        SET permissao = :permissao, nome= :nome, email= :email
        senha = :senha, endereco = :endereco, cidade= :cidade,
        uf= :uf
        WHERE cpf = :cpf"
      );

      $query->execute(array(
        ':cpf' => $assinante->cpf,
        ':permissao' => $assinante->permissao,
        ':nome' => $assinante->nome,
        ':email' => $assinante->email,
        ':senha' => $assinante->senha,
        ':endereco' => $assinante->endereco,
        ':cidade' => $assinante->cidade,
        ':uf' => $assinante->uf
      ));

    }

    public function remover($id){
      $query = $this->banco->prepare(
        "DELETE FROM assinante WHERE cpf=:cpf"
      );

      $query->execute(array(
        ':cpf' => $id
      ));
    }

    public function listar(){
      $query = $this->banco->prepare("SELECT * FROM assinante");

      $query->execute();

      $lista = array();
      while ($registro = $query->fetch()){
        $assinante = new Assinante($registro['cpf'], $registro['permissao'],
        $registro['nome'], $registro['email'], $registro['senha'],
        $registro['endereco'], $registro['cidade'], $registro['uf']);
        array_push($lista, $assinante);
      }
      return $lista;
    }

    public function procura($email){
      $query = $this->banco->prepare("SELECT * FROM assinante where email=:email");

      $query->execute(array(
        ':email' => $email
      ));

      while ($registro = $query->fetch()){
        $assinante = new Assinante($registro['cpf'], $registro['permissao'],
        $registro['nome'], $registro['email'], $registro['senha'],
        $registro['endereco'], $registro['cidade'], $registro['uf']);
        return $assinante;
      }
      return -1;
    }

    public function get($cpf){
      $query = $this->banco->prepare("SELECT * FROM assinante where cpf=:cpf");

      $query->execute(array(
        ':cpf' => $cpf
      ));

      while ($registro = $query->fetch()){
        $assinante = new Assinante($registro['cpf'], $registro['permissao'],
        $registro['nome'], $registro['email'], $registro['senha'],
        $registro['endereco'], $registro['cidade'], $registro['uf']);
        return $assinante;
      }
      return -1;
    }

  }

  ?>
