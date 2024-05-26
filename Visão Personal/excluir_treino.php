<?php
    include('conexao_banco.php');

    session_start();

    $treinoid = $_GET['id'];

    $sql_deletar_treino = "delete from tbtreino
                              where codtreino = $treinoid;";
           
            $excluirtreino = $conexao->query($sql_deletar_treino);
          
            if($excluirtreino == true) {
                header('Location: treino_personal.php?treinodeletado;');
            } else {
                header('Location: treino_personal.php?erroaodeletartreino;');
            }
?>