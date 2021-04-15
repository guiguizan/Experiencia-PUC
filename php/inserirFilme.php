<?php

include "conexao.php";


if($con){
   

	
    $titulo = $_POST ['titulo'];
    echo $titulo;

    $genero = $_POST ['genero'];
    echo $genero;

    $ano = $_POST ['ano'];
    echo $ano;
        
    $duracao = $_POST ['duracao'];
    echo $duracao;

    $relevancia = $_POST ['relevancia'];
    echo $relevancia;

    $sinopse = $_POST ['sinopse'];
    echo $sinopse;

    $trailer = $_POST ['trailer'];
    echo $trailer;



    $query = "INSERT INTO `filmes`(`id`, `titulo`, `genero`, `ano`, `duracao`, `relevancia`, `sinopse`, `trailer`) VALUES 
    (null, '$titulo', '$genero', '$ano', '$duracao', '$relevancia', '$sinopse', '$trailer')";

    if (mysqli_query($con, $query)){
        echo $id = $con->insert_id;
        header('Location: ../paginas/concluido.html');
    }else{
        echo "Erro ao cadastrar usuário. Tente novamente!";
    }

}

?>