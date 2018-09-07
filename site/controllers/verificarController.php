<?php

class verificarController extends Controller
{
    public function __construct() {
        parent::__construct();
         $this->_index=$this->loadModel('regis_emp');
    }
    
    public function index(){}
      public function info($id)
    {
       
       echo json_encode($this->_index->info($id));

    }

    
   
          
      
}

?>