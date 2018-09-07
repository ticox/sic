$(document).ready(function()
{

	$('#nombre_tipo').addClass('validate[required]');

	$('#agregar').validationEngine();

	$(document).on('click', '#guardar', function() 
	{
		

	 if($('#agregar').validationEngine('validate')){
	 	

	 	$.get(base_url+'regis_tipo/guardar_tipo',{

						nombre_tipo:$("#nombre_tipo").val()

						},function() {
						alertify.success('Registro satisfactorio');
						//location.href=base_url+"lista";
					});
			
	}
    
			});
			
			
	


});