<?php
require_once 'conecta.php';
function buscaUsuario($conexao, $email, $senha)
{
    $senhaMd5 = $conexao->quote(md5($senha));
    $email = $conexao->quote($email);


   $query ="SELECT * FROM usuarios WHERE email = {$email} and senha = {$senhaMd5}";
    $resultado = $conexao->query($query, PDO::FETCH_ASSOC);



    return $resultado->fetch();

}
    /* foreach ($resultado as $usuario) {
        $email = $resultado['email'];
        $senhaMd5 = $resultado['senha'];

        array_push($usuarios, $usuario );
    }*/

    //return $usuarios;
