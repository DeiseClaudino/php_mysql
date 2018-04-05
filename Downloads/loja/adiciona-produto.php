<?php include("cabecalho.php"); ?>

<?php

$nome = $_GET["nome"];
$preco = $_GET["preco"];
$conexao = mysqli_connect('localhost', 'root', '', 'Produtos');
$query = "insert into produtos(nome,preco) values ('{$nome}', {$preco})";
if (mysqli_query($conexao, $query)) { ?>
  <p class="alert-success">
      Produto <?= $nome; ?>, <?= $preco; ?> adicionado com sucesso!
  </p>

 <?php
    } else {  ?>
   <p class="alert-danger">
       Produto <?= $nome ?>  não adicionado!
   </p>
<?php
}

mysqli_close($conexao);
 ?>

<?php include("rodape.php"); ?>
