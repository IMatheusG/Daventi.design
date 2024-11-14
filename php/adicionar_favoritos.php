<?php 
    session_start();
    include('conexao.php');
    $dados = json_decode(file_get_contents('php://input'), true);

    $id_obra = $dados['id'];
    $mysqli->query("UPDATE obra set favoritos = favoritos + 1 WHERE id_obra = $id_obra;");
    
?>