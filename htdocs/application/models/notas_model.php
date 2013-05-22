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
        
        $campos = "idnota, titulo, idusuario, autor, fecha_alta fecha, CONCAT(LEFT(contenido, 200),'...') contenido, DATE_FORMAT(fecha_alta, '%d/%m/%Y') fecha_alta";
        $this->db->select($campos, false);
        $this->db->order_by('fecha','desc');
        $query = $this->db->get('notas', $cant_pag, ($pagina-1)*$cant_pag);
        return $query->result_array();
    }
    
    public function nota($idnota){
        if($idnota == 0)
            return false;
        
        $campos = "idnota, titulo, idusuario, autor, contenido, DATE_FORMAT(fecha_alta, '%d/%m/%Y') fecha_alta, imagen";
        $this->db->select($campos, false);
        $query = $this->db->get_where('notas', array('idnota' => $idnota, 'activo' => true));
        return $query->row_array();
    }
    
    public function nueva_nota($imagen){
        $insert['titulo'] = $this->input->post('titulo');
        $insert['imagen'] = $imagen;
        $insert['contenido'] = $this->input->post('contenido');
        $insert['idusuario'] = $this->session->userdata('usuario')['idusuarios'];
        $insert['activo'] = true;
        $insert['autor'] = $this->input->post('autor');
        
        $this->db->insert('notas', $insert);
        
        return $this->db->insert_id();
    }
}

?>
