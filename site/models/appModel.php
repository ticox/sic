<?php

class appModel extends Model
{
    public function __construct() {
        parent::__construct();
    }


public function guardar_publicacion_cliente($datos,$fotos)
      {    

                
                  $target_path = "img/prueba/";
                  $nombre='cliente-'.$fotos['foto']['name'][0];
                  $target_path = $target_path .$nombre;
                  $sql="insert into clientes values ('','".$datos['nombre_cliente']."','".$datos['link']."','".$nombre."')";
                  $this->_db->query($sql);
                  move_uploaded_file($fotos['foto']['tmp_name'][0], $target_path); 
                  $obj_img = new SimpleImage();
                  $obj_img->load($target_path);
                  $obj_img->resize(234,135);
                  $obj_img->save($target_path);

      }


      public function guardar_publicacion_marca($datos,$fotos)
      {    
                
                  $target_path = "img/prueba/";
                  $nombre='marca-'.$fotos['foto']['name'][0];
                  $target_path = $target_path .$nombre;
                  $sql="insert into marcas values ('','".$datos['nombre_marca']."','','".$nombre."')";
                  $this->_db->query($sql);
                  move_uploaded_file($fotos['foto']['tmp_name'][0], $target_path); 
                  $obj_img = new SimpleImage();
                  $obj_img->load($target_path);
                  $obj_img->resize(234,135);
                  $obj_img->save($target_path);

      }

 public function guardar_usuario($datos){

 $sql="INSERT INTO usuario values ('','1','".$datos['usuario']."' ,'" . Hash::getHash('sha1', $datos['clave'], HASH_KEY) ."','1')";
        $this->_db->query($sql);
   }

 public function guardar_servicio($datos){

 $sql="INSERT INTO servicios values ('','".$datos['titulo']."' ,'".$datos['descripcion']."')";
        $this->_db->query($sql);
   }


 public function buscar_servicios(){

 $sql="SELECT * FROM servicios";
       $datos = $this->_db->query($sql);
        return $datos->fetchall();
   }


    public function buscar_servicio($datos){

       $sql="SELECT * FROM servicios where id_servicio='".$datos['id']."'";
       $datos = $this->_db->query($sql);
        return $datos->fetch();

   }


public function servicio_modificado($datos){

   echo $sql ="update servicios SET titulo='".$datos['titulo']."', descripcion='".$datos['descripcion']."'  WHERE id_servicio= '".$datos['id']."'";

     $this->_db->query($sql);
   }


public function eliminar_servicio($datos){

   echo $sql ="delete FROM servicios WHERE id_servicio= '".$datos['id']."'";

     $this->_db->query($sql);
   }


    
public function buscar_nosotros(){


$sql ="select * from nosotros";
$datos = $this->_db->query($sql);
  return $datos->fetch();
  }


  public function guardar_nosotros($datos){

   echo $sql ="update nosotros SET parrafo1='".$datos['parrafo1']."' ,`parrafo2`='".$datos['parrafo2']."',parrafo3='".$datos['parrafo3']."',parrafo4='".$datos['parrafo4']."',parrafo5='".$datos['parrafo5']."' WHERE id_nosotros= '".$datos['id']."'";

     $this->_db->query($sql);
   }


   public function guardar_contactos($datos){

   echo $sql ="update informacion SET ciudad_provincia='".$datos['ciudad_provincia']."' ,`direccion`='".$datos['direccion']."',telefono='".$datos['telefono']."',correo='".$datos['correo']."' WHERE id_informacion= '".$datos['id']."'";

     $this->_db->query($sql);
   }



   public function buscar_informacion(){


$sql ="select * from informacion";
$datos = $this->_db->query($sql);
  return $datos->fetch();
  }


  public function guardar_mision($datos){

   echo $sql ="update informacion SET mision='".$datos['mision']."' WHERE id_informacion= '".$datos['id']."'";

     $this->_db->query($sql);
   }


  public function guardar_vision($datos){

   echo $sql ="update informacion SET vision='".$datos['vision']."' WHERE id_informacion= '".$datos['id']."'";

     $this->_db->query($sql);
   }


    public function guardar_preview($datos){

   echo $sql ="update informacion SET preview='".$datos['preview']."' WHERE id_informacion= '".$datos['id']."'";

     $this->_db->query($sql);
   }


   public function guardar_titulo($datos){

   echo $sql ="update informacion SET titulo='".$datos['titulo']."' WHERE id_informacion= '".$datos['id']."'";

     $this->_db->query($sql);
   }



   /*----------- datos viejos --------------*/

/*public function menu($id = false){

	if ($id!=false) {
		$sql = "SELECT menu.* FROM menu,permisos,role,usuario WHERE\n"
    . "menu.id_menu=permisos.id_menu and \n"
    . "role.id_role = permisos.id_role and\n"
    . "permisos.permiso=1 and \n"
    . "role.id_role=usuario.id_role and\n"
    . "usuario.id_usuario=".$id."\n"
    . "order by id_menu asc\n";
	$menu = $this->_db->query($sql);
	return $menu->fetchall();
		
	}else{
		$sql = "SELECT DISTINCT menu.* FROM menu,permisos,role,usuario WHERE\n"
    . "menu.id_menu=permisos.id_menu and \n"
    . "role.id_role = permisos.id_role and\n"
    . "permisos.permiso=1 and \n"
    . "role.id_role=2 \n"
    . "order by id_menu asc\n";
	$menu = $this->_db->query($sql);
	return $menu->fetchall();


	}
}*/



    public function traer_menus(){


    $sql="select * from menu";
       

        $datos = $this->_db->query($sql);
              //  $datos->setFetchMode(PDO::FETCH_ASSOC);

        return $datos->fetchall();


    }
      public function traer_roles(){


    $sql="select * from role";
       

        $datos = $this->_db->query($sql);
              //  $datos->setFetchMode(PDO::FETCH_ASSOC);

        return $datos->fetchall();


    }

 public function traer_permisos($id,$id2){


$sql = "SELECT permisos.* FROM role,permisos,menu WHERE role.id_role = permisos.id_role and permisos.id_menu=menu.id_menu and menu.id_menu ='$id' and role.id_role='$id2'";    
        $datos = $this->_db->query($sql);
              //  $datos->setFetchMode(PDO::FETCH_ASSOC);

        return $datos->fetch();


    }

     public function permisos_ch($menu,$rol,$estado){

        $retVal = ($estado=='true') ? "1" : "0" ;

$sql = "SELECT COUNT(permisos.id_permisos) as numero FROM permisos WHERE id_menu = $menu   and id_role = $rol";
        $datos = $this->_db->query($sql);
$rs=$datos->fetch();
    if ($rs['numero']==0) {

        $sql="INSERT INTO permisos values(NULL,$menu,$rol,$retVal)";
        $this->_db->query($sql);
    }else{

$sql = "UPDATE permisos SET permiso = $retVal WHERE id_menu = $menu AND id_role= $rol";  

        $datos = $this->_db->query($sql);
    }



    }


    public function log($ip,$peticion,$usuario){


      
        $controlador=$peticion->getControlador();
        $metodo=$peticion->getMetodo();
       date_default_timezone_set('America/Caracas');
      
         $sql="INSERT INTO log values ('',$usuario,'$ip','$controlador','$metodo','".date("Y-m-d")."','".date("H:i:s")."')";
        $this->_db->query($sql);
        

    }


      
         public function gf($rs=false){

            if ($rs==false) {
                $sql = "DELETE FROM `switch` WHERE 1";
                $this->_db->query($sql);
            }
            else{
                $sql = "DELETE FROM `switch` WHERE 1";
                $this->_db->query($sql);
                $fecha=$rs['fecha'];
                $sql = "INSERT INTO `switch` (`id`, `accion`, `fecha`) VALUES ('',0,'$fecha')";
                $this->_db->query($sql);
            }

    }
             /*public function bloqueo(){

         
                $sql = "SELECT * FROM switch";
                $rs=$this->_db->query($sql);
                if(count($rs->fetchall())>0){
                  return true;
                }else
                {
                  return false;
                }

            
        

    }*/
              /*   public function bloqueo_datos(){

         
                $sql = "SELECT * FROM switch";
                $rs=$this->_db->query($sql);
               
                  return $rs->fetch();
                

            
        

    }*/

}

?>
