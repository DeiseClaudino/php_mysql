<?php

require_once 'cabecalho.php';
require_once 'logica-usuario.php';

verificaUsuario();

$tipoProduto = $_POST['tipoProduto'];

$factory = new ProdutoFactory();
$produto = $factory->criaPor($tipoProduto, $_POST);
$produto->atualizaBaseadoEm($_POST);

$produtoDao = new ProdutoDao($conexao);

var_dump($produtoDao);
exit();

if ($produtoDao->insereProduto($produto)) {
    ?>
  <p class="text-success">
      Produto <?=$produto->getNome(); ?>, <?= $produto->getPreco(); ?> adicionado com sucesso!
  </p>

<?php
} else {
        $msg = mysqli_error($conexao); ?>

   <p class="text-danger">
       Produto <?= $produto->getNome() ?>  não adicionado! <?= $msg?>
   </p>
<?php
    }
?>

<?php include("rodape.php"); ?>
