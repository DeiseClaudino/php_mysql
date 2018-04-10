<?php include("cabecalho.php"); ?>
<?php include("banco-produto.php"); ?>
<?php include("conecta.php"); ?>
<table class="table table-striped table-bordered">
  <?php
    $produtos = listaProdutos($conexao);
    foreach($produtos as $produto){
  ?>
  <tr>
    <td> <?= $produto['nome'] ?>  </td>
    <td> <?=$produto['preco'] ?> </td>
  </tr>

  <?php
    }
  ?>
</table>
<?php include("rodape.php"); ?>
