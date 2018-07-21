<?php

require_once 'cabecalho.php';
require_once '../controller/logica-usuario.php';

?>
  <h1>Bem vindo!</h1>
<?php

if (usuarioEstaLogado()) {

?>

  <p class="text-success">
    Você está logado como <?= usuarioLogado() ?> <a href="../controller/logout.php">Deslogar</a>
  </p>
<?php
} else {
?>
  <h2>Login</h2>
  <form action="../controller/login.php" method="post">
    <table class="table">
      <tr>
        <td>Email</td>
        <td><input type="email" name="email" class="form-control"></td>
      </tr>
      <tr>
        <td>Senha</td>
        <td><input type="password" name="senha" class="form-control"></td>
      </tr>
      <tr>
        <td><button class="btn btn-primary">Login</button></td>
      </tr>
    </table>
  </form>


  <p><cite>"Pouco conhecimento faz com que as pessoas se sintam orgulhosas.
    Muito conhecimento, que se sintam humildes."</cite> Leonardo da Vinci</p>
<?php
}

require_once 'rodape.php';
?>
