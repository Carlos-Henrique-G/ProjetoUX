<?php
    $hostname = "localhost";
    $user = "root";
    $password = "";
    $database = "db_ux_academia";

    $conexao = new mysqli($hostname,$user,$password,$database);

    if(mysqli_connect_errno()) trigger_error(mysqli_connect_error());
    echo mysqli_connect_error();
?>