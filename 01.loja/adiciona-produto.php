<?php require_once 'cabecalho.php';
require_once 'logica-usuario.php';

verificaUsuario();

$categoria= new Categoria();
$categoria->setId($_POST["categoria_id"]);

$nome = $_POST['nome'];
$preco = $_POST['preco'];
$descricao = $_POST['descricao'];
$isn = $_POST['isbn'];
$tipoProduto = $_POST['tipoProduto'];
$taxaImpressao = $_POST['taxaImpressao'];
$watermark = $_POST['watermark'];

if (array_key_exists('usado', $_POST)) {
    $usado= "true";
} else {
    $usado = "false";
}
if($tipoProduto == "LivroFisico"){
  $produto = new LivroFisico($nome, $preco, $descricao, $categoria, $usado);
  $produto->setIsbn($isbn);
  $produto->setTaxaImpressao($taxaImpressao);
}elseif ($tipoProduto == "Ebook") {
  $produto = new Ebook($nome, $preco, $descricao, $categoria, $usado);
  $produto->setIsbn($isbn);
  $produto->setWaterMark($watermark);
}else{
  $produto = new Produto($nome, $preco, $descricao, $categoria, $usado);
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
