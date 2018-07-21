<?php
require_once 'logica-usuario.php';
logout();
$_SESSION["success"] = "Deslogado com sucesso!";
header("location: ../view/index.php?logout=true");
die();
