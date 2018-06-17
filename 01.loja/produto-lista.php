<?php
require_once 'cabecalho.php';

?>
<h1>Lista de Produtos</h1>
<table class="table table-striped table-bordered">
    <tr>
      <th>Nome</th>
      <th>Preço</th>
      <th>Imposto</th>
      <th>Descrição</th>
      <th>Categoria</th>
      <th>ISBN</th>
      <th colspan="2">Ações</th>
    </tr>
    <?php
    $produtoDao = new ProdutoDao($conexao);
    $produtos = $produtoDao->listaProdutos();
    foreach ($produtos as $produto) :
    ?>

        <tr>
            <td><?= $produto->getNome() ?></td>
            <td><?= $produto->getPreco() ?></td>
            <td><?= $produto->calculaImposto() ?></td>
            <td><?= substr($produto->getDescricao(), 0, 40) ?></td>
            <td><?= $produto->getCategoria()->getNome() ?></td>

            <td>
              <?php
              if ($produto->temIsbn()) {
                  echo "" .$produto->getIsbn();
              }
               ?>

            </td>

            <td>
                <a class="btn btn-primary"
                    href="produto-altera-formulario.php?id=<?=$produto->getId()?>">
                    alterar
                </a>
            </td>
            <td>
                <form action="remove-produto.php" method="post">
                    <input type="hidden" name="id" value="<?=$produto->getId()?>">
                    <button class="btn btn-danger">remover</button>
                </form>
            </td>
        </tr>
    <?php
    endforeach
    ?>
</table>

<?php include 'rodape.php'; ?>
