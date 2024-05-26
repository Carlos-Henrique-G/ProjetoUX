<?php
    include('conexao_banco.php');
    session_start();
    $nome = $_POST['nome_usu'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];
    $tipo_treino = $_POST['tipo_treino'];
    $codusu= $_SESSION['id_temp'];
    if(isset($_FILES['foto'])){
        $nome_temporario=$_FILES["foto"]["tmp_name"];
        $nome_real=$_FILES["foto"]["name"];
        move_uploaded_file($nome_temporario,"assets/images/usuarios_fotos/".$nome_real);
    }
     
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
            $array = explode(")",$telefone);
            $ddd = $array[0].')';
            $numero = $array[1];
        }
    }
    $select_treino = "select codtreino from tbtreino where '$tipo_treino' = tipo_treino ";

    $select = $conexao->query($select_treino);

    if($select->num_rows > 0) {
        $linha = $select->fetch_array(MYSQLI_ASSOC);
        $codtreino = $linha['codtreino'];
    }
            
           

    $sql_update_usu = "UPDATE tbusuario SET codtreino = '$codtreino', nome_usuario = '$nome', utilizador = '$utilizador', dominio = '$dominio', senha_usuario = '$senha', foto_usuario = '$nome_real' WHERE codusu = '$codusu'";
    $sql_update_tel = "UPDATE tbtelefone SET ddd = '$ddd', numero = '$numero' WHERE codusu = '$codusu'";
            
           
            $updateusu = $conexao->query($sql_update_usu);
            $updatetel = $conexao->query($sql_update_tel);
          
          
            if($updateusu == true and $updatetel == true) {
                header('Location: usuarios.php?usuarioeditado;');
            } else {
                echo $nome;
                


            }
        
?>