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

    public function rubros($idpadre = -1) {
        $this->db->select('idrubros, rubro');
        $this->db->order_by('rubro', 'asc');
        if ($idpadre != -1) {
            $this->db->where('idpadre', $idpadre);
        }
        $query = $this->db->get_where('rubros', array('activo' => true));
        return $query->result_array();
    }

    public function rubros_anunciantes($anunciante = 0) {
        $this->db->select('rubros_anunciantes.idrubros, rubro, idanunciantes, idpadre');
        $this->db->join('rubros', 'rubros_anunciantes.idrubros = rubros.idrubros');
        $this->db->order_by('idpadre', 'asc');
        $this->db->order_by('idanunciantes', 'asc');
        $this->db->order_by('rubro', 'asc');

        if ($anunciante != 0) {
            $this->db->where('idanunciantes', $anunciante);
        }
        $query = $this->db->get_where('rubros_anunciantes', array('activo' => true));
        return $query->result_array();
    }

    public function anunciantes($rubros) {
        $this->db->select("anunciantes.idanunciantes, nombre, web, logo, telefono, direccion, mail", false);
        $this->db->join("rubros_anunciantes", "rubros_anunciantes.idanunciantes = anunciantes.idanunciantes");
        $this->db->group_by("idanunciantes");
        $this->db->order_by('nombre', 'asc');
        if (count($rubros) > 0) {
            foreach ($rubros as $rubro) {
                $where .= "idrubros = " . $rubro;
                $where .= " OR ";
            }
            $where = substr($where, 0, count($where) - 5);
            var_dump($where);
            $this->db->where('(' . $where . ')', null, false);
        }


        $query = $this->db->get_where('anunciantes', array('anunciantes.activo' => true));

        $result = $query->result_array();
        for ($i = 0; $i < count($result); $i++) {
            $result[$i]['rubros'] = anunciantes_model::rubros_anunciantes($result[$i]['idanunciantes']);
        }

        return $result;
    }

    public function nuevo_anunciante($logo) {
        $insert['logo'] = $logo;
        $insert['nombre'] = $this->input->post('nombre');
        $insert['direccion'] = $this->input->post('direccion');
        $insert['telefono'] = $this->input->post('telefono');
        $insert['mail'] = $this->input->post('mail');
        $insert['web'] = $this->input->post('web');
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

        $this->db->trans_complete();

        return $anunciante;
    }

    public function eliminar($idanunciantes) {
        $data = array(
            'activo' => false
        );

        $this->db->where('idanunciantes', $idanunciantes);
        $this->db->update('anunciantes', $data);
    }

}

?>
