<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of new_model
 *
 * @author Ignacio
 */
class notas_model extends CI_Model{
    public function __construct()
    {
        $this->load->database();
    }
    
    public function cantidad_notas(){
        $cantidad = $this->db->count_all_results('notas');
        if($cantidad == 0){
            return false;
        }
        return $cantidad;
    }
            
    public function notas($pagina = 1, $cant_pag)
    {
        if($pagina <= 0)
            return false;
        
        $campos = "idnota, titulo, idusuario, autor, CONCAT(LEFT(contenido, 200),'...') contenido, DATE_FORMAT(fecha_alta, '%d/%m/%Y') fecha_alta";
        $this->db->select($campos, false);
        $this->db->order_by('fecha_alta','desc');
        $query = $this->db->get('notas', $cant_pag, ($pagina-1)*$cant_pag);
        return $query->result_array();
    }
    
    public function nota($idnota){
        if($idnota == 0)
            return false;
        
        $campos = "idnota, titulo, idusuario, autor, contenido, DATE_FORMAT(fecha_alta, '%d/%m/%Y') fecha_alta";
        $this->db->select($campos, false);
        $query = $this->db->get_where('notas', array('idnota' => $idnota, 'activo' => true));
        return $query->row_array();
    }
}

?>
