<?php

$id = $_GET['id'];
    
include "conexao.php";


if($con){
    $query = "UPDATE usuarios SET emailValidado='1' WHERE id=".$id;


    if (mysqli_query($con, $query)){
        echo "E-mail validado com sucesso!";
    }else{
        echo "Erro ao cadastrar usuário. Tente novamente!";
    }

}



?>