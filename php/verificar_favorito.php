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

    $fav_alterado = false;
    while ($favorito = $resultado_favorito->fetch_assoc()){ // desfavoritar
        if ($id_obra == $favorito['obra_id_favorito'] && $favorito['status'] == 1){
            // echo "aaa";
            // echo 'id: ', $favorito['id_favorito'];
            $id_favorito = $favorito['id_favorito'];
            // echo $id_favorito;
            $sql_desfavoritar = "UPDATE favorito SET status = 0 WHERE id_favorito = $id_favorito;";
            $mysqli->query($sql_desfavoritar);
            header("Location: ./user_portfolio.php?status=sucesso_desfavoritar");
            $fav_alterado = true;
        } else if ($id_obra == $favorito['obra_id_favorito'] && $favorito['status'] == 0) { // favoritar
            $id_favorito = $favorito['id_favorito'];
            $sql_favoritar = "UPDATE favorito SET status = 1 WHERE id_favorito = $id_favorito;";
            $mysqli->query($sql_favoritar);
            $fav_alterado = true;
            header("Location: ./user_portfolio.php?status=sucesso_favoritar");
        }
    }

    if ($fav_alterado == false){
        $sql_insert_fav = "INSERT INTO favorito (data_favorito, user_id_favorito, obra_id_favorito, status) values (CURDATE(), $id_user, $id_obra, 1);";
        
        $mysqli->query($sql_insert_fav);
        header("Location: ./user_portfolio.php?status=sucesso_favoritar");
    }

    
?>                                    