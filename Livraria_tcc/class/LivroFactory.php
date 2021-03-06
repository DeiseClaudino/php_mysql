<?php

class LivroFactory
{
    private $classes = array("Ebook", "LivroFisico");

    public function criaPor($tipoProduto, $params)
    {
        $nome = $params['nome'];
        $preco = $params['preco'];
        $descricao = $params['descricao'];

        $categoria = new Categoria();
        $categoria->setId($params['categoria_id']);

        if (in_array($tipoProduto, $this->classes)) {
            return new $tipoProduto($nome, $preco, $descricao, $categoria);
        }

        return new LivroFisico($nome, $preco, $descricao, $categoria);
    }
}
