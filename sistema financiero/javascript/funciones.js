



function valida_registro(){
	
	
	íf(/^\s*$/.test(document.getElementById(InputPassword).value)){
		
		alert("Debe Ingresar EL password");
		document.getElementById('InputPassword').value = "";
		document.getElementById('InputPassword2').value = "";
		document.getElementById('InputPassword').focus();
		return (false);
	}
	íf(/^\s*$/.test(document.getElementById(InputPassword2).value)){
		
		alert("Debe Ingresar confirmacion del password");
		document.getElementById('InputPassword').value = "";
		document.getElementById('InputPassword2').value = "";
		document.getElementById('InputPassword').focus();
		return (false);
	}
	
	
	document.getElementById('formRegistro').Submit();
	
	
}