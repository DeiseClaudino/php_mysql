<?php require_once 'cabecalho.php';
require_once 'logica-usuario.php';

verificaUsuario();

$categoria= new Categoria();
$categoria->setId($_POST["categoria_id"]);
$tipoProduto = $_POST['tipoProduto'];
$taxaImpressao = $_POST['taxaImpressao'];
$watermark = $_POST['watermark'];
$criadorDeProdutos = new CriadorDeProdutos();
$produto = $criadorDeProdutos->criaPor($tipoProduto, $_POST);

$factory = new Factory();
$produto = $factory->criaPor($tipoProduto, $_POST);
$produto = atualizaBaseadoEm($_POST);
if ($produto->temIsbn()) {
  $produto->setIsbn($isbn);
}
if ($produto->temTaxaImpressao()) {
  $produto->setTaxaImpressao($taxaImpressao);
}
if ($produto->temWaterMark()) {
  $produto->setWaterMark($watermark);
}

if (array_key_exists('usado', $_POST)) {
    $usado= "true";
} else {
    $usado = "false";
}

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
#faz a inserção dos dados no banco.
?>

<?php include("rodape.php"); ?>
