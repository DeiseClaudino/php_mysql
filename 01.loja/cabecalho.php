<?php
error_reporting(E_ALL ^ E_NOTICE);
include("mostra-alerta.php"); ?>
<html>
<head>
    <title>Minha loja</title>
    <meta charset="utf-8">
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/loja.css" rel="stylesheet" />
</head>
<body>
  <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
          <div class="navbar-header">
              <a href="index.php" class="navbar-brand">Minha Loja</a> //navbar-brand = marca
          </div>

             <div>
              <ul class="nav navbar-nav">
                   <li><a href="produto-formulario.php">Adiciona Produto</a></li>
                  <li><a href="sobre.php">Sobre</a></li>
                  <li><a href="produto-lista.php">Listagem de Produtos</a></li>
              </ul>
          </div>
      </div>
    </div>
    <div class="container">
        <div class="principal">
<?php mostraAlerta("danger");
mostraAlerta("success");
?>
