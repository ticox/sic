<?php

class loginModel extends Model
{
    public function __construct() {
        parent::__construct();
    }
    
    public function getUsuario($usuario, $password)
    {

        // $datos = $this->_db->query( 
        //         "select * from usuario " .
        //         "where login = '$usuario' " .
        //         "and password = '" . Hash::getHash('sha1', $password, HASH_KEY) ."'"
        //         );

     $datos = $this->_db->query( 
                "select * from usuarios " .
                "where login = '$usuario' " .
                "and clave = '$password'");
        
        return $datos->fetch();
    }




 public function verificar_user($datos){
   
        $sql="SELECT usuarios.*, empresa.nombre_empresa, roles.nombre_rol from usuarios, empresa, empresa_usuario, roles where usuarios.id_usuario=empresa_usuario.id_usuario and empresa.id_empresa=empresa_usuario.id_empresa and usuarios.id_role=roles.id_rol and usuarios.id_usuario=(SELECT id_usuario from usuarios where login='".$datos['usuario']."' and clave='".$datos['clave']."')";
        $rs = $this->_db->query($sql);
        $res=$rs->fetchall();

       $reg=count($res);
      if ($reg<='0'){
        $res=0;
        return $res;
      }else{
        return $res;
      }
        

   }
}
?>
