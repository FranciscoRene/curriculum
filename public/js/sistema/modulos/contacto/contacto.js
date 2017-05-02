$(document).ready(function(){
	$.formUtils.addValidator({
		name : 'con_nombre',
		validatorFunction : function(value, $el, config, language, $form) {
			var res = value.match(/^[a-zA-Z-ñáéíóúÁÉÍÓÚÑ\ \']+$/);
			if (null != res)
				return true;
			else
				return false;
		},
		errorMessage : '* Sólo letras',
		errorMessageKey: 'badEvenNumber'
	});
	$.validate({
		form : '#form-contacto',
		onSuccess : function($form) {
			/* login */
			$.ajax({
				url: '/contacto/envio',
				type: 'post',
				dataType: 'json',
				data: $("#form-contacto").serialize(),
				success: function(json){
					if(json.result){				
						window.location.href="/trabajos/";
					}
					else
					{
						console.log(json.msg);
						noty({
						text: json.msg,
						type: 'error',
						timeout: 3000,
						animation: {
							open: {height: 'toggle'},
							close: {height: 'toggle'},
							easing: 'swing',
							speed: 500
						}
					});
					}
				}
			});			  
		  return false;
		},
	// inlineErrorMessageCallback:  function(input, errorMessage, config) {
			 // if (input.attr('id') === "email") {
				 // console.log(errorMessage);
			 // return false; // prevent default behaviour
			 // }
			 // return false;
		// },
	});   
});