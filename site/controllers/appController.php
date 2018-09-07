<?php


class appController extends Controller
{
	
	private $app;
	
	
    public function __construct() {

        Session::acceso();
        parent::__construct();
      $this->getLibrary('simpleimage');
      $this->app=$this->loadModel('app');
		
    }

    public function index()
    {

 
			$this->_view->setJs(array('js','etheme','ftheme','fileinput','sortable'));
			$this->_view->setCss(array('css','fileinput','theme'));
        	$this->_view->titulo = 'menus';

        	$menu=$this->app->traer_menus();
        	$role=$this->app->traer_roles();
        	$matris = Array();
        	for ($i=0; $i < count($menu) ; $i++) { 

        		for ($y=0; $y < count($role); $y++) { 

        					$vn=$this->app->traer_permisos($menu[$i]['id_menu'],$role[$y]['id_role']);
        	        		if ($vn=='') {
        	        			$matris[$i][$y]['permiso']='0';
        	        		}else{
        	        		$matris[$i][$y]=$this->app->traer_permisos($menu[$i]['id_menu'],$role[$y]['id_role']);
	
        	        		}
        	        		
        	        		}
        	}

                  
              			$this->_view->renderizar('index');		
	}


  
 public function guardar_publicacion_cliente()
        {
                $this->app->guardar_publicacion_cliente($_POST,$_FILES);
               
                $this->redireccionar('app');

        }

         public function guardar_publicacion_marca()
        {

                $this->app->guardar_publicacion_marca($_POST,$_FILES);
               
                $this->redireccionar('app');

        }

    function permisos_ch(){


        $this->app->permisos_ch($_GET['menu'],$_GET['rol'],$_GET['estado']);

    }

     public function buscar_servicios(){


    echo json_encode($this->app->buscar_servicios());


   }

   public function buscar_servicio(){


    echo json_encode($this->app->buscar_servicio($_POST));


   }

    public function servicio_modificado(){


    $this->app->servicio_modificado($_POST);


   }


   public function guardar_contactos(){


    $this->app->guardar_contactos($_POST);


   }


     public function guardar_usuario(){


        $this->app->guardar_usuario($_POST);


   }

    public function buscar_nosotros(){


    echo json_encode($this->app->buscar_nosotros());


   }


     public function guardar_nosotros(){


        $this->app->guardar_nosotros($_POST);
   }


    public function guardar_servicio(){


        $this->app->guardar_servicio($_POST);

   }


   public function eliminar_servicio(){


        $this->app->eliminar_servicio($_POST);

   }

   public function buscar_informacion(){


    echo json_encode($this->app->buscar_informacion());

   }


    public function guardar_mision(){


        $this->app->guardar_mision($_POST);
   }


    public function guardar_vision(){


        $this->app->guardar_vision($_POST);

   }


    public function guardar_preview(){


        $this->app->guardar_preview($_POST);

   }


    public function guardar_titulo(){


        $this->app->guardar_titulo($_POST);

   }




   /*-----------------------otras cosas------------------------*/


    function updonw(){
     $objeto=$this->loadModel('app');
       
       if ($_POST['accion']==0) {
            $objeto->gf($_POST);
       }else{
            $objeto->gf();
       }
    }
}


?>