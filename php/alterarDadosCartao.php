<?php
      session_start();

$nomeDoTitular = $_POST['nomeDoTitular'];
$numeroDoCartao = $_POST['numeroDoCartao'];
$codigoDoCartao = $_POST['codigoDoCartao'];
$validadeDoCartao = $_POST['validadeDoCartao'];
$id = $_SESSION['id_usuario'];

include "conexao.php";


if($con){

    $query = "UPDATE usuarios SET nomeDoTitular='$nomeDoTitular', numeroDoCartao='$numeroDoCartao',
      codigoDoCartao='$codigoDoCartao', validadeDoCartao='$validadeDoCartao'  WHERE id=".$id;

    if (mysqli_query($con, $query)){
        $_SESSION["numeroDoCartao"] = $numeroDoCartao;
        $_SESSION["validadeDoCartao"] = $validadeDoCartao;
        $_SESSION["codigoDoCartao"] = $codigoDoCartao;
        $_SESSION["nomeDoTitular"] = $nomeDoTitular;
        echo "Dados alteardos com sucesso!";
        header("Location: ../paginas/usuario/dashboardUsuario.php?feedback=cartao_ok");
    }else{
        echo "Erro ao alterar os dados Tente novamente!";
        header("Location: ../paginas/usuario/dashboardUsuario.php?feedback=cartao_ok");
    }

}