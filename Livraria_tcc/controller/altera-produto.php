<?php
require_once '../view/cabecalho.php';

$tipoProduto = $_POST['tipoProduto'];
$produto_id = $_POST['id'];
$categoria_id = $_POST['categoria_id'];

$factory = new LivroFactory();
$produto = $factory->criaPor($tipoProduto, $_POST);
$produto->atualizaBaseadoEm($_POST);

$produto->setId($produto_id);
$produto->getCategoria()->setId($categoria_id);

$livroDao = new LivroDao($conexao);

if ($livroDao->alteraProduto($produto)) {
    ?>
	<p class="text-success">O produto <?= $produto->getNome() ?>, <?= $produto->getPreco() ?> foi alterado.</p>
<?php
} else {
        ?>
	<p class="text-danger">O produto <?= $produto->getNome() ?> não foi alterado: </p>
<?php
    }
?>

<?php include("../view/rodape.php"); ?>
