<?php
    include('../banco/conexao_banco.php');

    session_start();

    $dica = $_GET['dica'];

    
            $sql_deletar_dica = "delete from tbdicas
                              where coddica = $dica;";
           
            $excluirdica = $conexao->query($sql_deletar_dica);
          
            if($excluirdica == true) {
                header('Location: dicas.php?dicadeletada;');
            } else {
                header('Location: dicas.php?erroaodeletardica;');
            }
        
?>