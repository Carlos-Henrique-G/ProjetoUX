<?php
    include('conexao_banco.php');
    $nome = $_POST['nome_exercicio'];
    $repeticoes = $_POST['repeticoes'];
    $series = $_POST['series'];
    $intervalo = $_POST['intervalo'];
    $descricao = $_POST['descricao'];
    session_start();
    
    $codtreino = $_SESSION['id_temp2'];
    if(isset($_FILES['foto_exercicio'])){
        $nome_temporario=$_FILES["foto_exercicio"]["tmp_name"];
        $nome_real=$_FILES["foto_exercicio"]["name"];
        move_uploaded_file($nome_temporario,"assets/images/exercicios_fotos/".$nome_real);
    }
     
    
  
   
    $cadastrarex = "insert into tbexercicio values(null,'$codtreino','$repeticoes','$series','$nome_real','$descricao','$nome ','$intervalo')";
    $insert = $conexao->query($cadastrarex);

    
    if($insert==true){
        header('Location: lista_exercicios.php?insert=ok');
    }else{
        echo
        $nome,
        $repeticoes ,
        $series ,
        $intervalo ,
        $descricao ,
        $nome_real;
    }
    

?>