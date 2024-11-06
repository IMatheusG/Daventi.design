<?php
    include('conexao.php');

    function enviarArquivo($error, $size, $name, $tmp_name, $id_obra){
        include('conexao.php');

        if ($error)
            header("Location: adm_obras.php?status=erro_enviar_arquivo");

        $pasta = '/arquivos'; // path
        $novo_nome_do_arquivo = uniqid(); // id único
        $extensao = strtolower(pathinfo($name, PATHINFO_EXTENSION)); // pegando a extensão

        // echo $extensao;

        if($extensao != 'jpg' && $extensao != 'png') 
            header("Location: adm_obras.php?status=erro_extensao");

        global $path;
        $path = '.' . $pasta . '/' . $novo_nome_do_arquivo . '.' . $extensao; // caminho completo do arquivo

        // echo 'path: ' . $tmp_name;

        $deu_certo = move_uploaded_file($tmp_name, $path);

        if ($deu_certo == 1){
            $mysqli->query("UPDATE obra SET imagem = '$path' WHERE id_obra = '$id_obra'");
            return true;
        } else {
            return false;
        }
    }

    $id_obra = $_POST['id_obra_input'];
    $titulo = $_POST['titulo_obra'];
    $tipo = $_POST['tipo_obra'];
    $descricao = $_POST['descricao_edit'];
    $posicao = $_POST['posicao_obra'] ?? 'vertical';    
    $status = $_POST['status_obra'];
    $status_reativar = $_POST['status_obra_reativar'];
    $salvar_dados = $_POST['salvar_dados'];

    $edit = false;
    // $imagem = $_POST['imagem_obra'];
    // echo $id_obra . ' - ' . $titulo . ' - ' . $tipo . ' - ' . $descricao . ' - '   . $posicao;
 
     // upload de arquivo
    if (isset($_FILES['input_edit_img_name'])){
        $arquivo = $_FILES['input_edit_img_name'];
        $tudo_certo = true;
        $deu_certo = enviarArquivo($arquivo['error'], $arquivo['size'], $arquivo['name'], $arquivo['tmp_name'], $id_obra);

        // echo ' 123 : ' .$deu_certo;

        var_dump($arquivo);

        // $tmp = $arquivo['tmp_name'];
        // header("Location adm_obras.php?status='$tmp'");
        
        if(!$deu_certo)
            $tudo_certo = false;
        
        // echo ' td ' .$tudo_certo;

        if ($tudo_certo)
            header("Location: adm_obras.php?status=sucesso_envio");
        else
            header("Location: adm_obras.php?status=erro_envio");
    } 

    // echo 'status: ' . $status . '<br>' . 'Reativar: ' . $status_reativar;

    if ($salvar_dados == '1'){ // update sql
        $sql_update = "UPDATE obra SET descricao = '$descricao', titulo = '$titulo', tipo = '$tipo', posicao = '$posicao' WHERE id_obra = '$id_obra';";

        $resultado_update = $mysqli->query($sql_update);

        if ($resultado_update){
            $edit = true;
            header("Location: adm_obras.php?status=sucesso");
        } else {
            header("Location: adm_obras.php?status='$mysqli->error'");
        }
    }

    if ($status == '0' && $status_reativar == '1'){ // reativar sql
        $sql_reativar = "UPDATE obra SET status = '$status_reativar' WHERE id_obra = '$id_obra';";

        $resultado_reativar = $mysqli->query($sql_reativar);
        if ($resultado_reativar){
            header("Location: adm_obras.php?status=sucesso_reativar");    
        } else {
            header("Location: adm_obras.php?status='$mysqli->error'");    
        }
    } else if ($status == '0' && $status_reativar != '1' && $edit == false){ // inativar sql
        $sql_inativar = "UPDATE obra SET status = '$status' WHERE id_obra = '$id_obra';";

        $resultado_inativar = $mysqli->query($sql_inativar);
        if ($resultado_inativar){
            header("Location: adm_obras.php?status=sucesso_inativar");    
        } else {
            header("Location: adm_obras.php?status='$mysqli->error'");    
        }
    }
    
    
        
?>