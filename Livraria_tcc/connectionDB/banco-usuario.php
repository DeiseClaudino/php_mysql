<?php
require_once 'conecta.php';
function buscaUsuario($conexao, $email, $senha)
{
    $senhaMd5 = md5($senha);
    $email = $email;

    $query ="SELECT * FROM usuarios WHERE email = :email and senha = :senhaMd5";

    $stmt = $conexao->prepare($query);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':senhaMd5', $senhaMd5);
    $stmt->execute();
    return $stmt->fetch();
}
