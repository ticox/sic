<?php

class pdfController extends Controller
{
    private $_pdf;
	private $_alumno;
    public function __construct() {
        parent::__construct();
        $this->getLibrary('fpdf');
        $this->getLibrary('qr/qrlib');
		$this->modelo=$this->loadModel('regis_emp');
		
        $this->_pdf = new fpdf;
    }
    
    public function index(){}
	
    public function comprobante_registro()
    {

			

    		$this->modelo->cargar($_GET['id']);
    		$this->modelo->cargar_per();
			//print_r($this->modelo);

			$this->_pdf->AddPage();
			$this->_pdf->SetFont('Arial','B',12);

			QRcode::png(BASE_URL."verificar/info/".$this->modelo->datos_emp[0]['id_emp'],"public/img/qr/".$this->modelo->datos_emp[0]['id_emp'].".png",'H',32,12);
			$this->_pdf->Image(BASE_URL."/public/img/qr/".$this->modelo->datos_emp[0]['id_emp'].".png",178,60,45);



			$this->_pdf->SetLineWidth(0.5);
			$this->_pdf->Line(10,60 ,($this->_pdf->w)-20, 60);
			$this->_pdf->Line(10,60 ,10,100 );
			$this->_pdf->Line(10,100 ,($this->_pdf->w)-20,100 );
			$this->_pdf->Line(($this->_pdf->w)-20, 60 ,($this->_pdf->w)-20,100 );
			$this->_pdf->Line(($this->_pdf->w)/2, 60 ,($this->_pdf->w)/2,100 );
			$this->_pdf->SetLineWidth(0.2);

			$this->_pdf->SetFont('Arial','B',12);
			$this->_pdf->Cell(($this->_pdf->w)-20,8, utf8_decode('PLANILLA DE REGISTRO'),0,1,'C');
			$this->_pdf->Ln(5);
			$this->_pdf->SetFont('Arial','',10);
		
			$this->_pdf->SetFont('Arial','B',12);
			$this->_pdf->Ln(1);
			$this->_pdf->Cell(190,4, utf8_decode("DATOS DE LA EMPRESA PRODUCTORA"),0,1,'L');
			$this->_pdf->Ln(8);
			$this->_pdf->SetFont('Arial','',8);
			$this->_pdf->Cell((($this->_pdf->w-20)/2)+33,4, utf8_decode('RAZON SOCIAL: '.$this->modelo->datos_emp[0]['razon_social']),0,0,'L');
			$this->_pdf->Cell(50,4, utf8_decode('Codigo QR'),1,1,'C');
			$this->_pdf->Cell(($this->_pdf->w-20)/2,4, utf8_decode('DIRECCION: '.$this->modelo->datos_emp[0]['direccion']),0,1,'L');
			$this->_pdf->Cell(($this->_pdf->w-20)/4,4, utf8_decode('RIF:'.$this->modelo->datos_emp[0]['rif']),0,0,'L');
			$this->_pdf->Cell((($this->_pdf->w-20)/4),4, utf8_decode('NUMERO DE REGISTRO:'.$this->modelo->datos_emp[0]['nro_de_registro']),0,1,'L');
			
			

			
			
			
			$this->_pdf->Cell(($this->_pdf->w-20)/4,4, utf8_decode('TIPO DE PRODUCTOR: '.$this->modelo->datos_emp[0]['tipo']),0,0,'L');
		
			$this->_pdf->Cell(($this->_pdf->w-20)/4,4, utf8_decode('MUNICIPIO: '.$this->modelo->datos_emp[0]['municipioo']),0,1,'L');



			$this->_pdf->Cell(($this->_pdf->w-20)/4,4, utf8_decode('PARROQUIA: '.$this->modelo->datos_emp[0]['parroquiaa']),0,0,'L');

			

			
			$this->_pdf->Cell(($this->_pdf->w-20)/4,4, utf8_decode('POSEE CERTIFICADO DEL INCES: '.$this->modelo->datos_emp[0]['poseec']),0,1,'L');

			
			$this->_pdf->Cell(($this->_pdf->w-20)/4,4, utf8_decode('POSEE PERMISO SANITARIO: '.$this->modelo->datos_emp[0]['poseep']),0,1,'L');
			$this->_pdf->Cell(($this->_pdf->w-20)/4,4, utf8_decode('CODIGO SICA: '.$this->modelo->datos_emp[0]['codigo_sica']),0,1,'L');
			
			
			
		





			$this->_pdf->SetFont('Arial','B',12);
			$this->_pdf->Ln(15);
			$this->_pdf->Cell(190,4, utf8_decode("INTEGRANTES Y RESPONSABLES"),0,1,'L');
			$this->_pdf->Ln(3);
			$this->_pdf->SetFont('Arial','',8);

			
			
			$this->_pdf->Cell(20,4, utf8_decode('RIF'),1,0,'C');
			$this->_pdf->Cell(54,4, utf8_decode('NOMBRES'),1,0,'C');
			$this->_pdf->Cell(55,4, utf8_decode('APELLIDOS'),1,0,'C');
			$this->_pdf->Cell(26,4, utf8_decode('TELEFONO'),1,0,'C');
			
			$this->_pdf->Cell(22,4, utf8_decode('CODIGO'),1,0,'C');
			$this->_pdf->Cell(22,4, utf8_decode('SERIAL'),1,0,'C');
			$this->_pdf->Cell(50,4, utf8_decode('POSEE CERTIFICADO MEDICO?'),1,1,'C');


			for ($i=0; $i < count($this->modelo->datos_pers) ; $i++) { 
				
			$this->_pdf->Cell(20,4, utf8_decode($this->modelo->datos_pers[$i]['rif']),1,0,'L');
			$this->_pdf->Cell(54,4, utf8_decode($this->modelo->datos_pers[$i]['nombres']),1,0,'L');
			$this->_pdf->Cell(55,4, utf8_decode($this->modelo->datos_pers[$i]['apellidos']),1,0,'L');
			$this->_pdf->Cell(26,4, utf8_decode($this->modelo->datos_pers[$i]['telefono']),1,0,'L');
			$this->_pdf->Cell(22,4, utf8_decode($this->modelo->datos_pers[$i]['codigo']),1,0,'L');
			$this->_pdf->Cell(22,4, utf8_decode($this->modelo->datos_pers[$i]['serial']),1,0,'L');
			$this->_pdf->Cell(50,4, utf8_decode($this->modelo->datos_pers[$i]['certificado_medico']),1,1,'L');
			$this->_pdf->Cell(($this->_pdf->w)-30,4, utf8_decode('DIRECCION: '.$this->modelo->datos_pers[$i]['direccion']),1,1,'C');



			}
			

			
			$this->_pdf->Output();
	}
	

}

?>
