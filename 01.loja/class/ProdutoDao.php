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

        $usado = (int)$produto->getUsado();

        $resultadoDaInsercao = "
          INSERT INTO
            produtos(
              nome,
              preco,
              descricao,
              categoria_id,
              usado,
              isbn,
              tipoProduto,
              TaxaImpressao,
              waterMark
            ) VALUES (
              {$this->conexao->quote($produto->getNome())},
              {$this->conexao->quote($produto->getPreco())},
              {$this->conexao->quote($produto->getDescricao())},
              {$this->conexao->quote($produto->getCategoria()->getId())},
              {$usado},
              {$this->conexao->quote($isbn)},
              {$this->conexao->quote($tipoProduto)},
              {$this->conexao->quote($taxaImpressao)},
              {$this->conexao->quote($waterMark)}
            )
        ";

        if (false === $this->conexao->exec($resultadoDaInsercao)) {
            printf(
            'PDO::errorInfo(): %s (SQL: %s)',
            print_r($this->conexao->errorInfo(), true),
            $resultadoDaInsercao
          );
        }

        return $resultadoDaInsercao;
    }

    public function removeProduto($id)
    {
        return $query = $this->conexao->query(
        "DELETE FROM produtos WHERE id = {$id}"
      );
    }

    public function buscaProduto($id)
    {
        $produto_buscado =  "SELECT * FROM produtos WHERE id = {$id}";
        $resultado = $this->conexao->query($produto_buscado, PDO::FETCH_ASSOC);
        $lista = $resultado->fetchAll();
        foreach ($lista as $produto) {


        $tipoProduto = $produto_buscado['tipoProduto'];
        $produto_id = $produto_buscado['id'];
        $categoria_id = $produto_buscado['categoria_id'];

        $factory = new ProdutoFactory();
        $produto = $factory->criaPor($tipoProduto, $produto_buscado);
        $produto->atualizaBaseadoEm($produto_buscado);

        $produto->setId($produto_id);
        $produto->getCategoria()->setId($categoria_id);

        return $produto;
      }
    }

    public function alteraProduto(Produto $produto)
    {
        $isbn = "";
        if ($produto->temIsbn()) {
            $isbn = $produto->getIsbn();
        }

        $waterMark = "";
        if ($produto->temWaterMark()) {
            $waterMark = $produto->getWaterMark();
        }

        $taxaImpressao = "";
        if ($produto->temTaxaImpressao()) {
            $taxaImpressao = $produto->getTaxaImpressao();
        }

        $tipoProduto = get_class($produto);

        return $query = $this->conexao->exec(
        "UPDATE produtos SET
        nome = '{$produto->getNome()}',
        preco = {$produto->getPreco()},
        descricao = '{$produto->getDescricao()}',
        categoria_id = {$produto->getCategoria()->getId()},
        usado = {$produto->getUsado()} ,
        isbn = '{$isbn}',
        tipoProduto = '{$tipoProduto}'
        WHERE id = '{$produto->getId()}'"
        );
    }
}
