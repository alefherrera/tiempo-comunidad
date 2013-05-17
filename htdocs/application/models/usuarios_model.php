<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of usuarios_model
 *
 * @author Ignacio
 */
class usuarios_model extends CI_Model{
    private $insert = array();
    
    public function __construct()
    {
        $this->load->database();
        $this->load->library('encrypt');
        
        $this->insert = array(
            'nombre_usuario' => '',
            'password' => '',
            'idnivel' => '',
        );
    }
    
    
    public function nuevo_usuario($usuario, $password){
        $insert['nombre_usuario'] = $usuario;
        $insert['password'] = $this->encrypt->encode($password);
        $insert['idnivel'] = 1;
        
        return $this->db->insert('usuarios', $insert);
    }
    
    public function get_usuario_nombre($usuario = FALSE){
        if($usuario === FALSE)
        {
            $query = $this->db->get('usuarios');
            return $query->result_array();
        }
        $query = $this->db->get_where('usuarios', array('nombre_usuario' => $usuario));
        
        return $query->row_array();
    }

}

?>
