<?php
class CategoriaDao
{
    private $conexao;
    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }
    function listaCategorias()
    {
        $categorias = array();
        //$query = "select * from categorias";
          $query= $this->conexao->query(
          "SELECT * FROM categorias",
          PDO::FETCH_ASSOC
        );
          $resultado = $this->conexao->quote($query);
          foreach ($query as $categorias) {

      //  while ($categoria_array = mysqli_fetch_assoc($resultado)) {
            $categoria = new Categoria();
            $categoria->setId($lista['id']);
            $categoria->setNome($lista['nome']);

            array_push($categorias, $categoria);
        }

        return $categorias;
    }
}
