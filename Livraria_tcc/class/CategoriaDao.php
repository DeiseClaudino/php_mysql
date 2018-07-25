<?php
class CategoriaDao
{
    private $conexao;
    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }
    public function listaCategorias()
    {
        $categorias = array();

        $resultado= $this->conexao->query(
          "SELECT * FROM categorias",
          PDO::FETCH_ASSOC
        );

        foreach ($resultado as $linha) {
            $categoria = new Categoria();
            $categoria->setId($linha['id']);
            $categoria->setNome($linha['nome']);

            array_push($categorias, $categoria);
        }

        return $categorias;
    }
}
