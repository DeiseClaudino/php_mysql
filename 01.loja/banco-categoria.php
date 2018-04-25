<?php
require_once("class/Categoria.php");
require_once("conecta.php");

function listaCategorias($conexao) {

    $categorias = array();
    $query = "select * from categorias";
    $resultado = mysqli_query($conexao, $query);

    while ($categoria_array = mysqli_fetch_assoc($resultado)) {

        $categoria = new Categoria();
        $categoria->getId()= $categoria_array['id'];
        $categoria->getNome()= $categoria_array['nome'];

        array_push($categorias, $categoria);
    }

    return $categorias;
}
#método que lista categorias.
