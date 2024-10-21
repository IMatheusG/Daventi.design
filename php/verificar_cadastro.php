<?php
    include('conexao.php');

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if ($nome != null and $email != null and $senha != null){
        $resultado = $mysqli->query("SELECT id_user, email FROM usuario WHERE email = '$email'");
        while ($linha = $resultado->fetch_assoc()){
            if ($linha['email'] == $email){
                $email_invalido = TRUE;
            }            
        }
        if ($email_invalido){
            //echo 'teste 2322';
            header('Location: cadastro.php?status=2');
        } else {
            $data_cadastro = date('Y-m-d');
            echo 'teste';
            $mysqli->query("INSERT INTO usuario (nome, email, senha, status, data_cadastro) VALUES ('$nome', '$email', '$senha', '1', '$data_cadastro')");
            //header('Location: login.php?status=1');
            // echo $nome . ' ' . $email . ' ' . $senha;
        }        
    } else {
        header('Location: cadastro.php?status=0');
    }
 
?>