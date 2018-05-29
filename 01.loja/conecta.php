<?php

$conn = new PDO(
    'mysql:host=localhost;dbname=Produtos', 'root', ''
);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


/*$conexao = mysqli_connect("localhost", "root", "", "Produtos");

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}*/
