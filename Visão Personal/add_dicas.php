<?php
include('conexao_banco.php');
    session_start();
    $codusu = $_SESSION['id_temp'];
    $nova_dica = $_POST['dica'];

      
        $dica = "insert into tbdicas values(null,'$codusu','$nova_dica')";
        $insert_dica = $conexao->query($dica);
        if($insert_dica ==  true){
          header('location: dicas.php');
        }else{
          echo 'deu errado';
          
        }
          
  
  
  ?>