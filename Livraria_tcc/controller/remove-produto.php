<?php
require_once '../view/cabecalho.php';
require_once 'logica-usuario.php';
$livroDao = new LivroDao($conexao);
$id = $_POST['id'];
$livroDao->removeProduto($id);
$_SESSION["success"] = "Produto removido com sucesso";
header("Location: ../view/produto-lista.php");
die();
