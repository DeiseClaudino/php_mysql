<?php require_once("cabecalho.php");
require_once("banco-produto.php");
require_once("logica-usuario.php");
verificaUsuario();
 ?>
<table class="table table-striped table-bordered">
  <?php
    $produtos = listaProdutos($conexao);
    foreach($produtos as $produto){
  ?>
  <tr>
    <td> <?= $produto->getNome() ?>  </td>
    <td><?= $produto->getPreco() ?></td>
    <td><?= $produto->getPreco()ComDesconto()  ?></td>
    <td> <?=substr($produto->getDescricao(), 0,40) ?> </td>
    <td><?=$produto->getCategoria()->getNome()?></td>
    <td><a class="btn btn-primary" href="produto-altera-formulario.php?id=<?=$produto->getId() ?>">Alterar</a></td>
    <td>
      <form action="remove-produto.php" method="post">
        <input type="hidden" name="id" value="<?=$produto->getId() ?>">
        <button class="btn btn-danger">Remover</button>
      </form>
    </td>
  </tr>

  <?php
    }
    #mostra os produtos na tela
  ?>
</table>


<?php include("rodape.php"); ?>
