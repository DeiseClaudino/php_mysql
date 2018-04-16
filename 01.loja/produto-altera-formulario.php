<?php include("cabecalho.php");
include("conecta.php");
include("banco-categoria.php");
include("banco-produto.php");
$id =$_GET['id'];
$produto = buscaProduto($conexao, $id);
$categorias = listaCategorias($conexao);

  ##cadastro para alteação dos produtos já existentes
?>

<h1>Alterando Produto</h1>
<form action="altera-produto.php" method="post">
  <table class="table">
    <tr><td>Nome:</td> <td><input class="form-control" type="text" name="nome" value="<?=$produto['nome']?>" /><br/></td></tr>

      <tr><td>Preço:</td>  <td><input class="form-control" type="number" name="preco" value="<?=$produto['preco']?>"/><br/></td></tr>
      <tr>
        <td>Descricao:</td>
        <td><textarea name="descricao" class="form-control"><?=$produto['descricao']?></textarea></td>

      </tr>
      <tr>
        <td></td>
        <td>
          <input type="checkbox" name="usado" value="true">Usado
        </td>
      </tr>
      <tr>
        <td>Categoria:</td>
        <td>
          <select  name="categoria_id" class="form-control">
          <?php foreach ($categorias as $categoria): ?>
            <option value="<?=$categoria['id']?>">
                <?=$categoria['nome']?></br>
            </option>

          <?php endforeach?>
        </select>
        </td>
      </tr>
      <tr><td><button class="btn btn-primary" type="submit">Alterar</button></td></tr>


</table>
</form>

<?php include("rodape.php"); #Fromulário para insercao de dados   ?>
