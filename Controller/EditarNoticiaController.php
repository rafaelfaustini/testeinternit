<?php
require_once __DIR__ . '/../Model/Conexao.php';
require_once __DIR__ . '/../Model/Noticia.php';

class EditarNoticiaController{
  private $conexao;
  private $banco;

  function EditarNoticiaController(){
    $this->conexao = new Conexao();
    $this->banco = $this->conexao->getBanco();
  }

  public function getDados(){
    if(isset($_GET["id"])){
      $id = $_GET["id"];
      if(!is_int(intval($id))){
        die();
      }
      $query = $this->banco->prepare("SELECT * FROM noticia where id=:id");

      $query->execute([':id' => $id]);

      while ($registro = $query->fetch()){
        $noticia = new Noticia($registro['id'], $registro['titulo'],
        $registro['data'], $registro['resumo'], $registro['conteudo'],
        $registro['destaque']);
      }
      return $noticia;
    } else{
      die();
    }
  }

  public function onEditar(){
    if( $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btneditar'])
    && isset($_POST['id']) &&  isset($_POST['titulo']) && isset($_POST['resumo'])
    && isset($_POST['conteudo'])){

      if(isset($_POST['destaque'])){
        $destaque=1;
      } else{
        $destaque =0;
      }
  $data = time();
 $noticiaNovo = new Noticia($_POST['id'],$_POST['titulo'],$data,$_POST['resumo']
 ,$_POST['conteudo'],$destaque);

 $controller = new NoticiaController();
 $controller->editar($noticiaNovo);

 header("Location: admin.php");
 exit;
    }
  }
}

?>
