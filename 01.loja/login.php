<?php include("conecta.php");
include("banco-usuario.php");

$usuario = buscaUsusario($conexao, $_POST["email"], $_POST["senha"]);
var_dump($usuario);
if($usuario == null){
  header("Location:index.php?login=0");
}else {
  header("Location:index.php?login=1");
}
