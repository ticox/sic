$(document).ready(function(){

$('#rif').addClass('validate[required]');
$('#razon_social').addClass('validate[required]');
$('#nro_de_registro').addClass('validate[required]');
$('#tipo').addClass('validate[required]');
$('#municipio').addClass('validate[required]');
$('#parroquia').addClass('validate[required]');
$('#direccion').addClass('validate[required]');
$('#poseep').addClass('validate[required]');
$('#poseec').addClass('validate[required]');
$('#clap').addClass('validate[required]');



$('#agregar').validationEngine();

//$('#agregar').validationEngine('validate');

//carga de select dinamico
$(document).on('change', '#municipio', function() {
	

		$.get(base_url+'regis_emp/traer_parroquia',{
	
			id: $('#municipio').val()
			

			}, function(data) {
		


				console.log(data[0].parroquia);


			var html=""

			html+="<option value=''>-seleccione-</option>"

			for (var i = 0; i < data.length; i++) {
				
				html+="<option value="+data[i].id_parroquia+">"+data[i].parroquia+"</option>"

			}

			$('#parroquia').html(html);

			},"json");});

$(document).on('click', '#guardar', function() {
	
if($('#agregar').validationEngine('validate')){

	$("guardar").attr('disabled','disabled');
$.get(base_url+'regis_emp/guardar_emp',{

			rif:$("#rif").val(),
			razon_social:$("#razon_social").val(),
			nro_registro:$("#nro_de_registro").val(),
			tipo:$("#tipo").val(),
			municipio:$("#municipio").val(),
			parroquia:$("#parroquia").val(),
			direccion:$("#direccion").val(),
			poseep:$("#poseep").val(),
			poseec:$("#poseec").val(),
			clap:$("#clap").val(),
			codigo_sica:$("#codigo_sica").val()

		},function() {
		alertify.success('registro satisfactorio');
		location.href=base_url+"regis_emp";
		});}

		

});


















});