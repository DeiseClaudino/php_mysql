<?php
  require_once("conecta.php");
function listaCategorias($conexao)
{

    $categorias = array();
    //$query = "select * from categorias";
    $resultado = mysqli_query($conexao, $query);

    $query= $this->conexao->query(
      "SELECT * FROM categorias",
      PDO::FETCH_ASSOC
    );
      foreach ($query as $categorias) {

  //  while ($categoria_array = mysqli_fetch_assoc($resultado)) {
        $categoria = new Categoria();
        $categoria->setId($lista['id']);
        $categoria->setNome($lista['nome']);

        array_push($categorias, $categoria);
    }

    return $categorias;
}
#método que lista categorias.
