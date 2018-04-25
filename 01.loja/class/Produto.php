<?php
class Produto{
  private $id;
  private $nome;
  private $preco;
  private $descricao;
  private $categoria;
  private $usado;

  function precoComDesconto($valor = 0.1) {
      if ($valor > 0 && $valor <= 0.5) {

          $this->preco -= $this->preco * $valor;
      }
      return $this->preco;
  }

  public function getPreco() {
      return $this->private
  }
  public function setPreco($preco) {
      if ($preco > 0) {
          $this->preco = $preco;
      }
  }
}
?>
