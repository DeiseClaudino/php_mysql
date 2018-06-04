<?php require_once 'cabecalho.php';

$id = $_GET['id'];
$produtoDao = new ProdutoDao($conexao);
$produto = $produtoDao->buscaProduto($id);

$categorias = listaCategorias($conexao);
$usado = $produto->getUsado() ? "checked = 'checked'" : "";
  ##cadastro para alteação dos produtos já existentes
?>

<h1>Alterando Produto</h1>
<form action="altera-produto.php" method="post">
  <input type="hidden" name="id" value="<?=$produto->getId()?>">
  <table class="table">
    <?php include("produto-formulario-base.php"); ?>
    <tr>
      <td><button class="btn btn-primary" type="submit">Alterar</button></td>
    </tr>


  </table>
</form>

<?php include("rodape.php"); #Fromulário para insercao de dados?>
