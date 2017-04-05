<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MiControlador extends CI_Controller {

	 
    /**
    * Función para lanzar la vista hola mundo
    */
	public function index(){
		$this->load->view('capturaNumeros_view');
	}

    /**
    * Funcion para enviar datos de un controlador a la vista
    */
    public function senData(){

     // Declarar arreglo
     $misdatos['clave']= "001";
     $misdatos['nombre']= "Leonel Messi";
     $misdatos['sueldo']= "9999.23"; 

     //Enviar misdatos a la vista
     $this->load->view('holaMundo_view', $misdatos);



    }

    /**
    * Funcion para recibir datos enviados por la vista
    */
    public function recibirdatos()
    {
     // Recuperamos los datos enviados por la vista
    $n1 = $this->input->post('num1');
    $n2 = $this->input->post('num2');

    // Pregunto que operación seleccionó el usuario
    if (isset($_POST['btnSuma'])) {
      //Realizamos la operación de suma
      $suma = $n1+$n2;
      // Declarar un array para enviar el resultado a un vista
      $res = array('resop' => $suma);
      // Invocamos la vista de resultado
      $this->load->view('resultado_view', $res);

    }
    elseif (isset($_POST['btnResta'])) {
      //Realizamos la operación de suma
      $resta = $n1-$n2;
      // Declarar un array para enviar el resultado a un vista
      $res = array('resop' => $resta);
      // Invocamos la vista de resultado
      $this->load->view('resultado_view', $res);
    }
    elseif (isset($_POST['btnMultiplica'])) {
      //Realizamos la operación de suma
      $mul = $n1*$n2;
      // Declarar un array para enviar el resultado a un vista
      $res = array('resop' => $mul);
      // Invocamos la vista de resultado
      $this->load->view('resultado_view', $res);
    }
    elseif (isset($_POST['btnDivide'])) {
      //Realizamos la operación de suma
      $divide = $n1/$n2;
      // Declarar un array para enviar el resultado a un vista
      $res = array('resop' => $divide);
      // Invocamos la vista de resultado
      $this->load->view('resultado_view', $res);
    }



  }



    

}
