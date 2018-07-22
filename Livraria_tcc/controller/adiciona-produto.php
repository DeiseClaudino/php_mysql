<?php

require_once '../view/cabecalho.php';
require_once 'logica-usuario.php';

verificaUsuario();

$tipoProduto = $_POST['tipoProduto'];

$factory = new LivroFactory();
$produto = $factory->criaPor($tipoProduto, $_POST);
$produto->atualizaBaseadoEm($_POST);

$produtoDao = new ProdutoDao($conexao);

if ($produtoDao->insereProduto($produto)) {
    ?>
  <p class="text-success">
      Produto <?=$produto->getNome(); ?>, <?= $produto->getPreco(); ?> adicionado com sucesso!
  </p>

<?php
} else {
        ?>

   <p class="text-danger">
       Produto <?= $produto->getNome() ?>  não adicionado!   </p>
       <?php
    }
?>

<?php include("../view/rodape.php"); ?>
