$(document).ready(function(){

$('#nombre').addClass('validate[required]');
$('#email').addClass('validate[required, custom[email]]');
$('#asunto').addClass('validate[required]');
$('#mensaje').addClass('validate[required]');

$(document).on('click', '#enviar_email', function() {
	
if($('#agregar').validationEngine('validate')){

	$("enviar_email").attr('disabled','disabled');
$.get(base_url+'principal/enviar_email',{

			nombre:$("#nombre").val(),
			correo:$("#email").val(),
			asunto:$("#asunto").val(),
			mensaje:$("#mensaje").val()

		},function() {
		alertify.success('Mensaje enviado satisfactoriamente');
		$("#nombre").val("");
		$("#email").val("");
		$("#asunto").val("");
		$("#mensaje").val("");
		});}

		

});

});