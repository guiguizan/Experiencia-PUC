<?php

	session_start();

	require "conexao.php";

	$usuario = $_POST["usuario"];
	$senha = $_POST["senha_hash"];

	$resultado = mysqli_query($con, "SELECT * FROM usuarios WHERE nome = '$usuario' AND senha = '$senha'");

	$retorno["status"] = "n";
	$retorno["mensagem"] = "usuario não cadastrado";
	$retorno["funcao"] = "login";

	if(mysqli_num_rows($resultado) > 0) 
	{
		$registro = mysqli_fetch_assoc($resultado);

		$_SESSION["usuario"] = $registro["nome"];
		$_SESSION["id"] = session_id();
		$_SESSION["inicio"] = time();
		$_SESSION["tempoLimite"] = 15;

		$retorno["status"] = "s";
		$retorno["mensagem"] = "usuario cadastrado";
	}

	print_r($_SESSION);

	echo json_encode($retorno);
?>