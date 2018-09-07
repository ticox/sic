<?php

class regis_empModel extends Model
{
    public function __construct() {
        parent::__construct();
    }
    



public function cargar_muni($id){

$sql="SELECT * FROM `municipios` where id_estado=$id ";

$datos = $this->_db->query($sql);
      


return  $datos->fetchall();



}

public function traer_parroquia($id){

$sql="SELECT * FROM `parroquias` where id_municipio=$id ";

$datos = $this->_db->query($sql);
      


return  $datos->fetchall();



}



public function get_tipo(){

echo $sql = "SELECT * FROM `tipo`";

$datos = $this->_db->query($sql);
      

return  $datos->fetchall();

}

public function guardar_emp($datos){

$codigo=uniqid('2');

echo $sql="INSERT INTO `empresa`  VALUES (NULL,'$codigo', '".$datos['rif']."', '".$datos['razon_social']."','".$datos['codigo_sica']."', '".$datos['nro_registro']."','".$datos['clap']."', '".$datos['tipo']."', '".$datos['municipio']."', '".$datos['parroquia']."', '".$datos['direccion']."', '".$datos['poseec']."', '".$datos['poseep']."');";

 $this->_db->query($sql);
      





}

public function actualizar_emp($datos){



echo $sql="update empresa set  razon_social=   '".$datos['razon_social']."', codigo_sica= '".$datos['codigo_sica']."', nro_de_registro= '".$datos['nro_registro']."', clap= '".$datos['clap']."', tipo= '".$datos['tipo']."', municipio= '".$datos['municipio']."' , parroquia= '".$datos['parroquia']."', direccion='".$datos['direccion']."', poseec = '".$datos['poseec']."', poseep= '".$datos['poseep']."' where rif = '".$datos['rif']."' ";


 $this->_db->query($sql);
      





}

public function cargar($id){


 $sql="SELECT empresa.*,parroquias.parroquia as parroquiaa,municipios.municipio as municipioo FROM empresa,parroquias,municipios where id_emp=$id and empresa.municipio=municipios.id_municipio and parroquias.id_parroquia=empresa.parroquia ";

$datos = $this->_db->query($sql);
      $datos->setFetchMode(PDO::FETCH_ASSOC);
$this->datos_emp = $datos->fetchall();

//return  $datos->fetchall();



}

public function cargar_per(){


$sql="SELECT * FROM persona where id_empresa='".$this->datos_emp[0]['id_emp']."' ";

$datos = $this->_db->query($sql);
      $datos->setFetchMode(PDO::FETCH_ASSOC);
$this->datos_pers = $datos->fetchall();

//return  $datos->fetchall();



}

	public function info($id){

 $sql="SELECT * FROM empresa where id_emp='$id' ";

 $datos=$this->_db->query($sql);
 $datos->setFetchMode(PDO::FETCH_ASSOC);
 return $datos->fetch();




}



}

?>


