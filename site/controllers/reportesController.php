<?php


class reportesController extends Controller
{
	
	private $_index;
   	 public function __construct() {
        parent::__construct();
  	// $this->_index=$this->loadModel('regis_per');	
         $this->_index=$this->loadModel('regis_per');	
      
    }

    public function index()
    {


			
			$this->_view->setJs(array('js'));
			$this->_view->setCss(array('css'));
        		$this->_view->titulo = 'reportes';
        		$this->_view->_empresas=$this->_index->traer_emp2();
        		$this->_view->renderizar('index');
							
			
	}

	

	  
}

?>