<?php
class Produto{
  public $id;
  public $nome;
  private $preco;
  public $descricao;
  public $categoria;
  public $usado;

  function precoComDesconto($valor = 0.1) {
      if ($valor > 0 && $valor <= 0.5) {

          $this->preco -= $this->preco * $valor;
      }
      return $this->preco;
  }

  public function getPreco() {
      return $this->preco;

  }
  public function setPreco($preco) {
      if ($preco > 0) {
          $this->preco = $preco;
      }
  }
}
?>
