<h1>Lista de Produtos</h1>
<table class="table table-striped table-bordered">
    <tr>

<?php
require_once 'cabecalho.php';

$view = new ListView();


      $view->listaTabelaTh("Nome");
      $view->listaTabelaTh("Preço");
      $view->listaTabelaTh("Descrição");
      $view->listaTabelaTh("Categoria");
      $view->listaTabelaTh("ISBN");
      ?>
      <th colspan="2">Ações</th>
    </tr>
    <?php
    $livroDao = new LivroDao($conexao);
    $produtos = $livroDao->listaProdutos();
    foreach ($produtos as $produto) :
    ?>

        <tr>
          <?php
            $view->listaTabelaTd($produto->getNome());
            $view->listaTabelaTd($produto->getPreco());
            $view->listaTabelaTd(substr($produto->getDescricao(), 0, 40));
            $view->listaTabelaTd($produto->getCategoria()->getNome());
            ?>

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
                <form action="../controller/remove-produto.php" method="post">
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
