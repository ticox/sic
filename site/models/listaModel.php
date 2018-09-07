<?php

class listaModel extends Model
{
    public function __construct() {
        parent::__construct();
    }
    



public function count_emp(){
    $sql="SELECT COUNT(*) as conteo FROM `empresa`";
    $datos=$this->_db->query($sql);
        


    return $datos->fetch(); 
}

public function prueba(){

echo $sql="insert  into `persona` values(43,343,4,34,34)";


      if ($datos=$this->_db->query($sql)) {
      		print_r($datos->fetchall());
      }else{

      	echo 'error';
      }






}

public function traer_socios($id){

 $sql="SELECT * from persona where id_empresa='$id'";


      if ($datos=$this->_db->query($sql)) {
          return $datos->fetchall();
      }else{

       // echo 'error';
      }






}

public function eliminar($id){

echo $sql="delete from empresa where id_emp=$id";


     

$this->_db->query($sql);






}

}?>
