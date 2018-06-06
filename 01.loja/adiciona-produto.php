<?php

require_once 'cabecalho.php';
require_once 'logica-usuario.php';

verificaUsuario();

$categoria = new Categoria();
$categoria->setId($_POST["categoria_id"]);

$tipoProduto = $_POST['tipoProduto'];

if (array_key_exists('usado', $_POST)) {
    $produtosetUsado = "true";
} else {
    $produtosetUsado = "false";
}

$criadorDeProdutos = new CriadorDeProdutos();
$produto = $criadorDeProdutos->criaPor($tipoProduto, $_POST);
$produto = atualizaBaseadoEm($_POST);

$factory = new ProdutoFactory();
$produto = $factory->criaPor($tipoProduto, $_POST);



$produtoDao = new ProdutoDao($conexao);

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
