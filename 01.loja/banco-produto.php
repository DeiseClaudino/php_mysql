<?php
require_once("conecta.php");
require_once("class/Produto.php");
require_once("class/Categoria.php");
function listaProdutos($conexao){
  $produtos = array();
  $resultado = mysqli_query($conexao, "select p.*,c.nome as categoria_nome from produtos as p join categorias as c on c.id = p.categoria_id");

  while($produto_array = mysqli_fetch_assoc($resultado)) {
    $produto = new Produto();
    $categoria = new Categoria();
    $categoria->getNome()= $produto_array['categoria_nome'];
    $produto->getId() = $produto_array['id'];
    $produto->getNome()= $produto_array['nome'];
    $produto->setPreco($produto_array['preco']);
    $produto->getDescricao() = $produto_array['descricao'];
    $produto->getCategoria() = $categoria;
    $produto->getUsado() = $produto_array['usado'];


      array_push($produtos, $produto);
  }
  return $produtos;
}


function insereProduto($conexao, Produto $produto) {
    $query = "insert into produtos(nome,preco, descricao, categoria_id, usado) values ('{$produto->getNome()}', {$produto->getPreco()}, '{$produto->getDescricao()}', {$produto->categoria->getId()}, {$produto->getUsado()})";
    $resultadoDaInsercao = mysqli_query($conexao, $query);
    return $resultadoDaInsercao;
}

function removeProduto($conexao,$id){
  $query = "delete from produtos where id = {$id}";
  return mysqli_query($conexao, $query);

}

function buscaProduto($conexao, $id){
  $query = "select * from produtos where id = {$id}";
  $resultado = mysqli_query($conexao, $query);
  $produto_buscado = mysqli_fetch_assoc($resultado);
  $categoria = new Categoria();
  $categoria->getId()= $produto_buscado['categoria_id'];

  $produto = new Produto();
  $produto->getId() = $produto_buscado['id'];
  $produto->getNome()= $produto_buscado['nome'];
  $produto->getDescricao() = $produto_buscado['descricao'];
  $produto->getCategoria()= $categoria;
  $produto->getPreco()= $produto_buscado['preco'];
  $produto->getUsado() = $produto_buscado['usado'];

return $produto;
}

function alteraProduto($conexao, Produto $produto) {
    $query = "update produtos set nome = '{$produto->getNome()}',preco = {$produto->getPreco()}, descricao = '{$produto->getDescricao()}', categoria_id = {$produto->categoria->getId()}, usado = {$produto->getUsado()} where id = '{$produto->getId()}'";
    return mysqli_query($conexao, $query);
    var_dump($produto);

}
#Faz todas as operações entre o banco e a pagina
?>
