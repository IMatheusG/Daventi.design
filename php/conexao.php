<?php
    $host = 'localhost'; // nome do host padrão
    $user = 'root'; // usuário do banco
    $pass = ''; // senha do banco
    $bd = 'daventi_final'; // nome do banco

    $mysqli = new mysqli($host, $user, $pass, $bd); // ativando a conexão

    if ($mysqli->connect_error){ // verificando se tá funcionando a conexão
        echo 'Conection failed' . $mysqli->connect_error;
        exit();
    }
?>