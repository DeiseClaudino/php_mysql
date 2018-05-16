<?php
require_once("cabecalho.php");
require_once("banco-produto.php");
require_once("class/Produto.php");
require_once("class/Categoria.php");

$produto = new Produto();
$categoria = new Categoria();
$categoria->setId($_POST['categoria_id']);


$produto->setId($_POST['id']);
$nome = $_POST['nome'];
$preco = $_POST['preco'];
$descricao = $_POST['descricao'];
$produto->setCategoria( $categoria);


if(array_key_exists("usado", $_POST)){
  $produto->setUsado("true");
  var_dump($produto->setUsado());
}else{
  $produto->setUsado("false");
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
