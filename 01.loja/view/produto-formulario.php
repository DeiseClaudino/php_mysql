<?php
  require_once 'cabecalho.php';
  require_once '../controller/logica-usuario.php';


  verificaUsuario();

  $categoriaDao = new CategoriaDao($conexao);
  $categorias = $categoriaDao->listaCategorias();
  $categoria = new Categoria();
  $categoria->setId(1);
  $produto = new LivroFisico("", "", "", $categoria, "");
    ?>


  <h1>Formulário de cadastro</h1>
  <form action="../controller/adiciona-produto.php" method="post">
    <table class="table">
        <?php include 'produto-formulario-base.php'; ?>
        <tr><td><button class="btn btn-primary" type="submit">Cadastrar</button></td></tr>


    </table>
  </form>

<?php include 'rodape.php';?>
