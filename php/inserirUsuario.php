<?php

include "conexao.php";



if($con){

    /*
	
    $nome = $_POST ['nome'];
    echo $nome;

    $dataDeNascimento = $_POST ['dataDeNascimento'];
    echo $dataDeNascimento;
    
    $email = $_POST ['email'];
    echo $email;

    $senha = $_POST ['senha'];
    echo $senha;

    $numeroDoCartao = $_POST ['numeroDoCartao'];
    echo $numeroDoCartao;

    $validadeDoCartao = $_POST ['validadeDoCartao'];
    echo $validadeDoCartao;

    $codigoDoCartao = $_POST ['codigoDoCartao'];
    echo codigoDoCartao;

    $nomeDoTitular = $_POST ['nomeDoTitular'];
    echo $nomeDoTitular;

    $cpf = $_POST ['cpf'];
    echo $cpf;
*/

    $nome = "Afonso";
    $dataDeNascimento = "2020-05-13";
    $email = "afonso@bol";
    $senha = "lutero2";
    $numeroDoCartao = "20";
    $validadeDoCartao = "2028-03-08";
    $codigoDoCartao = "20";
    $nomeDoTitular = "eu mesmo, afonso";
    $cpf = "05150321606";


    $query = "INSERT INTO `usuarios`(`id`, `nome`, `dataDeNascimento`, `email`, `senha`, `numeroDoCartao`, `validadeDoCartao`, `codigoDoCartao`, `nomeDoTitular`, `cpf`) VALUES 
    (null, '$nome', '$dataDeNascimento', '$email', '$senha', '$numeroDoCartao', '$validadeDoCartao', '$codigoDoCartao', '$nomeDoTitular', '$cpf')";

    mysqli_query($con, $query);



}

?>