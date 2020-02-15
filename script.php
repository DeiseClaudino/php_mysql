<?php

try 
{

  $conexao = new PDO('mysql:host=localhost;dbname=Livraria_Tcc', 'root', '');
} catch (PDOException $e) 
{
  printf("Connect failed: %s\n", $e->getMessage());
}

if(function_exists($_GET['f'])) 
{
    $_GET['f']($conexao);
}

function script($conexao)
{
    $query = "
        SELECT * FROM 
        livros 
        WHERE tipoLivro = 'LivroFisico';
    ";

    // $query = "
    // SELECT * FROM jog_tb_jogo 
    // where id_vencedor is null 
    // and dt_finalizacao is null 
    // and YEAR(dt_criacao) = 2020 
    // and(
    // ic_abandono1 = 1 or 
    // ic_abandono2 = 1 or
    // ic_abandono3 = 1 or 
    // ic_abandono4 = 1 or
    // ic_abandono5 = 1 or
    // ic_abandono6 = 1 
    // );
    // ";

    $stmt = $conexao->prepare($query);
    $stmt->execute();
    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($resultado as $i => $r) 
    {
        print_r($r);

        // $proc = $conexao->prepare("CALL jog_p_EncerrarJogo(?)");
        // $proc->execute();
        // print $proc;
        
        if ($i > 0 && $i % 10 == 0) 
        {
            sleep(5);
        }
    }
    // print_r($resultado);
    // $proc = $conexao->prepare("CALL jog_p_EncerrarJogo(?)");
    // $proc->execute();
    // print $proc;


}