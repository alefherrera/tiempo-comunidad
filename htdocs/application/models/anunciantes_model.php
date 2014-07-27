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
class anunciantes_model extends CI_Model {

    public function __construct() {
        
    }

    public function rubros($idpadre = -1, $idanunciante = 0) {
        $this->db->select('rubros.idrubros, rubro');
        $this->db->order_by('rubro', 'asc');
        if ($idpadre != -1) {
            $this->db->where('idpadre', $idpadre);
        }
        if ($idanunciante != 0) {
            $this->db->join("rubros_anunciantes", "rubros_anunciantes.idrubros = rubros.idrubros");
            $this->db->where('idanunciantes', $idanunciante);
        }
        $query = $this->db->get_where('rubros', array('activo' => true));

        return $query->result_array();
    }

    public function anunciantes($idanunciante = null, $rubros = array()) {
        $this->db->select("anunciantes.idanunciantes, 
            nombre, 
            web, 
            logo, 
            telefono, 
            direccion, 
            mail, 
            descripcion,
            GROUP_CONCAT(rubro SEPARATOR ' - ') as rubro,
            GROUP_CONCAT(rubros.idrubros SEPARATOR '-') as idrubros
            ", false);
        $this->db->join("rubros_anunciantes", "rubros_anunciantes.idanunciantes = anunciantes.idanunciantes");
        $this->db->join("rubros", "rubros_anunciantes.idrubros = rubros.idrubros");
        $this->db->group_by("idanunciantes");
        $this->db->order_by('nombre', 'asc');
        if (count($rubros) > 0) {
            $where = "";
            foreach ($rubros as $rubro) {
                $where .= "rubros_anunciantes.idrubros = " . $rubro;
                $where .= " OR ";
            }
            $where = substr($where, 0, count($where) - 5);
            $this->db->where('(' . $where . ')', null, false);
        }

        if ($idanunciante != null) {
            $this->db->where("anunciantes.idanunciantes", $idanunciante);
        }


        $query = $this->db->get_where('anunciantes', array('anunciantes.activo' => true));

        $result = $query->result_array();
        if ($idanunciante != null) {
            if (isset($result[0]))
                return $result[0];
            else
                return false;
        }

        return $result;
    }

    public function especiales($idanunciante = null) {
        $this->db->select("anunciantes_especiales.idanunciantes_especiales, 
            idanunciantes, 
            link, 
            imagen
            ", false);

        if ($idanunciante != null) {
            $this->db->where("anunciantes_especiales.idanunciantes", $idanunciante);
        }

        $query = $this->db->get_where('anunciantes_especiales', array('anunciantes_especiales.activo' => true));

        $result = $query->result_array();
        if ($idanunciante != null) {
            if (isset($result[0]))
                return $result[0];
            else
                return false;
        }

        return $result;
    }

    public function nuevo_anunciante($logo, $logo_especial = null) {
        $insert['logo'] = $logo;
        $insert['nombre'] = $this->input->post('nombre');
        $insert['direccion'] = $this->input->post('direccion');
        $insert['telefono'] = $this->input->post('telefono');
        $insert['mail'] = $this->input->post('mail');
        $insert['web'] = $this->input->post('web');
        $insert['descripcion'] = $this->input->post('descripcion');
        $rubros = json_decode($this->input->post('rubros'));

        $this->db->trans_start();
        $this->db->insert('anunciantes', $insert);
        $anunciante = $this->db->insert_id();

        $insert = array();
        //Insertar en la tabla intermedia
        foreach ($rubros as $rubro) {
            $insert['idanunciantes'] = $anunciante;
            $insert['idrubros'] = $rubro;
            $this->db->insert('rubros_anunciantes', $insert);
        }
        
        $insert = array();
        
        if($this->input->post('especial') != null && $this->input->post('especial') == true){
            $insert['idanunciantes'] = $anunciante;
            $insert['link'] = '/anunciantes/' + $anunciante;
            if($this->input->post('link') != ''){
                $insert['link'] = $this->input->post('link');
            }
            
            //SI NO LO ENCUENTRO EN ESPECIALES TENGO QUE BUSCARLO EN ANUNCIANTES
            $insert['imagen'] = $logo;
            if($logo_especial != ''){
                $insert['imagen'] = $logo_especial;
            }
            
            $this->db->insert('anunciantes_especiales', $insert);
        }
        $this->db->trans_complete();

        return $anunciante;
    }

    public function eliminar($idanunciantes) {
        $data = array(
            'activo' => false
        );

        $this->db->where('idanunciantes', $idanunciantes);
        $this->db->update('anunciantes', $data);
        
        $this->eliminar_especial($idanunciantes);
    }

    public function eliminar_especial($idanunciantes) {
        $data = array(
            'activo' => false
        );

        $this->db->where('idanunciantes', $idanunciantes);
        $this->db->update('anunciantes_especiales', $data);
    }

}

?>
