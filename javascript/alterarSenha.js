
$(document).ready(function(){

    const queryString = window.location.search;

    const urlParams = new URLSearchParams(queryString);
    
    let id = urlParams.get('id')
    $("#id").val(id);
    

	$("#bAlterar").click(function(){
		if(id == null){
            alert('Erro ao alterar sua senha')
            return false;
        }
		var sha256 = sjcl.hash.sha256.hash($('#senha').val());
		var sha256_hexa = sjcl.codec.hex.fromBits(sha256);

		$("#senha_hash").val(sha256_hexa);
        console.log(sha256_hexa);
        console.log($('#senha').val());


		fLocalComunicaServidor('formulario')
        alert('Senha alterada com sucesso!');
		return false;
	});
});

function fLocalComunicaServidor(formulario){
    console.log("----------");
	var dados = $("#"+formulario).serialize();
    console.log(dados);
	$.ajax({
		type:"POST",
		dataType: "json",
		url: "../php/recuperarSenha.php",
		data: dados,
		success: function(){
            console.log('Senha atltearada com sucesso')
           // window.location.href = "http://localhost/Experiencia-PUC/paginas/login.html"
		},
        erro: function(){
            console.log('Erro ao alterar senha')
            alert("erro ao alterar sua senha");
        }
	});
}






