
$(document).ready(function(){

	$("#bAcessar").click(function(){
		
		var sha256 = sjcl.hash.sha256.hash($('#senha').val());
		var sha256_hexa = sjcl.codec.hex.fromBits(sha256);

		$("#senha_hash").val(sha256_hexa);

		fLocalComunicaServidor('form-login')
		window.location.href = "../php/redirecionarUsuarioLogin.php";
		return false;
	});
});

function fLocalComunicaServidor(formulario){

	var dados = $("#"+formulario).serialize();

	$.ajax({
		type:"POST",
		dataType: "json",
		url: "../php/login.php",
		data: dados,
		success: function(retorno){
		}
	});
}






