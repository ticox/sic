$(document).ready(function(){





$(".votacion").on("click", function(){
	var valor;

	valor=this.value;
	id=$('#id_chica').val();
	

	$.post(base_url + 'nina/votacion','valor='+valor+'&id='+id, function(datos){

					if (datos==0) {
						alertify.alert("Debe esperar hasta mañana para votar nuevamente.");
					}else{
					alertify.alert("Has votado exitosamente.");}

				});
});








});