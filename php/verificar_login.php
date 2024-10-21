<?php
    include('conexao.php');

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    
    if ($email != null and $senha != null){
        $resultado = $mysqli->query("SELECT id_user, email, senha FROM usuario WHERE email = '$email'");
        while ($linha = $resultado->fetch_assoc()){
            if ($linha['email'] == $email){
                if ($linha['senha'] == $senha){
                    $logado_sucesso = TRUE;
                    break;
                }                
            }            
        }

        if ($logado_sucesso){
            // echo "Logado";
            header('Location: ../user_portfolio');
        } else {
            // echo 'QM É TU?';
            header('Location: login.php?status=0');
        }
    }
 
?>