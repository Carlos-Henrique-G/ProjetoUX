<?php
    include('../banco/conexao_banco.php');

    session_start();

    $exercicioid = $_GET['id'];

    $sql_deletar_exercicio = "delete from tbexercicio
                              where codexercicio = $exercicioid;";
           
            $excluirexercicio = $conexao->query($sql_deletar_exercicio);
          
            if($excluirexercicio == true) {
                header('Location: lista_exercicios.php?id='.$_SESSION['id_temp2'].';');
            } else {
                header('Location: lista_exercicios.php?erroaodeletarexercicio.php;');
            }
?>