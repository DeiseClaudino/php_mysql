<tr>
<?php

$view = new ListView();


  $view->listaTabelaTd("Nome"); ?>
<td>

        <input class="form-control" type="text" name="nome"
            value="<?=$produto->getNome()?>">
</td>
</tr>
<tr>
  <?php
  $view->listaTabelaTd("Preço");
  ?>

<td>
        <input  class="form-control" type="number" step="0.01" name="preco"
            value="<?=$produto->getPreco()?>">
</td>
</tr>
<tr>
  <?php $view->listaTabelaTd("Descrição");  ?>

<td>
        <textarea class="form-control" name="descricao"><?=$produto->getDescricao()?></textarea>
</td>
</tr>

<?php
  $usado = $produto->getUsado() ? "checked='checked'" : "";
?>

<tr>
<td>
  <input type="checkbox" name="usado" <?=$usado?> value="true"> usado
</td>
</tr>
<tr>
  <?php
  $view->listaTabelaTd("Categoria"); ?>

<td>
      <select name="categoria_id" class="form-control">
  			<?php
            foreach ($categorias as $categoria) :

                $essaEhACategoria = $produto->getCategoria()->getId() == $categoria->getId();

                $selecao = $essaEhACategoria ? "selected='selected'" : "";
            ?>
  				<option value="<?=$categoria->getId()?>" <?=$selecao?>>
  					<?=$categoria->getNome()?>
  				</option>
  			<?php
            endforeach
            ?>
  		</select>
</td>
</tr>
<tr>
  <?php
  $view->listaTabelaTd("Tipo do produto");
   ?>

<td>
        <select name="tipoProduto" class="form-control">
          <optgroup label="Livros">
            <?php
            $tipos = array("Livro Fisico", "Ebook");
            foreach ($tipos as $tipo) :
              $tipoSemEspaco = str_replace(" ", "", $tipo);
                $esseEhOTipo = get_class($produto) == $tipoSemEspaco;
                $selecao = $esseEhOTipo ? "selected='selected'" : "";
            ?>
                <option value="<?=$tipoSemEspaco?>" <?=$selecao?>>
                    <?=$tipo?>
                </option>

            <?php
            endforeach
            ?>
          </optgroup>

        </select>
</td>
</tr>
<?php
  $view->listaTabelaTd("ISBN (caso seja um Livro)");  ?>
<td>
        <input type="text" name="isbn" class="form-control"
                    value="<?php if ($produto->temIsbn()) {
                echo $produto->getIsbn();
            };?>" >
</td>
</tr>
<tr>
  <?php
  $view->listaTabelaTd("Taxa de Impressão (caso seja um Livro Físico)");
  ?>

<td>
  <input type="text" class="form-control" name="taxaImpressao" value="<?php if ($produto->temTaxaImpressao()) {;
                echo $produto->getTaxaImpressao();
            } ?>">
</td>

</tr>
<tr>
  <?php
$view->listaTabelaTd("WaterMark (caso seja um Ebook)");
?>

<td>
   <input type="text" class="form-control" name="WaterMark" value="<?php if ($produto->temWaterMark()) {;
                echo $produto->getWaterMark();
            } ?>">
</td>
</tr>
