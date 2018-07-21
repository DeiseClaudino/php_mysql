<?php

try {
  $conexao = new PDO('mysql:host=localhost;dbname=Livraria', 'root', '');
} catch (PDOException $e) {
  printf("Connect failed: %s\n", $e->getMessage());
}
