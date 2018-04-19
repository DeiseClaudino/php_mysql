<?php include("cabecalho.php"); ?>
<?php include("banco-produto.php"); ?>
<?php include("conecta.php");
include("logica-usuario.php");
$id = $_POST['id'];
removeProduto($conexao, $id);
$_SESSION["success"] = "Produto removido com sucesso";
header("Location: produto-lista.php");
die();
?>
