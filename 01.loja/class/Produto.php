<?php
class Produto{
  public $id;
  public $nome;
  public $preco;
  public $descricao;
  public $categoria;
  public $usado;

  public function precoComDesconto() {
      $this->preco -= $this->preco * 0.1;
      return $this->preco;
  }


}
?>
