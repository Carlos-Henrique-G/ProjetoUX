<?php
    include('conexao_banco.php');
    session_start();
    $nome_treino = strtoupper($_POST['nome_treino']);
    $codpersonal = $_SESSION['codpersonal'];
    
    $cadastrartreino = "INSERT INTO tbtreino (codpersonal, tipo_treino) VALUES ('$codpersonal', '$nome_treino')";
    $insert = $conexao->query($cadastrartreino);

    
        
    if($insert==true){
        header('Location: treino_personal.php?insert=ok');
    }else{
        echo $codpersonal;
        echo $nome_treino;
    }
    

?>