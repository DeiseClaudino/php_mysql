<?php
require_once("conecta.php");
function buscaUsusario($conexao, $email, $senha)
{
    $senhaMd5 = md5($senha);


    $query ="select * from usuarios where email = '{$email}' and senha = '{$senhaMd5}'";

    $email = $pdo->quote($conexao, $email);

    $resultado = $pdo->query($conexao, $query);
    $usuario = $$resultado->fetchAll();
  //  $email = mysqli_real_escape_string($conexao, $email);
    //$resultado = mysqli_query($conexao, $query);
    //$usuario = mysqli_fetch_assoc($resultado);

  return $usuario;
}
