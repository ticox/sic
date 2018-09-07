$(document).ready(function(){

var cant=$("#cant_regis").val();


var ocultar= function(){


	for (var i = 1; i <= cant; i++) {
		
		$("#fila"+i).attr('hidden','hidden');

	}
}


//funcion para ocultar o refrescar la pagina 
var paginar=function(pag_a=1){

	var pag = cant / 20;

	pag  = Math.ceil(pag);

	ocultar();


	var html="";

	for (var i = 1; i <= pag ; i++) {
		html+=" <li ><a id='pag_btn'>"+i+"</a></li>"
	}


	$('.pagination').html(html);







	for (var i = ((pag_a*20)-19) ; i <= (pag_a*20) ; i++) {


	$("#fila"+i).attr('hidden',false);



	}
}
// fin de la funcion//////////////////////////////


paginar();



$(document).on('click', '#pag_btn', function() {

	
	console.log($(this).html());
	paginar($(this).html());

});


$(document).on('click','.glyphicon-eye-open',function(){

	var x=$(this).data('id');

	$("#fila"+x).animate({height:"150px"},800);
	$("#tabla"+x).show("3000");

	console.log($("#tabla"+x));																														
		
		
});

																													
$(document).on('click','.glyphicon-eye-close',function(){

	var x=$(this).data('id');

	$("#fila"+x).animate({height:"50px"},800);
	$("#tabla"+x).hide("3000");

	console.log($("#tabla"+x));																														
		
		
});
																																	 







});