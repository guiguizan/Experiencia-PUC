<?php

$id = $_POST['id'];
$teste = $_POST['senha_hash'];
    
include "conexao.php";


if($con){
    $query = "UPDATE usuarios SET senha='$teste' WHERE id=".$id;

    if (mysqli_query($con, $query)){
        echo "Senha recuperada com sucesso!";
    }else{
        echo "Erro ao cadastrar usuário. Tente novamente!";
    }

}

?>