<?php
    include('../banco/conexao_banco.php');

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    for($i = 0;$i < strlen($email); $i++) {
        $char = $email[$i];
        if($char == "@") {
            $array = explode("@",$email);
            $utilizador = $array[0];
            $dominio = "@" . $array[1];
        }
    }
    
  

    $usuarioconectado = "select * from tbusuario where utilizador='$utilizador'and dominio='$dominio' and senha_usuario='$senha';";

    $consulta = $conexao->query($usuarioconectado);
        
    if($consulta->num_rows > 0) {
        $linha = $consulta->fetch_array(MYSQLI_ASSOC);
        session_start();
        $_SESSION['codusuario'] = $linha['codusu'];
        $_SESSION['login']='ok';
        $_SESSION['nome'] = $linha['nome_usuario'];
        header('Location: home_usuario.php?login=ok');
    } else {
        header('Location: index.php?login=erro');
    }
?>