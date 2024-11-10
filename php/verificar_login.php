<?php
    include('conexao.php');
    session_start();

    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $adm_logando = false;
    $conta_desativada = false;
    $logado_sucesso = false;

    if ($email != null && $senha != null){
        $resultado = $mysqli->query("SELECT * FROM usuario WHERE email = '$email'");

        while ($linha = $resultado->fetch_assoc()){
            if ($linha['email'] == $email){
                $_SESSION['email_user'] = $linha['email'];
                $_SESSION['id_user'] = $linha['id_user'];
                $_SESSION['nome_user'] = $linha['nome'];
                $_SESSION['imagem_perfil_user'] = $linha['imagem_perfil'];
                $_SESSION['status_user'] = $linha['status'];
                $_SESSION['favoritos_user']  = '';
                if ($_SESSION['status_user'] == 0){
                    $conta_desativada = true;
                    break;
                } 
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
        } else if($conta_desativada){
            header('Location: login.php?status=conta_desativada');
        }else {
            // echo 'QM É TU?';
            header('Location: login.php?status=2');
        }
    } else {
        header('Location: login.php?status=3');
    }
 
?>