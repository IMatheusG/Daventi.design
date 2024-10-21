<?php
    include('conexao.php');

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    
    if ($nome != null and $email != null and $senha != null){
        $data_cadastro = date('Y-m-d');
        
        $mysqli->query("INSERT INTO usuario (nome, email, senha, status, data_cadastro) VALUES ('$nome', '$email', '$senha', '1', '$data_cadastro')");
        header('Location: login.php?status=1');
        // echo $nome . ' ' . $email . ' ' . $senha;
    } else {
        header('Location: cadastro.php?status=0');
    }
 
?>