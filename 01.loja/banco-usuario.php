<?php
require_once("conecta.php");
function buscaUsusario($conexao, $email, $senha)
{
    $senhaMd5 = $conexao->quote(md5($senha));
    $email = $conexao->quote($email);

    $query ="select * from usuarios where email = {$email} and senha = {$senhaMd5}";

    $resultado = $conexao->query($query, PDO::FETCH_ASSOC);
    if ($resultado) {
      return true;

    }


    return false;
}
