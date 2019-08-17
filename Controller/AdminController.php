<?php
require_once 'NoticiaController.php';
require_once 'AssinanteController.php';

class AdminController{


public function isLogado($dados){
  if(!empty($dados)){
    return $this->isAdmin($dados);
  }
  return false;
}

private function isAdmin($dados){
  if( $dados != null && is_object($dados)){
        return true;
  }
  $parent = dirname(dirname($_SERVER['REQUEST_URI']));
  header("Location: $parent/acesso.php");
  exit;
  return false;

}

public function getAssinantes($dados){
  if($this->isAdmin($dados)){
    $controller = new AssinanteController();
    $lista = $controller->listar();
    foreach ($lista as $assinante) {
    echo "
          <tr>
          <td>$assinante->cpf</td>
          <td>$assinante->permissao</td>
          <td>$assinante->nome</td>
          <td>$assinante->email</td>
          <td>$assinante->endereco</td>
          <td>$assinante->cidade</td>
          <td>$assinante->uf</td>

<td><a href='editarAssinante.php?id=$assinante->cpf'  class='text-warning'>
 <i class='warning-text fa fa-lg fa-edit' data-toggle='tooltip' data-placement='top' title='Editar Assinante'></i
   ></a></td>


  <td> <a  href='operacao.php?assinante=1&deletar=$assinante->cpf' class='text-danger' >
     <i class='fa fa-lg fa-minus-circle' data-toggle='tooltip' data-placement='top' title='Remover Assinante' onClick='confirm(\"Tem certeza que deseja remover ?\");'></i></a>
</td>

  </form>
      </tr>
    ";

    }

  }
}

public function getNoticias($dados){
  if($this->isAdmin($dados)){
    $controller = new NoticiaController();
    $lista = $controller->listar();
    foreach ($lista as $noticia) {
      echo "<tr>
            <td>$noticia->id</td>
            <td>$noticia->titulo</td>
            <td>$noticia->data</td>
            <td >$noticia->resumo</td>
            <td>$noticia->conteudo</td>
            <td>$noticia->destaque</td>

<td><a href='editar.php?nome=assinante&id=$noticia->id'  class='text-warning'>
 <i class='warning-text fa fa-lg fa-edit' data-toggle='tooltip' data-placement='top' title='Editar Notícia'></i
   ></a></td>


  <td> <a href='operacao.php?assinante=1&deletar=".$noticia->id."' class='text-danger' onClick='confirm(\"Tem certeza que deseja remover ?\");'>
     <i class='fa fa-lg fa-minus-circle' data-toggle='tooltip' data-placement='top' title='Remover Notícia'></i></a>
</td>


      </tr>";

    }

  }
}


}
