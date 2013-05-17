<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of revistas_model
 *
 * @author Ignacio
 */
class revistas_model extends CI_Model{
    private $insert = array();
    
    public function __construct()
    {
        $this->load->database();
        $this->insert = array(
            'nombre_pdf' => '',
            'nombre_imagen' => '',
            'titulo' => '',
            'mes' => 1,
            'año' => 1,
            'idusuario' => 0,
            'activo' => true
        );
    }
    
    public function upload($imagen, $pdf){
        //Paso a false la revista del mismo mes
        $update['activo'] = false;
        $this->db->where('activo', true);
        $this->db->where('mes', $this->input->post('mes'));
        $this->db->where('año', $this->input->post('ano'));
        $this->db->update('revistas', $update);
        
        //Inserto la nueva
        $insert['nombre_pdf'] = $pdf;
        $insert['nombre_imagen'] = $imagen;
        $insert['titulo'] = $this->input->post('titulo');
        $insert['mes'] = $this->input->post('mes');
        $insert['año'] = $this->input->post('ano');
        $insert['idusuario'] = $this->session->userdata('usuario')['idusuarios'];
        $insert['activo'] = true;
        
        return $this->db->insert('revistas', $insert);
    }
    
    public function verificar_existente($mes, $año)
    {
        $this->db->select('titulo');
        $this->db->order_by('idrevistas','desc');
        $query = $this->db->get_where('revistas', array('mes' => $mes, 'año' => $año, 'activo' => true));
        if(sizeof($query->row_array()) == 0)
            return false;
        return $query->row_array();
    }
    
    public function revista()
    {
        $this->db->select('nombre_pdf');
        $this->db->select('nombre_imagen');
        $this->db->select('titulo');
        $this->db->select('mes');
        $this->db->select('año');
        $this->db->order_by('año','desc');
        $this->db->order_by('mes','desc');
        $this->db->limit(1);
        $query = $this->db->get_where('revistas', array('activo' => true));
        
        return $query->row_array();
    }
}

?>
