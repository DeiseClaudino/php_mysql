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
        $categoriaId = $produto->getCategoria()->getId();


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
                      :nome,
                      :preco,
                      :descricao,
                      :categoria_id,
                      :usado,
                      :isbn,
                      :tipoProduto,
                      :TaxaImpressao,
                      :waterMark
                    )
                 ";

        $stmt = $this->conexao->prepare($resultadoDaInsercao);
        $stmt->bindValue(':nome', $produto->getNome());
        $stmt->bindValue(':preco', $produto->getPreco());
        $stmt->bindValue(':descricao', $produto->getDescricao());
        $stmt->bindValue(':categoria_id', $categoriaId);
        $stmt->bindValue(':usado', $usado);
        $stmt->bindValue(':isbn', $isbn);
        $stmt->bindValue(':tipoProduto', $tipoProduto);
        $stmt->bindValue(':TaxaImpressao', $taxaImpressao);
        $stmt->bindValue(':waterMark', $waterMark);
        $stmt->execute();

        return $resultadoDaInsercao;
    }

    public function removeProduto($id)
    {
        $query = "DELETE FROM produtos WHERE id = :id";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }

    public function buscaProduto($id)
    {
        $lista =  "SELECT * FROM produtos WHERE id = {$id}";
        $produto_buscado = $this->conexao->query($lista, PDO::FETCH_ASSOC);


        foreach ($produto_buscado as $produto_buscado) {
            $tipoProduto = $produto_buscado['tipoProduto'];
            $factory = new ProdutoFactory();
            $produto = $factory->criaPor($tipoProduto, $produto_buscado);
            $produto->atualizaBaseadoEm($produto_buscado);
            $produto->setId($produto_buscado['id']);
        }

        return $produto;
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
        $usado = (int)$produto->getUsado();

        $query = "UPDATE produtos SET
        nome = :nome,
        preco = :preco,
        descricao = :descricao,
        categoria_id = :categoria_id,
        usado = :usado,
        isbn = :isbn,
        tipoProduto = :tipoProduto
         WHERE id = :id";

        $stmt = $this->conexao->prepare($query);

        $stmt->bindValue(':nome', $produto->getNome());
        $stmt->bindValue(':preco', $produto->getPreco());
        $stmt->bindValue(':descricao', $produto->getDescricao());
        $stmt->bindValue(':categoria_id', $produto->getCategoria()->getId());
        $stmt->bindValue(':usado', $usado);
        $stmt->bindValue(':isbn', $isbn);
        $stmt->bindValue(':tipoProduto', $tipoProduto);
        $stmt->bindValue(':id', $produto->getId());
        return $stmt->execute();
    }
}
