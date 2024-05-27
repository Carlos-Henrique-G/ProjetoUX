<?php
    include('../banco/conexao_banco.php');

    session_start();

    $treinoid = $_GET['id'];

    $sql_deletar_treino = "DELETE FROM tbtreino
    WHERE codtreino = $treinoid";
    

$excluirtreino = $conexao->query($sql_deletar_treino);

            if($excluirtreino == true) {
                header('location: treino_personal.php?excluir=ok');
            } else {
                
            }
?>