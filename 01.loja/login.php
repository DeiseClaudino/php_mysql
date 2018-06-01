<?php require_once ("banco-usuario.php");
require_once ("logica-usuario.php");

$usuario = buscaUsusario($conexao, $_POST["email"], $_POST["senha"]);

if ($usuario == null) {
    $_SESSION["danger"] = "Usuário ou senha inválida";
    header("Location:index.php");

} else {
  logaUsuario($_POST["email"]);

    $_SESSION["success"] = "Usuário logado com sucesso!";
    header("Location:index.php");
}
