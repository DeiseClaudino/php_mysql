<?php include("conecta.php");
include("banco-usuario.php");

$usuario = buscaUsusario($conexao, $_POST["email"], $_POST["senha"]);
var_dump($usuario);
