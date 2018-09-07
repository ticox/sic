$(document).ready(function(){


$.get(base_url+'regis_emp/traer_parroquia',{
	
			id: $('#municipio').val()
			

			}, function(data) {
		


				console.log(data[0].parroquia);


			var html=""

			html+="<option value=''>-seleccione-</option>"

			for (var i = 0; i < data.length; i++) {
				
				console.log($('#parroquia_2').val()+"--"+data[i].id_parroquia);

				if($('#parroquia_2').val()==data[i].id_parroquia)
				{
					html+="<option selected value="+data[i].id_parroquia+">"+data[i].parroquia+"</option>"
				}else
				{

					html+="<option value="+data[i].id_parroquia+">"+data[i].parroquia+"</option>"
				}

			}

			$('#parroquia').html(html);

},"json");


$(document).on('click', '#actualizar', function() {
	alert();
if($('#agregar').validationEngine('validate')){

		$("#actualizar").attr('disabled','disabled');
			$.get(base_url+'regis_emp/actualizar_emp',{

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
		alertify.success('Actualizacion de registro satisfactorio');
		location.href=base_url+"lista";
		});


}



});

});


