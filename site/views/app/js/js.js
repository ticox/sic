$(document).ready(function(){

	var accion=0;
	var cargar_servicios;


function archivo(input)
{
  $("div#prevista").remove();
  $('#list').addClass('active');
  reader=Array();
  for (var i = 0; i < input.files.length ;  i++)
  {
    reader[i] = new FileReader();
    reader[i].numero= i;
    reader[i].onloadstart= function(){

      $('#list').after('<div id="cargarr'+this.numero+'" class="col-xs-6 col-sm-4 col-md-12 col-lg-2 ">img ==='+this.numero+'</div>' );

    }
    reader[i].onloadend= function(){

      $('div#cargarr'+this.numero).remove();
    }
    reader[i].onload= function()
    {
      $('#list').after('<div id="prevista" class="col-md-12 prviuw"> <center><img class="" width="234px" height="135px" src="'+this.result+' " > </center></div>' );
    }
    reader[i].readAsDataURL(input.files[i]);
  }

  console.log(reader);
  
}

$('#files').change(function()
{
  archivo(this);

  $('#guardar_clientes').removeAttr("disabled");
});


function archivo2(input)
{
  $("div#prevista2").remove();
  $('#list2').addClass('active');
  reader=Array();
  for (var i = 0; i < input.files.length ;  i++)
  {
    reader[i] = new FileReader();
    reader[i].numero= i;
    reader[i].onloadstart= function(){

      $('#list2').after('<div id="cargarrr'+this.numero+'" class="col-xs-6 col-sm-4 col-md-12 col-lg-2 ">img ==='+this.numero+'</div>' );

    }
    reader[i].onloadend= function(){

      $('div#cargarrr'+this.numero).remove();
    }
    reader[i].onload= function()
    {
      $('#list2').after('<div id="prevista2" class="col-md-12 prviuw"> <center><img class="" width="234px" height="135px" src="'+this.result+' " > </center></div>' );
    }
    reader[i].readAsDataURL(input.files[i]);
  }

  console.log(reader);
  
}

$('#files2').change(function()
{
  archivo2(this);
  $('#guardar_marcas').removeAttr("disabled");
});



function cargarservicios(){

$.post(base_url+'app/buscar_servicios',function(datos) {
					
			 		for (var i=0; i < datos.length; i++) {
			 			$('#modificar_servicio').append("<option data-toggle='modal' data-target='#mod_servicio' value="+datos[i].id_servicio+">"+datos[i].titulo+"</option>");
			 		}


					},'json');
		

}

cargarservicios();

$( "#fecha_activo" ).datepicker({
  dateFormat: 'yy-mm-dd'
});

$('#div_usuario').hide(); //muestro mediante id
$('#div_servicio').hide();
$('#div_clientes').hide();
$('#div_marcas').hide();




/*--------------------- Modificar Nosotros ---------------------*/

$(document).on("click", "#buscar_nosotros", function(){
	
		$.post(base_url + 'app/buscar_nosotros',function(datos){
				var html="<center>Parrafos </center><textarea id='parrafo1' class='form-control'>"+datos.parrafo1+"</textarea></br>";
				html+="<textarea id='parrafo2' class='form-control'>"+datos.parrafo2+"</textarea></br>";
				html+="<textarea id='parrafo3' class='form-control'>"+datos.parrafo3+"</textarea></br>";
				html+="<textarea id='parrafo4' class='form-control'>"+datos.parrafo4+"</textarea></br>";
				html+="<textarea id='parrafo5' class='form-control'>"+datos.parrafo5+"</textarea></br>";
				html+="<input type='hidden'id='id_nosotros' value="+datos.id_nosotros+"> </br>";

				 $("#divnosotros").html("");
				  $("#divnosotros").html(html);
	           },'json');

});



$(document).on('click', '#guardar_nosotros', function() 
	{
	 		
	 		alertify.confirm( "¿Esta realmente seguro de modificar?", function (e) {
			    if (e) {
			    	$.post(base_url+'app/guardar_nosotros',{

						parrafo1:$("#parrafo1").val(),
						parrafo2:$("#parrafo2").val(),
						parrafo3:$("#parrafo3").val(),
						parrafo4:$("#parrafo4").val(),
						parrafo5:$("#parrafo5").val(),
						id:$("#id_nosotros").val()

						},function() {
						alertify.success('Modificacion relizada satisfactoriamente');
						$("#nosotros .close").click();
					});
			        
			    } else {
			       alertify.error('Ha cancelado la operación');
			    }
			});
			
		
	});

/*--------------------- Modificar Mision ---------------------*/

$(document).on("click", "#buscar_mision", function(){
	
		$.post(base_url + 'app/buscar_informacion',function(datos){
				var html="<center>Misión </br> </center><textarea id='textmision' class='form-control'>"+datos.mision+"</textarea></br>";
				html+="<input type='hidden'id='id_informacion' value="+datos.id_informacion+"> </br>";

				 $("#divmision").html("");
				  $("#divmision").html(html);
	           },'json');

});


$(document).on('click', '#guardar_mision', function() 
	{
	 		
	 		alertify.confirm( "¿Esta realmente seguro de modificar?", function (e) {
			    if (e) {
			    	$.post(base_url+'app/guardar_mision',{

						mision:$("#textmision").val(),
						id:$("#id_informacion").val()

						},function() {
						alertify.success('Modificación relizada satisfactoriamente');
						$("#mision .close").click();
					});
			        
			    } else {
			       alertify.error('Ha cancelado la operación');
			    }
			});
			
		
	});


/*--------------------- Modificar Vision ---------------------*/

$(document).on("click", "#buscar_vision", function(){
	
		$.post(base_url + 'app/buscar_informacion',function(datos){
				var html="<center>Visión</br> </center><textarea id='textvision' class='form-control'>"+datos.vision+"</textarea></br>";
				html+="<input type='hidden'id='id_informacion' value="+datos.id_informacion+"> </br>";

				 $("#divvision").html("");
				  $("#divvision").html(html);
	           },'json');

});


$(document).on('click', '#guardar_vision', function() 
	{
	 		
	 		alertify.confirm( "¿Esta realmente seguro de modificar?", function (e) {
			    if (e) {
			    	$.post(base_url+'app/guardar_vision',{

						vision:$("#textvision").val(),
						id:$("#id_informacion").val()

						},function() {
						alertify.success('Modificación relizada satisfactoriamente');
						$("#vision .close").click();
					});
			        
			    } else {
			       alertify.error('Ha cancelado la operación');
			    }
			});
			
		
	});


/*--------------------- Modificar Preview ---------------------*/

$(document).on("click", "#buscar_preview", function(){
	
		$.post(base_url + 'app/buscar_informacion',function(datos){
				var html="<center>Preview</br> </center><textarea id='textpreview' class='form-control'>"+datos.preview+"</textarea></br>";
				html+="<input type='hidden'id='id_informacion' value="+datos.id_informacion+"> </br>";

				 $("#divpreview").html("");
				  $("#divpreview").html(html);
	           },'json');

});


$(document).on('click', '#guardar_preview', function() 
	{
	 		
	 		alertify.confirm( "¿Esta realmente seguro de modificar?", function (e) {
			    if (e) {
			    	$.post(base_url+'app/guardar_preview',{

						preview:$("#textpreview").val(),
						id:$("#id_informacion").val()

						},function() {
						alertify.success('Modificación relizada satisfactoriamente');
						$("#preview .close").click();
					});
			        
			    } else {
			       alertify.error('Ha cancelado la operación');
			    }
			});
			
		
	});



/*--------------------- Modificar Titulo ---------------------*/

$(document).on("click", "#buscar_titulo", function(){
	
		$.post(base_url + 'app/buscar_informacion',function(datos){
				var html="<center>Titulo</br> </center><textarea id='texttitulo' class='form-control'>"+datos.titulo+"</textarea></br>";
				html+="<input type='hidden'id='id_informacion' value="+datos.id_informacion+"> </br>";

				 $("#divtitulo").html("");
				  $("#divtitulo").html(html);
	           },'json');

});


$(document).on('click', '#guardar_titulo', function() 
	{
	 		
	 		alertify.confirm( "¿Esta realmente seguro de modificar?", function (e) {
			    if (e) {
			    	$.post(base_url+'app/guardar_titulo',{

						titulo:$("#texttitulo").val(),
						id:$("#id_informacion").val()

						},function() {
						alertify.success('Modificación relizada satisfactoriamente');
						$("#titulo .close").click();
					});
			        
			    } else {
			       alertify.error('Ha cancelado la operación');
			    }
			});
			
		
	});


/*--------------------- Modificar contactos ---------------------*/

$(document).on("click", "#buscar_contactos", function(){
	
		$.post(base_url + 'app/buscar_informacion',function(datos){
				var html="<center>Ciudad/Privincia </br></center><textarea id='ciudad_provincia' class='form-control'>"+datos.ciudad_provincia+"</textarea></br>";
				html+="<center>Dirección </br></center><textarea id='direccion' class='form-control'>"+datos.direccion+"</textarea></br>";
				html+="<center>Telefono </br></center><textarea id='telefono' class='form-control'>"+datos.telefono+"</textarea></br>";
				html+="<center>Correo </br></center><textarea id='correo' class='form-control'>"+datos.correo+"</textarea></br>";
				html+="<input type='hidden'id='id_informacion' value="+datos.id_informacion+"> </br>";

				 $("#divcontactos").html("");
				  $("#divcontactos").html(html);
	           },'json');

});


$(document).on('click', '#guardar_contactos', function() 
	{
	 		
	 		alertify.confirm( "¿Esta realmente seguro de modificar?", function (e) {
			    if (e) {
			    	$.post(base_url+'app/guardar_contactos',{

						ciudad_provincia:$("#ciudad_provincia").val(),
						direccion:$("#direccion").val(),
						telefono:$("#telefono").val(),
						correo:$("#correo").val(),
						id:$("#id_informacion").val()

						},function() {
						alertify.success('Modificación relizada satisfactoriamente');
						$("#contactos .close").click();
					});
			        
			    } else {
			       alertify.error('Ha cancelado la operación');
			    }
			});
			
		
	});





/*--------------------- Modulo de Servicios ---------------------*/

$(document).on('click', '#guardar_servicio', function() 
	{
	 		
	 		alertify.confirm( "¿Esta realmente seguro de guardar este servicio?", function (e) {
			    if (e) {
			    	$.post(base_url+'app/guardar_servicio',{

						titulo:$("#titulo_servicio").val(),
						descripcion:$("#descripcion").val()

						},function() {
						alertify.success('Servicio guardado satisfactoriamente');
						$("#servicio .close").click()
					});
			        
			    } else {
			       alertify.error('Ha cancelado la operación');
			    }
			});
			
		
	});



$(document).on('change', '#modificar_servicio', function() 
	{

		$('#mod_servicio').modal('show');
			 	$.post(base_url+'app/buscar_servicio',{

						id:$("#modificar_servicio").val()


			 	},function(datos) {
						
					 var html='<div class="form-group "><label class="control-label">Titulo</label>';
		              
		                 html+='<input type="text" type="text" class="form-control" id="t_servicio" name="titulo_servicio" value="'+datos.titulo+'" required="required"> </div>';
		           		 html+='<div class="form-group "><label class="control-label">Descripción</label><textarea  class="form-control" id="d_servicio" required="required">'+datos.descripcion+'</textarea>';
              			 html+='<input type="hidden" id="id_servicio" value="'+datos.id_servicio+'"></div>';
          
		           		 $("#mservicio").html("");
				 		 $("#mservicio").html(html);

					},'json');
		
		
	});


$(document).on('click', '#servicio_modificado', function() 
	{
	 		
	 		alertify.confirm( "¿Esta realmente seguro de modificar este servicio?", function (e) {
			    if (e) {
			    	$.post(base_url+'app/servicio_modificado',{

						titulo:$("#t_servicio").val(),
						descripcion:$("#d_servicio").val(),
						id:$("#id_servicio").val()

						},function() {
						alertify.success('Servicio modificado satisfactoriamente');
						$("#modificar_servicio").empty();

						$('#modificar_servicio').append("<option value=''> -> Seleccione <-</option>");
						cargarservicios();
					});
			        
			    } else {
			       alertify.error('Ha cancelado la operación');
			    }
			});
			
		
	});



$(document).on('click', '#eliminar_servicio', function() 
	{
	 		
	 		alertify.confirm( "¿Esta realmente seguro de eliminar este servicio?", function (e) {
			    if (e) {
			    	$.post(base_url+'app/eliminar_servicio',{

						id:$("#id_servicio").val()

						},function() {
						alertify.success('Servicio eliminado satisfactoriamente');
						$("#modificar_servicio").empty();

						$('#modificar_servicio').append("<option value=''> -> Seleccione <-</option>");
						cargarservicios();
						$("#mod_servicio .close").click()
					});
			        
			    } else {
			       alertify.error('Ha cancelado la operación');
			    }
			});
			
		
	});

/*--------------------- Agregar Clientes ---------------------*/
$(document).on("click", "#agregar_clientes", function(){

	$('#div_clientes').show(2000); //muestro mediante id
	$('#div_marcas').hide(1500); //muestro mediante id
	$('#div_usuario').hide(1500); //muestro mediante id
	$('#div_servicio').hide(1500); //muestro mediante id
});

$(document).on("click", "#cancelar_aclientes", function(){

	$('#div_clientes').hide(1500); //muestro mediante id

});


/*--------------------- Agregar Marcas ---------------------*/
$(document).on("click", "#agregar_marcas", function(){

	$('#div_marcas').show(2000); //muestro mediante id
	$('#div_clientes').hide(1500); //muestro mediante id
	$('#div_usuario').hide(1500); //muestro mediante id
	$('#div_servicio').hide(1500); //muestro mediante id
});

$(document).on("click", "#cancelar_amarcas", function(){

	$('#div_marcas').hide(1500); //muestro mediante id

});


/*--------------------- Crear Usuarios ---------------------*/

$(document).on("click", "#crear_usuarios", function(){

	$('#div_usuario').show(2000); //muestro mediante id
	$('#div_servicio').hide(1500); //muestro mediante id
	$('#div_clientes').hide(1500); //muestro mediante id
	$('#div_marcas').hide(1500); //muestro mediante id

});


$(document).on("click", "#cancelar_crearusuario", function(){

	$('#div_usuario').hide(1500); //muestro mediante id

});






$("#confirmar_contraseña").focusout(function(){

	if($('#contraseña').val() != $('#confirmar_contraseña').val()){
		alertify.alert("Las claves no coinciden");
	}else{

		  $('#crear_usuario').removeAttr("disabled");
	}
  
});


$("#contraseña").focus( function(){

$('#crear_usuario').attr("disabled","true");


});


$(document).on('click', '#crear_usuario', function() {
	 		
	 		alertify.confirm( "¿Esta realmente seguro de crear este usuario?", function (e) {
			    if (e) {
			    	$.post(base_url+'app/guardar_usuario',{

						usuario:$("#usuario").val(),
						clave:$("#contraseña").val()

						},function() {
						alertify.success('Usuario Creado satisfactoriamente');

						$('#div_usuario').hide(1500); //muestro mediante id
						$("#contraseña").val("");
						$("#usuario").val("");
						$("#confirmar_contraseña").val("");
					});
			        
			    } else {
			       alertify.error('Ha cancelado la operación');
			    }
			});
			
		
	});




/*--------------------- Editar Servicios ---------------------*/

$(document).on("click", "#editar_servicio", function(){

	$('#div_servicio').show(3000); //muestro mediante id
	$('#div_usuario').hide(1500); //muestro mediante id
	$('#div_clientes').hide(1500); //muestro mediante id
	$('#div_marcas').hide(1500); //muestro mediante id

});

$(document).on("click", "#cancelar_mservicio", function(){

	$('#div_servicio').hide(1500); //muestro mediante id

});


$(document).on("click", "#cancelar_editarservicio", function(){

	$('#div_usuario').hide(1500); //Oculto mediante id

});




$(document).on("click", "#cancelar_editarservicio", function(){

	$('#div_usuario').hide(1500); //Oculto mediante id

});

});