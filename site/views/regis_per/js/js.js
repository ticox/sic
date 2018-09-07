$(document).ready(function()
{

	$('#rif').addClass('validate[required]');
	$('#cedula').addClass('validate[required]');
	$('#nombres').addClass('validate[required]');
	$('#apellidos').addClass('validate[required]');
	$('#telefono').addClass('validate[required]');
	$('#direccion').addClass('validate[required]');
	$('#codigo').addClass('validate[required]');
	$('#serial').addClass('validate[required]');
	$('#certificado_medico').addClass('validate[required]');
	$('#productora').addClass('validate[required]');
	$('#agregar').validationEngine();

	$(document).on('click', '#guardar', function() 
	{
	

		

	 if($('#agregar').validationEngine('validate')){
	 	$('#guardar').attr('disabled','disabled');


	 		
	 		alertify.confirm( "Esta realmente seguro de registrar a "+$('#nombres').val()+" En la empresa productora "+$('#productora option:selected').text()+"?", function (e) {
			    if (e) {
			    	$.get(base_url+'regis_per/guardar_per',{

						cedula:$("#cedula").val(),
						nacionalidad:$("#nacionalidad").val(),
						rif:$("#rif").val(),
						nombres:$("#nombres").val(),
						apellidos:$("#apellidos").val(),
						telefono:$("#telefono").val(),
						direccion:$("#direccion").val(),
						codigo:$("#codigo").val(),
						serial:$("#serial").val(),
						certificado_medico:$("#certificado_medico").val(),
						productora:$("#productora").val()

						},function() {
						alertify.success('registro satisfactorio');
						location.href=base_url+"lista";
					});
			        
			    } else {
			       $('#guardar').attr('disabled',false);
			    }
			});
			
			
	}
	});

	$(document).on('change','#cedula',function(){
		$('img').removeAttr('hidden');
		$.get(base_url+'regis_per/buscar',
			{
				cedula:$("#cedula").val(),
				nacionalidad:$("#nacionalidad").val()

			},
			function(datos) 
			{
			
				if(datos)
				{
					console.log(datos);
					alertify.alert("esta persona esta registrada en la empresa : "+datos['razon_social']+", y no puede registrarse nuevamente¡¡ ");
					$('#rif').val("");
					$('#cedula').val("");
					$('#nombres').val("");
					$('#apellidos').val("");
					$('#telefono').val("");
					$('#direccion').val("");
					$('#codigo').val("");
					$('#serial').val("");
					$('#certificado_medico').val("");
					$('#productora').val("");
				}
				else
				{

					console.log("el else");
					$.get(base_url+'regis_per/buscar2',{
						cedula:$("#cedula").val(),
						nacionalidad:$("#nacionalidad").val()
					},
					function(datos2){
						if(datos2)
						{
							$('#nombres').val(datos2.Nombre1+" "+datos2.Nombre2);
							$('#apellidos').val(datos2.Apellido1+" "+datos2.Apellido2);	
						}
						$('img').attr("hidden", true);
					},'json');

				}



			},'json');
	});

});