<?php


class principalController extends Controller
{
	
	private $_index;
    public function __construct() {
        parent::__construct();
  	 $this->_index=$this->loadModel('principal');	
      
    }

    public function index()
    {


			
			$this->_view->setJs(array('js'));
			$this->_view->setCss(array('css'));
        		$this->_view->titulo = 'COTEDEM';

		$this->_view->renderizar('index');
			
	}

	public function enviar_email(){



     $this->getLibrary('class.phpmailer');
            
			$email_user = "info@cotedem.com";
			$email_password = "Cotedem@2018";
			$asunto = $_GET['asunto'];
			$nombre = $_GET['nombre'];
			$mensaje = $_GET['mensaje'];
			$correo = $_GET['correo'];
			$phpmailer = new PHPMailer();

			// ---------- Datos de la cuenta de correo -----------------------------
			$phpmailer->Username = $email_user;
			$phpmailer->Password = $email_password; 
			//---------------------------------------------------------------------
			$phpmailer->SMTPSecure = 'ssl';
			$phpmailer->Host = "box308.bluehost.com";
			$phpmailer->Port = 465;
			//$phpmailer->SMTPDebug = 2;
			$phpmailer->IsSMTP();
			$phpmailer->SMTPAuth = true;

			$phpmailer->setFrom($phpmailer->Username,$nombre);
			$phpmailer->AddAddress("info@cotedem.com");
			$phpmailer->Subject =$asunto; 

			$phpmailer->Body .="<h1 style='color:#000;'>".$nombre.":</h1>";
			$phpmailer->Body .= "<h3>".$mensaje." </br></br> ".$correo."</h3>";

			$phpmailer->AddAttachment($mensaje, "attach1");
			$phpmailer->AddBCC("info@cotedem.com", "bcc1");
			$phpmailer->IsHTML(true);
			$enviado = $phpmailer->Send();
			if($enviado) {
			    echo 'Email Enviado Exiosamente';
			}
       


   }

	  
}

?>