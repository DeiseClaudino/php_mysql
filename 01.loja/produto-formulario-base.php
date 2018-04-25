<tr>
    <td>Nome</td>
    <td>
        <input class="form-control" type="text" name="nome"
            value="<?=$produto->getNome()?>">
    </td>
</tr>
<tr>
    <td>Preço</td>
    <td>
        <input  class="form-control" type="number" step="0.01" name="preco"
            value="<?=$produto->getPreco()?>">
    </td>
</tr>
<tr>
    <td>Descrição</td>
    <td>
        <textarea class="form-control" name="descricao"><?=$produto->getDescricao()?></textarea>
    </td>
</tr>

<?php
  $usado = $produto->getUsado ? "checked='checked'" : "";
?>

<tr>
    <td></td>
    <td><input type="checkbox" name="usado" <?=$usado?> value="true"> Usado
</tr>
<tr>
    <td>Categoria</td>
    <td>
        <select name="categoria_id" class="form-control">
            <?php
            foreach($categorias as $categoria) :
                $essaEhACategoria = $produto->categoria->getId()== $categoria->id;
                $selecao = $essaEhACategoria ? "selected='selected'" : "";
            ?>
                <option value="<?=$categoria->id?>" <?=$selecao?>>
                    <?=$categoria->nome?>
                </option>
            <?php endforeach ?>
        </select>
    </td>
</tr>
