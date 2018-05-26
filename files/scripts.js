// VALIDAR FORM
function enviardados(){ 
											
	if(document.formulario.name.value=="" ) { 
		alert( "Preencha campo NOME corretamente!" ); 
		document.formulario.name.focus();
		return false;
	}
	if(document.formulario.description.value=="" ) { 
		alert( "Preencha campo DESCRIÇÃO corretamente!" ); 
		document.formulario.description.focus();
		return false;
	}
	if(document.formulario.quantity.value=="" ) { 
		alert( "Preencha campo QUANTIDADE corretamente!" ); 
		document.formulario.quantity.focus();
		return false;
	}
	if( isNaN(document.formulario.quantity.value)) {  
       alert("Preencha campo QUANTIDADE com apenas números!");  
       document.formulario.quantity.focus();  
       return false;  
	}
	if(document.formulario.price.value=="" ) { 
		alert( "Preencha campo PREÇO corretamente!" ); 
		document.formulario.price.focus();
		return false;
	}
	return true;
}