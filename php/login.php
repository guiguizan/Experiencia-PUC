<?php

include "conexao.php";


if($con){



    $usuario = $_POST['usuario'];
    $entrar = $_POST['entrar'];
    $senha = md5($_POST['senha']);

    $contador = 0;
    

    $sql = "SELECT * FROM usuarios WHERE nome = '$usuario'";
    $result = mysqli_query($con, $sql);
    $resultado = mysqli_fetch_assoc($result);
     
    if(empty($resultado)){
        $_SESSION['loginErro'] = "usuario invalido";
        
    }elseif(isset($resultado)){
        header("Location: ../paginas/toma.html");
    }else{
        $_SESSION['loginErro'] = "usuario ou senha invalido";
        header("Location: ../paginas/insereFilme.html");
    }
}
?>