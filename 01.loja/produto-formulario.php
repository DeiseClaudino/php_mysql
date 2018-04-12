<?php include("cabecalho.php"); ?>

<h1>Formulário de cadastro</h1>
<form action="adiciona-produto.php" method="post">
  <table class="table">
    <tr><td>Nome:</td> <td><input class="form-control" type="text" name="nome" /><br/></td></tr>

      <tr><td>Preço:</td>  <td><input class="form-control" type="number" name="preco" /><br/></td></tr>
      <tr>
        <td>descricao</td>
        <td><textarea name="descricao" class="form-control"></textarea></td>

      </tr>
      <tr><td><button class="btn btn-primary" type="submit">Cadastrar</button></td></tr>


</table>
</form>

<?php include("rodape.php"); #Fromulário para insercao de dados   ?>
