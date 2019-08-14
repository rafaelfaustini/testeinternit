<?php
class Assinante{
  private $cpf;
  private $permissao;
  private $nome;
  private $email;
  private $senha;
  private $endereco;
  private $cidade;
  private $uf;

  function Assinante($cpf, $permissao, $nome, $email, $senha, $endereco, $cidade, $uf)
{
    $this->cpf = $cpf;
    $this->permissao = $permissao;
    $this->nome = $nome;
    $this->email = $email;
    $this->senha = $senha;
    $this->endereco = $endereco;
    $this->cidade = $cidade;
    $this->uf = $uf;
}

public function __get($property) {
  if (property_exists($this, $property)) {
    return $this->$property;
  }
}

public function isAdmin(){
  if($this->permissao==1){
    return true;
  }
  return false;
}
}
?>
