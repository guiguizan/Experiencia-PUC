

$(document).ready(function(){


	$("#bAcessar").click(function(){
		
		var senha_hash_md5 = $.MD5($('#senha').val());

		var myBitArray = sjcl.hash.sha256.hash($('#senha').val());
		var senha_hash_sha256 = sjcl.codec.hex.fromBits(myBitArray);


		alert(senha_hash_md5);
		alert(senha_hash_sha256);

		return false;
	});



});

