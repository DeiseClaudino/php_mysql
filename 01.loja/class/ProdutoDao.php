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
            $tipoProduto = $linha['tipoProduto'];

            $factory = new ProdutoFactory();
            $produto = $factory->criaPor($tipoProduto, $linha);
            $produto->atualizaBaseadoEm($linha);
            $produto->setId($linha['id']);
            $produto->getCategoria()->setNome($linha['categoria_nome']);


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
        $resultadoDaInsercao = $this->conexao->query(
          "INSERT INTO produtos(nome,preco, descricao, categoria_id, usado, isbn, tipoProduto, taxaImpressao, WaterMark) VALUES ('{$produto->getNome()}', {$produto->getPreco()}, '{$produto->getDescricao()}', {$produto->getCategoria()->getId()}, {$produto->getUsado()},  '{$isbn}', '{$tipoProduto}', '{$taxaImpressao}', '{$waterMark}')",
          PDO::FETCH_ASSOC
        );
        //$query = "insert into produtos(nome,preco, descricao, categoria_id, usado, isbn, tipoProduto, taxaImpressao, WaterMark) values ('{$produto->getNome()}', {$produto->getPreco()}, '{$produto->getDescricao()}', {$produto->getCategoria()->getId()}, {$produto->getUsado()},  '{$isbn}', '{$tipoProduto}', '{$taxaImpressao}', '{$waterMark}')";
        //$resultadoDaInsercao = mysqli_query($this->conexao, $query);
        return $resultadoDaInsercao;
    }

    public function removeProduto($id)
    {
        $query = "delete from produtos where id = {$id}";
        return mysqli_query($conexao, $query);
    }

    public function buscaProduto($id)
    {
        $produto_buscado = $this->conexao->query(
        "select * from produtos where id = {$id}",
        PDO::FETCH_ASSOC
      );

        //$query = "select * from produtos where id = {$id}";
        $resultado = mysqli_query($this->conexao, $query);
      //  $produto_buscado = mysqli_fetch_assoc($resultado);

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
        $query = $this->conexao->query(
        "update produtos set nome = '{$produto->getNome()}',preco = {$produto->getPreco()}, descricao = '{$produto->getDescricao()}', categoria_id = {$produto->getCategoria()->getId()}, usado = {$produto->getUsado()} , isbn = '{$isbn}' tipoProduto = '{$tipoProduto}' where id = '{$produto->getId()}'",

        PDO::FETCH_ASSOC
      );

      //  $query = "update produtos set nome = '{$produto->getNome()}',preco = {$produto->getPreco()}, descricao = '{$produto->getDescricao()}', categoria_id = {$produto->getCategoria()->getId()}, usado = {$produto->getUsado()} , isbn = '{$isbn}' tipoProduto = '{$tipoProduto}' where id = '{$produto->getId()}'";
        return mysqli_query($this->conexao, $query);
        var_dump($produto);
        die();
    }
    #Faz todas as operações entre o banco e a pagina
}
