$(document).ready(function(){




	var accion=0;


$(document).on("change","#permisos_ch",function(){

console.log("menu--"+this.dataset.menu);
console.log("rol--"+this.dataset.rol);
console.log(this.checked);

$.get(base_url+"app/permisos_ch",{

'menu'        : this.dataset.menu,
'rol'         : this.dataset.rol,
'estado'      : this.checked

});



});



$(document).on("click", "#guardar_menu", function(){
	
	menu=$("#menu").val();
	enlace=$("#enlace").val();
	$.post(base_url + 'app/registrar_menu',{
		menu: menu,
		enlace: enlace
			},function(){
				alert("Menu Registrado Correctamente");
				document.location=base_url+"app";
	           });
});


$(document).on("click", "#guardar_rol", function(){
	
	rol=$("#rol").val();
	$.post(base_url + 'app/registrar_rol',{
		rol: rol
			},function(){
				alert("Rol Registrado Correctamente");
				//document.location=base_url+"app";
	           });
});

$(document).on("click", "#btn_actv", function(){
	
		$.post(base_url + 'app/updonw',
			{

			fecha: $("#fecha_activo").val(),
			accion: accion
			
			},function(){
				document.location=base_url+"app";		
	           });


});

$(document).on("click", "#radio1", function(){
	
if (this.value=="activar") {

accion="1";
$("#fecha_activo").attr('disabled', 'true');
}
else{

accion="0";
$("#fecha_activo").removeAttr("disabled")

}


});


});