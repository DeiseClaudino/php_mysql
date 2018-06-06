<?php

try {
  $conexao = new PDO('mysql:host=localhost;dbname=Produtos', 'root', '');
} catch (PDOException $e) {
  printf("Connect failed: %s\n", $e->getMessage());
}
