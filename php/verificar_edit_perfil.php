<?php
    include('conexao.php');

    session_start();

    $nome = $_POST['novo_nome'];
    $id_user = $_SESSION['id_user'];
    $status = $_POST['status_user'] ?? 1;
    // echo $status;
    echo $nome;
    if ($status == 1){
        if (isset($_FILES['nova_img'])){
            $arquivo = $_FILES['nova_img'];
            $tudo_certo = true;
            $deu_certo = enviarArquivo($arquivo['error'], $arquivo['size'], $arquivo['name'], $arquivo['tmp_name'], $id_user);
    
            // echo ' 123 : ' .$deu_certo;
    
            // var_dump($arquivo);
    
            // $tmp = $arquivo['tmp_name'];
            // header("Location adm_obras.php?status='$tmp'");
            
            if(!$deu_certo)
                $tudo_certo = false;
            
            // echo ' td ' .$tudo_certo;
    
        } 
    
        if ($nome != null){
            $sql_update = "UPDATE usuario SET nome = '$nome' WHERE id_user = '$id_user'";
            $_SESSION['nome_user'] = $nome;
            
            $mysqli->query($sql_update);
            header("Location: ./user_perfil.php?status=sucesso_edit");
        } 
    } else {
        
        $sql_inativar = "UPDATE usuario SET status = 0 WHERE id_user = '$id_user'";
        $_SESSION['status'] = 0;

        $resultado = $mysqli->query($sql_inativar);

        if($resultado){
            header("Location: ./login.php?status=user_inativado");
        }
    }

    function enviarArquivo($error, $size, $name, $tmp_name, $id){
        include('conexao.php');

        if ($error)
            header("Location: user_perfil.php?status=erro_enviar_arquivo");

        $pasta = '/arquivos'; // path
        $novo_nome_do_arquivo = uniqid(); // id único
        $extensao = strtolower(pathinfo($name, PATHINFO_EXTENSION)); // pegando a extensão

        // echo $extensao;

        if($extensao != 'jpg' && $extensao != 'png') 
            header("Location: user_perfil.php?status=erro_extensao");

        global $path;
        $path = '.' . $pasta . '/' . $novo_nome_do_arquivo . '.' . $extensao; // caminho completo do arquivo

        // echo 'path: ' . $tmp_name;

        $deu_certo = move_uploaded_file($tmp_name, $path);

        if ($deu_certo == 1){
            $mysqli->query("UPDATE usuario SET imagem_perfil = '$path' WHERE id_user = '$id'");
            $_SESSION['imagem_perfil_user'] = $path;
            return true;
        } else {
            return false;
        }        
    }

    
?>