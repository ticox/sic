<?php


class subirController extends Controller
{
	
	
	
    public function __construct() {

        Session::acceso();

        parent::__construct();

		
    }

    public function index()
    {

 
			$this->_view->setJs(array('js'));
			$this->_view->setCss(array('css'));
        	$this->_view->titulo = 'Subir Mi Informacion';
			$this->_view->renderizar('index');		
	}


}


?>