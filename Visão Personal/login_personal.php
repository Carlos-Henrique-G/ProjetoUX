<?php
    include('../banco/conexao_banco.php');

    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    
  

    $usuarioconectado = "select * from tbpersonal where email='$email'and senha_personal='$senha';";

    $consulta = $conexao->query($usuarioconectado);
        
    if($consulta->num_rows > 0) {
        $linha = $consulta->fetch_array(MYSQLI_ASSOC);
        session_start();
        $_SESSION['codpersonal'] = $linha['codpersonal'];
        $_SESSION['login']='ok';
        $_SESSION['nome'] = $linha['nome_personal'];
        header('Location: home_personal.php?login=ok');
    } else {
        header('Location: index.php?login=erro');
    }
?>