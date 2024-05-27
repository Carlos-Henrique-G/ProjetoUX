<?php
    include('../banco/conexao_banco.php');
    session_start();
    $nome = $_POST['nome_ex'];
    $series = $_POST['series'];
    $repeticoes = $_POST['repeticoes'];
    $intervalo = $_POST['intervalo'];
    $descricao = $_POST['descricao'];
    
    if(isset($_FILES['foto'])){
        $nome_temporario=$_FILES["foto"]["tmp_name"];
        $nome_real=$_FILES["foto"]["name"];
        move_uploaded_file($nome_temporario,".. /exercicios_fotos/".$nome_real);
    }
     
        
        $codtreino = $_GET['id'];

            
           

        $sql_update_ex = "UPDATE tbexercicio SET repeticoes = '$repeticoes', series = '$series', foto_exercicio = '$nome_real', descricao = '$descricao', intervalo = '$intervalo', nome_exercicio = '$nome' WHERE codtreino = '$codtreino'";
        $updateex = $conexao->query($sql_update_ex);
        
        if($updateex == true) {
            header('Location: lista_exercicios.php?id='.$codtreino);
        } else {
            header('Location: lista_exercicios.php?insert=falhaaoeditarexercicio');
        }
        
?>