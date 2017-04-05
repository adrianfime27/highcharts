<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Workmodel extends CI_Model {

/**
* Invocar al constructor de la superclase CI_Model
*  Me permite cargar la base de datos
*/
public function __construct() 
     {
           parent::__construct(); 
           $this->load->database();
     }

/**
*    Método para insertar clave, nombre, sueldo en la tabla  workers
*/

public function insertWork($tclave,$tnombre, $tsueldo)
{
   $this->db->set('clave',$tclave)
            ->set('nombre',$tnombre)
            ->set('sueldo',$tsueldo)
        ->insert('wokers');     
} 



/**
*Método para consultar un trabajador
*/
public function consultaWorker($tclave)
{
       
 $query = $this->db->get_where('wokers',array('clave' => $tclave));
 if($query->num_rows() > 0 )
 {
   return $query->row();
 }
    
}


/** Devuelve la lista de trabajadores que se encuentran en la 
 * tabla workers 
 */

 function obtenerListaTrabajadores()
  {
    $this->load->database();
    $trabajadores = $this->db->get('wokers'); //select * from workers;

    return $trabajadores->result();
 }








public function modifyWorker($tclave,$tnombre, $tsueldo)
{

	
}

public function delWorker($tclave,$tnombre, $tsueldo)
{

	
}


}