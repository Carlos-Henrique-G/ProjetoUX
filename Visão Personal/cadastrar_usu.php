<?php
    include('conexao_banco.php');
    $nome = $_POST['nome_usu'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];
    $tipo_treino = $_POST['tipo_treino'];
    $dica = $_POST['dicas'];
    
     
    for($i = 0;$i < strlen($email); $i++) {
        $char = $email[$i];
        if($char == "@") {
            $array = explode("@",$email);
            $utilizador = $array[0];
            $dominio = "@" . $array[1];
        }
    }for($i = 0;$i < strlen($telefone); $i++) {
        $char = $telefone[$i];
        if($char == " ") {
            $array = explode(" ",$telefone);
            $ddd = $array[0];
            $numero = $array[1];
        }
    }
  

    $cadastrarusu = "insert into tbusuario values(null,'','$nome','$utilizador','$dominio','$senha','','$dica')";
    $cadastrartel = "insert into tbtelefone values(null,'$ddd','$numero')";

    $insert = $conexao->query($cadastrarusu);
    $insert2 = $conexao->query($cadastrartel);
        
    if($insert==true and $insert2 == true) {
        
        header('Location: usuarios.php?insert=ok');
    } else {
        header('Location: add_usuarios.php?insert=erro');
    }
?>