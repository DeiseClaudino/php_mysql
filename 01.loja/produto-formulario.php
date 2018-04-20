<?php include("cabecalho.php");
include("conecta.php");
include("banco-categoria.php");
include("logica-usuario.php");
verificaUsuario();

  $categorias = listaCategorias($conexao);
  $produto = array("nome" => "", "descricao" => "", "preco"  => "", "categoria_id"  => "1");
  $usado = "";
?>

<h1>Formulário de cadastro</h1>
<form action="adiciona-produto.php" method="post">
  <table class="table">
      <?php include("produto-formulario-base.php"); ?>
      <tr><td><button class="btn btn-primary" type="submit">Cadastrar</button></td></tr>


</table>
</form>

<?php include("rodape.php"); #Fromulário para insercao de dados   ?>
