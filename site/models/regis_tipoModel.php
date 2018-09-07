<?php

class regis_tipoModel extends Model
{
    public function __construct() {
        parent::__construct();
    }
    


public function traer_tipo(){

echo $sql = "SELECT * FROM `tipo` \n"
    . "ORDER BY `tipo`.`nombre_tipo` DESC";

 $datos=$this->_db->query($sql);
return $datos->fetchall();

}


/*public function traer_emp(){

$sql = "select empresa.*,COUNT(persona.id_persona) as mun_socios from empresa\n"
    . "left join persona on empresa.id_emp=persona.id_empresa\n"
    . "GROUP by empresa.id_emp \n"
    . "ORDER BY `empresa`.`id_emp` DESC";

 $datos=$this->_db->query($sql);
      
return $datos->fetchall();




}*/


public function actualizar_per($datos){

 $sql="INSERT INTO `persona`  VALUES (NULL,'".$datos['nacionalidad']."', '".$datos['productora']."', '".$datos['cedula']."', '".$datos['rif']."', UPPER('".$datos['nombres']."', UPPER('".$datos['apellidos']."'), '".$datos['telefono']."', UPPER('".$datos['direccion']."'), '".$datos['codigo']."', '".$datos['serial']."', '".$datos['certificado_medico']."');";

 $this->_db->query($sql);
      

}


public function guardar_tipo($datos){

 echo $sql="INSERT INTO `tipo`  VALUES (NULL,'".$datos['nombre_tipo']."');";

 $this->_db->query($sql);
      

}


}

?>


