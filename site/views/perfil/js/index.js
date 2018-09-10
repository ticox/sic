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


$(document).on("keyup", "#agencia_name", function(){
	nombre_chica=$("#agencia_name").val();
	mostrar_chicas(nombre_chica);

});

function mostrar_chicas(nombre_chica){
	$.post(base_url + 'app/buscar_chicas',{
		nombre_chica: nombre_chica
			},function(datos){
			console.log(datos);
			var html=" <br><div class='panel panel-default'>";
			html+="<div class='panel-heading'>";
			html+=" <h3 class='panel-title'><center><b>RESULTADO - CHICAS</b></center></h3>";
			html+="</div>";
			html+="<div class='panel-body'>";
			html+="<div class='table-responsive'>";
			
			html+="<table class='table table-striped table-hover '><thead>";
			html+="<tr class='default'>";
			html+="<th>Nombre</th>";
			html+="<th>Telefono</th>";
			html+="<th>Fecha ultimo pago</th>";
			html+="<th>Fecha de vencimiento</th>";
			html+="<th>Acciones</th>";
			html+="</tr>";
			html+="</thead>";
			html+="<tbody>";
		if(datos==""){
			
			html+="<tr><td colspan='5'> <b><center>No Se Encontraron Chicas</center></b></td></tr>";
			html+="</tbody> </table> </div> </div> </div>";
			$("#div_contenedor2").html("");
			$("#div_contenedor2").html(html);
			exit();
			}	
			for(var i = 0; i < datos.length; i++)
			{	
			html+="<tr><td>" + datos[i].nombre_chicas + "</td>";
			html+="<td>" + datos[i].tlf + "</td>";
			html+="<td>" + datos[i].fecha_pago + "</td>";
			html+="<td>" + datos[i].fecha_vencimiento + "</td>";
			html+="<td><a id='fotos_chicas' data-toggle='tooltip' data-placement='bottom' title='Eliminar Chica' data-id_chica='"+datos[i].id_chicas+"'><span class='glyphicon glyphicon-user'></span></a></td>";
			}
			
			html+="</tbody> </table> </div> </div> </div>";
			$("#div_contenedor2").html("");
			$("#div_contenedor2").html(html);
				
	           },"json");
};

$(document).on("click", "#fotos_chicas", function(){
id_chica=$(this).data("id_chica");

$.post(base_url + 'app/fotos_chicas',{
		id_chica: id_chica
			},function(datos){
				console.log(datos);
		var html='<ul><li>';
			for(i=0;i<datos.length;i++){
				html+='<div class="contenedor-img-agencia chicas-agencia" id="prevista">';
						html+='<a id="foto_perfil" data-id_chica="'+id_chica+'" data-id_foto="'+datos[i].id_foto+'"><img id="fotoG" src="'+base_url+'public/img/fotos/'+datos[i].nombre_foto+'"</a>';
							 
						html+='</div>';
				 }
					

					html+='</li></ul>';
			$("#prevista").html("");
			$("#prevista").html(html);
				
	           },"json");

});

$(document).on("click", "#foto_perfil", function(){
id_foto=$(this).data("id_foto");
id_chica=$(this).data("id_chica");

$.post(base_url + 'app/foto_perfil',{
		id_foto: id_foto,
		id_chica: id_chica
			},function(datos){
				if (datos==0) {
					alertify.alert("Foto de perfil seleccionada");
				};
		
				
	           },"json");

});

});