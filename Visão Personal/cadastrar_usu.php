<?php
    include('conexao_banco.php');
    $nome = $_POST['nome_usu'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];
    $tipo_treino = $_POST['tipo_treino'];
    $dica = $_POST['dicas'];
    $foto = $_POST['foto'];

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
            $ddd = $array[0];
            $numero = ')'.$array[1];
        }
    }
  
    $select_treino = "select codtreino from tbtreino where '$tipo_treino' = tipo_treino ";

    $select = $conexao->query($select_treino);

    if($select->num_rows > 0) {
        $linha = $select->fetch_array(MYSQLI_ASSOC);
        $codtreino = $linha['codtreino'];
    }
    $cadastrarusu = "insert into tbusuario values(null,'$codtreino','$nome','$utilizador','$dominio','$senha','$foto','$dica')";
    $insert = $conexao->query($cadastrarusu);

    
        
    if($insert==true) {
        $select_usu = "select codusu from tbusuario where '$nome' = nome_usuario ";

        $select2 = $conexao->query($select_usu);
    
        if($select2->num_rows > 0) {
            $linha = $select2->fetch_array(MYSQLI_ASSOC);
            $codusu = $linha['codusu'];
        }
    
        
        $cadastrartel = "insert into tbtelefone values(null,'$codusu','$ddd','$numero')";
    
        
        $insert2 = $conexao->query($cadastrartel);   
        
    } 
    if($insert==true and $insert2 == true){
        header('Location: usuarios.php?insert=ok');
    }else{
        header('Location: add_usuarios.php?insert=error');
    }
    

?>