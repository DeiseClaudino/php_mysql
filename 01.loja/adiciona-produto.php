<?php include("cabecalho.php"); ?>
<?php include("banco-produto.php"); ?>
<?php include("conecta.php");

$nome = $_POST["nome"];
$preco = $_POST["preco"];
$descricao = $_POST["descricao"];
$categoria_id = $_POST["categoria_id"];

if (insereProduto($conexao, $nome, $preco, $descricao, $categoria_id)) { ?>
  <p class="text-success">
      Produto <?= $nome; ?>, <?= $preco; ?> adicionado com sucesso!
  </p>

 <?php
    } else {
        $msg = mysqli_error($conexao);
       ?>

   <p class="text-danger">
       Produto <?= $nome ?>  não adicionado! <?= $msg?>
   </p>
<?php

}
#faz a inserção dos dados no banco.
 ?>

<?php include("rodape.php"); ?>
