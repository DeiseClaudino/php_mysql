<?php
require_once '../controller/mostra-alerta.php';
require_once '../connectionDB/conecta.php';
require_once '../class/bench-class.php';

function carregaClasse($nomeDaClasse)
{
    require_once("../class/".$nomeDaClasse.".php");
}
spl_autoload_register("carregaClasse");
  error_reporting(E_ALL);
?>
<html>
<head>
    <title>Minha Livraria</title>
    <meta charset="utf-8">
    <link href="../css/bootstrap.css" rel="stylesheet" />
    <link href="../css/loja.css" rel="stylesheet" />
</head>
<body>
  <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
          <div class="navbar-header">
              <a href="../view/index.php" class="navbar-brand">Minha Livraria</a>
          </div>

             <div>
              <ul class="nav navbar-nav">
                   <li><a href="../view/produto-formulario.php">Adicionar Novo</a></li>
                  <li><a href="../view/produto-lista.php">Meus Livros</a></li>
                  <li><a href="../view/contato.php">Contato</a></li>
              </ul>
          </div>
      </div>
    </div>
    <div class="container">
        <div class="principal">
            <?php mostraAlerta("danger");
            mostraAlerta("success");
            ?>
