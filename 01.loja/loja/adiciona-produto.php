<?php include("cabecalho.php"); ?>
<?php include("banco-produto.php"); ?>
<?php include("conecta.php");


$nome = $_GET["nome"];
$preco = $_GET["preco"];

$query = "insert into produtos(nome,preco) values ('{$nome}', {$preco})";
if (insereProduto($conexao, $nome, $preco)) { ?>
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

 ?>

<?php include("rodape.php"); ?>
