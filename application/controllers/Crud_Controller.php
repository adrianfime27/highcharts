<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_Controller extends CI_Controller {

	 
    /**
    * Función para lanzar la vista para capturar los datos del trabajador
    */
	public function index(){
		$this->load->view('menuprincipal_view');
	}

  /**
  * Funcion para invocar vista de la consulta
  */
  public function callConsulta(){
    $this->load->view('consultaTrabajadores_view');
  }

  /**
  funcion para invocar vista de captura de trabjadores
  */
  public function callAgregar(){
  
$this->load->view('capturaTrabajadores_view');
  }
  public function modifyWork($tclave,$tnombre,$tsueldo){
  
  }

    /**
    * Funcion para recibir datos del trabajador enviado por la vista
    * capturaTrabajadores
    */
  public function callInsertar()
  {
     // Recuperamos los datos enviados por la vista mediante post
     $clave = $this->input->post('code');
     $nombre = $this->input->post('name');
     $sueldo = $this->input->post('salary');

     // Cargamos el modelo
     $this->load->model('workmodel');
     //Enviamos datos a la función:
     $this->workmodel->insertWork($clave, $nombre, $sueldo);
    
  }

 /**
    * Funcion para consultar trabajadores por clave
    */
  public function consultaWorker()
  {
     // Recuperamos los datos enviados por la vista mediante post
     $clave = $this->input->post('code');
      // Cargamos el modelo
     $this->load->model('workmodel');
     //Invocamos funcion en el modelo para buscar trabajador
     $trab = $this->workmodel->consultaWorker($clave);
     //Convertirlo a array
     $datos['clave']= $trab->clave;
     $datos['nombre']= $trab->nombre;
     $datos['sueldo']= $trab->sueldo;
     //Invocamos vista para enviarle los datos
     $this->load->view('consultaRes_view', $datos);    
  }
  /**
  * Método para crear un reporte
  */
  public function reporte()
  {
    // Se carga el modelo workmodel
    $this->load->model('workmodel');
    // Se carga la libreria fpdf
    $this->load->library('pdf');
 
    // Se obtiene la lista de trabajadores de la tabla workers
    $trabajadores = $this->workmodel->obtenerListaTrabajadores();
 
    // Creamos un objeto pdf
    $this->pdf = new Pdf();
    // Agregamos una página
    $this->pdf->AddPage();
    // Define el alias para el número de página que se imprimirá en el pie
    $this->pdf->AliasNbPages();
 
    /* Se define el titulo, márgenes izquierdo, derecho y
     * el color de relleno predeterminado
     */
    $this->pdf->SetTitle("Lista de Trabajadores");
    $this->pdf->SetLeftMargin(15);
    $this->pdf->SetRightMargin(15);
    $this->pdf->SetFillColor(200,200,200);
 
    // Se define el formato de fuente: Arial, negritas, tamaño 9
    $this->pdf->SetFont('Arial', 'B', 9);
    /*
     * TITULOS DE COLUMNAS
     *
     * $this->pdf->Cell(Ancho, Alto,texto,borde,posición,alineación,relleno);
     */
 
    $this->pdf->Cell(15,7,'Clave','TBL',0,'C','1');
    $this->pdf->Cell(40,7,'Nombre','TB',0,'L','1');
    $this->pdf->Cell(15,7,'Sueldo','TB',0,'L','1');
    
    $this->pdf->Ln(7);
    // La variable $x se utiliza para mostrar un número consecutivo
    $x = 1;
    foreach ($trabajadores as $trabs) {
      // se imprime el numero actual y despues se incrementa el valor de $x en uno
      $this->pdf->Cell(15,5,$x++,'BL',0,'C',0);
      // Se imprimen los datos de cada alumno
      $this->pdf->Cell(25,5,$trabs->clave,'B',0,'L',0);
      $this->pdf->Cell(25,5,$trabs->nombre,'B',0,'L',0);
      $this->pdf->Cell(25,5,$trabs->sueldo,'B',0,'L',0);
      
      //Se agrega un salto de linea
      $this->pdf->Ln(5);
    }
    /*
     * Se manda el pdf al navegador
     *
     * $this->pdf->Output(nombredelarchivo, destino);
     *
     * I = Muestra el pdf en el navegador
     * D = Envia el pdf para descarga
     *
     */
    $this->pdf->Output("ListaTrabajadores.pdf", 'I');
  }
}





 



    


