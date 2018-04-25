<?php
require_once("class/Produto.php");
require_once("cabecalho.php");
require_once("banco-produto.php");
require_once("class/Produto.php");
require_once("class/Categoria.php");

$produto = new Produto();
$categoria = new Categoria();
$categoria ->id = $_POST['categoria_id'];


$produto->getId() = $_POST['id'];
$produto->getNome()= $_POST['nome'];
$produto->getPreco()= $_POST['preco'];
$produto->getDescricao() = $_POST['descricao'];
$produto->getCategoria()= $categoria;


if(array_key_exists("usado", $_POST)){
  $produto->getUsado() = "true";
  var_dump($produto->getUsado());
}else{
  $produto->getUsado() = "false";
}

if (alteraProduto($conexao, $produto)) { ?>
  <p class="text-success"> Produto <?= $produto->getNome(); ?>, <?= $produto->getPreco(); ?> alterado com sucesso!</p>

 <?php
    } else {
        $msg = mysqli_error($conexao);
       ?>

   <p class="text-danger">Produto <?= $produto->getNome()?>  não alterado! <?= $msg?></p>
<?php

}
#faz a inserção dos dados no banco.
 ?>

<?php include("rodape.php"); ?>
