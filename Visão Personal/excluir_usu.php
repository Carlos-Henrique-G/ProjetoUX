<?php
    include('conexao_banco.php');

    session_start();

    $usuid = $_GET['id'];

    for($i = 0;$i < count($_SESSION['usu_id']); $i++) {
        if($_SESSION['usu_id'][$i] == $usuid) {
            $sql_deletar_num = "delete from tbtelefone
                              where codusu = $usuid;";
            $sql_deletar_usu = "delete from tbusuario
                              where codusu = $usuid;";
            $excluirtel = $conexao->query($sql_deletar_num);
            $excluirusu = $conexao->query($sql_deletar_usu);
            if($excluirtel == true and $excluirusu == true) {
                header('Location: usuarios.php?usuariodeletado;');
            } else {
                header('Location: usuarios.php?erroaodeletarusuario;');
            }
        }
    }
?>