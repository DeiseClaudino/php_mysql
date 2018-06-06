<?php

class CriadorDeProdutos{

  private $classes = array("Produto", "Ebook", "LivroFísico");

  public function criaPor($tipoProduto, $params)
  {
    $nome = $params['nome'];
    $preco = $params['preco'];
    $descricao = $params['descricao'];
    $categoria = new Categoria();
    $usado = $params['Usado'];

    if(in_array($tipoProduto, $this->classes)){
      return = new $tipoProduto($nome, $preco, $descricao, $categoria, $usado);
    }else {
      return = new Produto($nome, $preco, $descricao, $categoria, $usado);
    }

    }

}
