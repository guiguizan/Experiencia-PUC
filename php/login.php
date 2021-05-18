<?php

	session_start();

	require "conexao.php";

	$usuario = $_POST["usuario"];
	$senha = $_POST["senha_hash"];

	$resultado = mysqli_query($con, "SELECT * FROM usuarios WHERE email = '$usuario' AND senha = '$senha'");

	$retorno["status"] = "n";
	$retorno["mensagem"] = "usuario não cadastrado";
	$retorno["funcao"] = "login";

	if(mysqli_num_rows($resultado) > 0) 
	{
		$registro = mysqli_fetch_assoc($resultado);

		$_SESSION["id_usuario"] = $registro["id"];
		$_SESSION["usuario"] = $registro["nome"];
		$_SESSION["tipo"] = 1; // 1 = usuairo normal 2 = admin
		$_SESSION["numeroDoCartao"] = $registro["numeroDoCartao"];
		$_SESSION["validadeDoCartao"] = $registro["validadeDoCartao"];
		$_SESSION["codigoDoCartao"] = $registro["codigoDoCartao"];
		$_SESSION["nomeDoTitular"] = $registro["nomeDoTitular"];

		$_SESSION["id"] = session_id();
		$_SESSION["inicio"] = time();
		$_SESSION["tempoLimite"] = 5;

		$_SESSION["loginValido"] = true;

		$retorno["status"] = "s";
		$retorno["mensagem"] = "usuario cadastrado";
	}else{
		$_SESSION["loginValido"] = false;

	}

	print_r($_SESSION);

	echo json_encode($retorno);
?>