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
class anunciantes_model extends CI_Model{
    public function __construct()
    {
        
    }
    public function rubros()
    {
        $this->db->select('idrubros, rubro');
        $this->db->order_by('rubro', 'asc');
        $query = $this->db->get_where('rubros', array('activo' => true));
        return $query->result_array();
    }
    public function anunciantes()
    {
        $this->db->select("*", false);
        $this->db->join('rubros','rubros.idrubros = anunciantes.idrubros');
        $this->db->order_by('rubro','asc');
        $this->db->order_by('nombre','asc');
        $query = $this->db->get_where('anunciantes', array('anunciantes.activo' => true));
        
        return $query->result_array();
    }
    
    public function nuevo_anunciante($logo){
        $insert['idrubros'] = $this->input->post('rubro');
        $insert['logo'] = $logo;
        $insert['nombre'] = $this->input->post('nombre');
        $insert['direccion'] = $this->input->post('direccion');
        $insert['telefono'] = $this->input->post('telefono');
        $insert['mail'] = $this->input->post('mail');
        $insert['web'] = $this->input->post('web');
        
        $this->db->insert('anunciantes', $insert);
        
        return $this->db->insert_id();
    }
    
    public function eliminar($idanunciantes)
    {
        $data = array(
               'activo' => false
            );
        
        $this->db->where('idanunciantes', $idanunciantes);
        $this->db->update('anunciantes', $data);
    }
}

?>
