<?php
require_once 'cabecalho.php';
require_once '../controller/logica-usuario.php';

verificaUsuario();?>

<h1>Contato</h1>

<form action="../controller/envia-contato.php" method="post">
<table class="table table-striped">
  <tr>
    <td>Nome</td>
    <td><input type="text" name="nome" class="form-control"></td>
  </tr>

  <tr>
    <td>Email</td>
    <td><input type="email" name="email" class="form-control"></td>
  </tr>

  <tr>
    <td>Mensagem</td>
    <td><textarea name="mensagem" class="form-control"></textarea></td>
  </tr>
  <tr>
    <td><button type="submit" class="btn btn-primary">Enviar</button></td>
  </tr>
</table>
</form>

<?php require_once("rodape.php");  ?>
