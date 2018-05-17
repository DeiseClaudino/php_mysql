<?php require_once 'banco-usuario.php';
require_once 'logica-usuario.php';

$usuario = buscaUsusario($conexao, $_POST["email"], $_POST["senha"]);
var_dump($usuario);
if ($usuario == null) {
    $_SESSION["danger"] = "Usuário ou senha inválida";
    header("Location:index.php");
} else {
    logaUsuario($usuario["email"]);
    $_SESSION["success"] = "Usuário logado com sucesso!";
    header("Location:index.php");
}
