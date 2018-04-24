<tr><td>Nome:</td> <td><input class="form-control" type="text" name="nome" value="<?=$produto->nome?>" /><br/></td></tr>

  <tr><td>Preço:</td>  <td><input class="form-control" type="number" name="preco" value="<?=$produto->preco?>"/><br/></td></tr>
  <tr>
    <td>Descricao:</td>
    <td><textarea name="descricao" class="form-control"><?=$produto->descricao?></textarea></td>

  </tr>
  <tr>
    <td></td>
    <td>
      <input type="checkbox" name="usado" <?=$produto->usado?> value="true">Usado
    </td>
  </tr>
  <tr>
    <td>Categoria:</td>
    <td>
    <select name="categoria_id" class="form-control">
            <?php foreach($categorias as $categoria) :
                $essaEhACategoria = $produto->categoria->id == $categoria->id;
                $selecao = $essaEhACategoria ? "selected='selected'" : "";
                ?>
                <option value="<?=$categoria->id?>" <?=$selecao?>>
                        <?=$categoria->nome?>
                </option>
            <?php endforeach ?>
    </select>
    </td>
  </tr>
