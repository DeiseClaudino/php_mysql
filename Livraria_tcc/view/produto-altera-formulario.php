<?php require_once 'cabecalho.php';

$livroDao = new LivroDao($conexao);
$categoriaDao = new CategoriaDao($conexao);

$id = $_GET['id'];
$produto = $livroDao->buscaProduto($id);
$categorias = $categoriaDao->listaCategorias();

?>

<h1>Alterando produto</h1>
<form action="../controller/altera-produto.php" method="post">
	<input type="hidden" name="id" value="<?=$produto->getId()?>">
	<table class="table">
		<?php include 'produto-formulario-base.php'; ?>
		<tr>
			<td>
				<button class="btn btn-primary" type="submit">Alterar</button>
			</td>
		</tr>
	</table>
</form>

<?php require_once 'rodape.php' ?>
