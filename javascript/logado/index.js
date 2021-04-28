
$(document).ready(function(){

	fLocalComunicaServidor('', 'valida_sessao');

});


function fLocalComunicaServidor(formulario, arquivo){


	$.ajax({
		type:"POST",
		dataType: "json",
		url: "/exercicio/php/"+arquivo+".php",
		success: function(retorno){

			if(retorno.funcao == "valida-sessao") 
			{
				if(retorno.status == "s")
				{
					//alert(retorno.mensagem);
				}
				else
				{
					//window.location.href = "/exercicio";
				}
			}
		}
		
	});

}