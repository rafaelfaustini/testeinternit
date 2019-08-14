<?php
class Conexao{
  private $banco;
  const HOST = "localhost";
  const DB = "internit";
  const USER = "root";
  const SENHA = "";

function getBanco(){
  return $this->banco;
}

function Conexao(){
try {
  $this->banco = new PDO("mysql:host=".self::HOST.";
dbname=".self::DB."",
 self::USER, self::SENHA);
}
catch(PDOException $e){
  print "Erro: ".$e->getMessage();
  die();
}

}

}

?>
