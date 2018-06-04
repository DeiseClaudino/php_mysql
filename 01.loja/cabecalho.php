<?php
function carregaClasse($nomeDaClasse)
{
    require_once("class/".$nomeDaClasse.".php");
}

spl_autoload_register("carregaClasse");

require_once 'conecta.php';

  error_reporting(E_ALL);

  require_once 'mostra-alerta.php';
  //navbar-brand = marca
?>
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
              <a href="index.php" class="navbar-brand">Minha Loja</a>
          </div>

             <div>
              <ul class="nav navbar-nav">
                   <li><a href="produto-formulario.php">Adiciona Produto</a></li>
                  <li><a href="produto-lista.php">Listagem de Produtos</a></li>
                  <li><a href="contato.php">Contato</a></li>
              </ul>
          </div>
      </div>
    </div>
    <div class="container">
        <div class="principal">
<?php mostraAlerta("danger");
mostraAlerta("success");
?>
