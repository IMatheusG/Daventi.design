<?php
    include('conexao.php');

    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $adm_logando = false;
    
    if ($email != null && $senha != null){
        $resultado = $mysqli->query("SELECT id_user, email, senha, flag_adm FROM usuario WHERE email = '$email'");
        
        while ($linha = $resultado->fetch_assoc()){
            if ($linha['email'] == $email){
                if ($linha['senha'] == $senha){
                    $logado_sucesso = TRUE;
                    if($linha['flag_adm'] == 1){
                        $adm_logando = true;
                    }
                    break;
                }                
            }            
        }
        

        if ($logado_sucesso && $adm_logando){
            // echo "Logado";
            header('Location: ./adm_obras.php');
        } else if($logado_sucesso && $adm_logando == false){
            header('Location: ../user_home.html');
        } else {
            // echo 'QM É TU?';
            header('Location: login.php?status=2');
        }
    } else {
        header('Location: login.php?status=3');
    }
 
?>