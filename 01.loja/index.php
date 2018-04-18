<?php include("cabecalho.php"); ?>
<?php if (isset($_GET["login"]) && $_GET["login"]==true) { ?>
  <p class="alert-success">Logado com Sucesso!</p>
<?php } ?>
<?php if (isset($_GET["login"]) && $_GET["login"]==false) { ?>
  <p class="alert-danger">Usuário ou senha Inválida!</p>
<?php } ?>
            <h1>Bem vindo!</h1>
<?php
if(isset($_COOKIE["usuario_logado"])) {
?>
  <p class="text-success">Você está logado como <?= $_COOKIE["usuario_logado"] ?></p>
  <?php
  } else {
  ?>
    <h2>Login</h2>
  <form action="login.php" method="post">
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
  <?php
  }
?>

<?php include("rodape.php"); ?>
