<?php 
    include('conexao.php');

    $titulo = $_POST['titulo_obra'];
    $tipo = $_POST['tipo_obra'];
    $descricao = $_POST['descricao_edit'];
    $posicao = $_POST['posicao_obra'] ?? 'vertical';
    function enviarArquivoV2($error, $size, $name, $tmp_name){
        include('conexao.php');

        if ($error)
            header("Location: adm_obras.php?erro_enviar_arquivo");

        $pasta = '/arquivos'; // path
        $novo_nome_do_arquivo = uniqid(); // id único
        $extensao = strtolower(pathinfo($name, PATHINFO_EXTENSION)); // pegando a extensão

        // echo $extensao;

        if($extensao != 'jpg' && $extensao != 'png') 
            header("Location: adm_obras.php?erro_extensao");

        global $path;
        $path = '.' . $pasta . '/' . $novo_nome_do_arquivo . '.' . $extensao; // caminho completo do arquivo


        // echo 'path: ' . $tmp_name;

        $deu_certo = move_uploaded_file($tmp_name, $path);
        if ($deu_certo){
            return true;
        } else {
            return false;
        }
    }

    // upload de arquivo
    if (isset($_FILES['input_add_img_name'])){
        
        $arquivo = $_FILES['input_add_img_name'];
        $tudo_certo = true;
        $deu_certo = enviarArquivoV2($arquivo['error'], $arquivo['size'], $arquivo['name'], $arquivo['tmp_name']);
        
        if ($deu_certo){
            $sql_insert = "INSERT INTO obra (descricao, titulo, tipo, imagem, status, posicao)  VALUES ('$descricao', '$titulo', '$tipo', '$path', '1', '$posicao');";
            $resultado = $mysqli->query($sql_insert);
            if ($resultado){
                header('Location: ./adm_obras.php?status=sucesso_add');
            }            
        }
    }
?>
