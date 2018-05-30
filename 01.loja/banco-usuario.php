<?php
require_once("conecta.php");
function buscaUsusario($conexao, $email, $senha)
{
    $senhaMd5 = md5($senha);
    $email = $conexao->quote($email);
    var_dump($email);
    $query ="select * from usuarios where email = '{$email}' and senha = '{$senhaMd5}'";
    var_dump($query);
    $resultado = $conexao->query($query, PDO::FETCH_ASSOC);
    var_dump($resultado); die;
    //$email = mysqli_real_escape_string($conexao, $email);
    //$resultado = mysqli_query($conexao, $query);
    //$usuario = mysqli_fetch_assoc($resultado);

    return $resultado;
}
