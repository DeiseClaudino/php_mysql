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
        $resultado = mysqli_query($this->conexao, "select p.*,c.nome as categoria_nome from produtos as p join categorias as c on c.id = p.categoria_id");
        while ($produto_array = mysqli_fetch_assoc($resultado)) {
            $categoria = new Categoria();
            $categoria->setNome($produto_array['categoria_nome']);

            $nome = $produto_array['nome'];
            $preco = $produto_array['preco'];
            $descricao = $produto_array['descricao'];
            $usado = $produto_array['usado'];
            $produto = new Produto($nome, $preco, $descricao, $categoria, $usado);
            $produto->setId($produto_array['id']);
            /*$id = $produto_array['id'];*/
            array_push($produtos, $produto);
        }
        return $produtos;
    }


    public function insereProduto(Produto $produto)
    {
        $query = "insert into produtos(nome,preco, descricao, categoria_id, usado) values ('{$produto->getNome()}', {$produto->getPreco()}, '{$produto->getDescricao()}', {$produto->getCategoria()->getId()}, {$produto->getUsado()})";
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
        $query = "update produtos set nome = '{$produto->getNome()}',preco = {$produto->getPreco()}, descricao = '{$produto->getDescricao()}', categoria_id = {$produto->getCategoria()->getId()}, usado = {$produto->getUsado()} where id = '{$produto->getId()}'";
        return mysqli_query($this->conexao, $query);
        var_dump($produto);
        die();
    }
    #Faz todas as operações entre o banco e a pagina
}
