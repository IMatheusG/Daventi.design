<?php                        
    session_start();
    include('conexao.php');
    $src = $_POST['src_icon'];
    $id_obra = $_POST['fav_id_obra'];
    $id_user = $_SESSION['id_user'];

    $sql_consulta_favorito = "SELECT * FROM favorito;";
    $resultado_favorito = $mysqli->query($sql_consulta_favorito);

    // echo 'user: ', $id_user, '<br>';
    // echo 'obra: ', $id_obra;

    while ($favorito = $resultado_favorito->fetch_assoc()){ // desfavoritar
        if ($id_obra == $favorito['obra_id_favorito'] && $favorito['status'] == 1){
            // echo "aaa";
            // echo 'id: ', $favorito['id_favorito'];
            $id_favorito = $favorito['id_favorito'];
            // echo $id_favorito;
            $sql_desfavoritar = "UPDATE favorito SET status = 0 WHERE id_favorito = $id_favorito;";
            $resultado_query = $mysqli->query($sql_desfavoritar);
            if ($resultado_query){
                header("Location: ./user_perfil.php?status=sucesso_desfavoritar");
            }
        } 
    }    
?>                                    