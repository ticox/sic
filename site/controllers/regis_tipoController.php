<?php


class regis_tipoController extends Controller
{
	
	private $_index;
   	 public function __construct() {
        parent::__construct();
  	 $this->_index=$this->loadModel('regis_tipo');	
  
    }

    public function index()
    {


			
			$this->_view->setJs(array('js'));
			$this->_view->setCss(array('css'));
        	$this->_view->titulo = 'EPS - Registro de Tipo de Producción';
			
			$this->_view->renderizar('index');
	}


	/*public function traer_tipo(){


	echo json_encode($this->_index->traer_tipo();

	}*/

	public function guardar_tipo(){



		$this->_index->guardar_tipo($_GET);

	}

	  
}

?>