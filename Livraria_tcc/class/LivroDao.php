<?php
class LivroDao
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
             'SELECT p.*, c.nome AS categoria_nome FROM livros AS p JOIN categorias AS c ON c.id = p.categoria_id',
             PDO::FETCH_ASSOC
           );
        foreach ($resultado as $linha) {
            $tipoLivro = $linha['tipoLivro'];
            $factory = new LivroFactory();
            $produto = $factory->criaPor($tipoLivro, $linha);
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

        $tipoLivro = get_class($produto);

        $categoriaId = $produto->getCategoria()->getId();


        $resultadoDaInsercao = "
                   INSERT INTO
                     livros(
                       nome,
                       preco,
                       descricao,
                       categoria_id,
                       isbn,
                       tipoLivro,
                       TaxaImpressao,
                       waterMark
                     ) VALUES (
                      :nome,
                      :preco,
                      :descricao,
                      :categoria_id,
                      :isbn,
                      :tipoLivro,
                      :TaxaImpressao,
                      :waterMark
                    )
                 ";


        $stmt = $this->conexao->prepare($resultadoDaInsercao);
        $stmt->bindValue(':nome', $produto->getNome());
        $stmt->bindValue(':preco', $produto->getPreco());
        $stmt->bindValue(':descricao', $produto->getDescricao());
        $stmt->bindValue(':categoria_id', $categoriaId);
        $stmt->bindValue(':isbn', $isbn);
        $stmt->bindValue(':tipoLivro', $tipoLivro);
        $stmt->bindValue(':TaxaImpressao', $taxaImpressao);
        $stmt->bindValue(':waterMark', $waterMark);
        $stmt->execute();


        return $resultadoDaInsercao;
    }

    public function removeProduto($id)
    {
        $query = "DELETE FROM livros WHERE id = :id";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }

    public function buscaProduto($id)
    {
        $lista =  "SELECT * FROM livros WHERE id = :id";
        $produto_buscado = $this->conexao->prepare($lista);
        $produto_buscado->bindValue(':id', $id);
        $produto_buscado->execute();

        foreach ($produto_buscado as $produto_buscado) {
            $tipoLivro = $produto_buscado['tipoLivro'];
            $factory = new LivroFactory();
            $produto = $factory->criaPor($tipoLivro, $produto_buscado);
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

        $tipoLivro = get_class($produto);

        $query = "UPDATE livros SET
        nome = :nome,
        preco = :preco,
        descricao = :descricao,
        categoria_id = :categoria_id,
        isbn = :isbn,
        tipoLivro = :tipoLivro
         WHERE id = :id";

        $stmt = $this->conexao->prepare($query);

        $stmt->bindValue(':nome', $produto->getNome());
        $stmt->bindValue(':preco', $produto->getPreco());
        $stmt->bindValue(':descricao', $produto->getDescricao());
        $stmt->bindValue(':categoria_id', $produto->getCategoria()->getId());
        $stmt->bindValue(':isbn', $isbn);
        $stmt->bindValue(':tipoLivro', $tipoLivro);
        $stmt->bindValue(':id', $produto->getId());
        return $stmt->execute();
    }
}
