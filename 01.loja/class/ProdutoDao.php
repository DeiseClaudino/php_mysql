<?php
class ProdutoDao
{
    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    public function listaProdutos()
    {
        $produtos = array();

        $resultado = $this->conexao->query(
          'SELECT p.*, c.nome AS categoria_nome FROM produtos AS p JOIN categorias AS c ON c.id = p.categoria_id',
          PDO::FETCH_ASSOC
        );


        foreach ($resultado as $linha) {
          $categoria = new Categoria();
          $categoria->setId($linha['categoria_id']);
          $categoria->setNome($linha['categoria_nome']);

          $produto_id = $linha['id'];
          $nome = $linha['nome'];
          $preco = $linha['preco'];
          $descricao = $linha['descricao'];
          $usado = $linha['usado'];
          $isbn = $linha['isbn'];
          $tipoProduto = $linha['tipoProduto'];

          if ($tipoProduto == "Livro") {
              $produto = new Livro($nome, $preco, $descricao, $categoria, $usado);
              $produto->setIsbn($isbn);
          } else {
              $produto = new Produto($nome, $preco, $descricao, $categoria, $usado);
          }
          $produto->setId($produto_id);

          array_push($produtos, $produto);
        }

        return $produtos;
    }


    public function insereProduto(Produto $produto)
    {
        $isbn = "";
        if ($produto->temIsbn()) {
            $isbn = $produto->getIsbn();
        }
        $taxaImpressao = "";
        if ($produto->temTaxaImpressao()) {
            $taxaImpressao = $produto->getTaxaImpressao();
        }
        $waterMark = "";
        if ($produto->temWaterMark()) {
            $waterMark = $produto->getWaterMark();
        }


        $tipoProduto = get_class($produto);
        $query = "insert into produtos(nome,preco, descricao, categoria_id, usado, isbn, tipoProduto, taxaImpressao, WaterMark) values ('{$produto->getNome()}', {$produto->getPreco()}, '{$produto->getDescricao()}', {$produto->getCategoria()->getId()}, {$produto->getUsado()},  '{$isbn}', '{$tipoProduto}', '{$taxaImpressao}', '{$waterMark}')";
        $resultadoDaInsercao = mysqli_query($this->conexao, $query);
        return $resultadoDaInsercao;
    }

    public function removeProduto($id)
    {
        $query = "delete from produtos where id = {$id}";
        return mysqli_query($conexao, $query);
    }

    public function buscaProduto($id)
    {
        $query = "select * from produtos where id = {$id}";
        $resultado = mysqli_query($this->conexao, $query);
        $produto_buscado = mysqli_fetch_assoc($resultado);

        $categoria = new Categoria();
        $categoria_id = $produto_buscado['categoria_id'];

        $nome = $produto_buscado['nome'];
        $preco = $produto_buscado['preco'];
        $descricao = $produto_buscado['descricao'];
        $usado = $produto_buscado['usado'];

        $produto = new Produto($nome, $preco, $descricao, $categoria, $usado);
        $produto->setId($produto_buscado['id']);

        return $produto;
    }

    public function alteraProduto(Produto $produto)
    {
        $isbn = "";
        if ($produto->temIsbn()) {
            $isbn = $produto->getIsbn();
        }
        $query = "update produtos set nome = '{$produto->getNome()}',preco = {$produto->getPreco()}, descricao = '{$produto->getDescricao()}', categoria_id = {$produto->getCategoria()->getId()}, usado = {$produto->getUsado()} , isbn = '{$isbn}' tipoProduto = '{$tipoProduto}' where id = '{$produto->getId()}'";
        return mysqli_query($this->conexao, $query);
        var_dump($produto);
        die();
    }
    #Faz todas as operações entre o banco e a pagina
}
