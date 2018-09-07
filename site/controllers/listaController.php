<?php

class listaController extends Controller
{
	
	private $_index;
   	 public function __construct() {
        parent::__construct();
  	 $this->_index=$this->loadModel('regis_per');
  	  $this->_index2=$this->loadModel('lista');	
      
    }

    public function index()
    {


			
			$this->_view->setJs(array('js'));
			$this->_view->setCss(array('css'));
        	$this->_view->titulo = 'EPS - Lista de empresas';
        	$res=$this->_index->traer_emp();

        	//print_r($res);
        	for ($i=0; $i <count($res) ; $i++) { 
        		
        	$res[$i]['resultado']=$this->_index2->traer_socios($res[$i]['id_emp']);

        	}
        	$this->_view->lista=$res;

        	//$this->_index->prueba();

        	//print_r($res);

			$this->_view->renderizar('index');
							
			
	}

	public function eliminar()
    {


			$this->_index2->eliminar($_GET['id']);
			$this->_view->setJs(array('js'));
			$this->_view->setCss(array('css'));
        	$this->_view->titulo = 'lista de empresas';
        	$this->_view->lista=$this->_index->traer_emp();
			$this->_view->renderizar('index');
    	
			
	}
	
	


	  
}

?>