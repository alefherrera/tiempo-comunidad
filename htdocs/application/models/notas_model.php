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
class notas_model extends CI_Model {

    public function __construct() {
        
    }

    public function cantidad_notas() {
        $cantidad = $this->db->count_all_results('notas');
        if ($cantidad == 0) {
            return false;
        }
        return $cantidad;
    }

    public function notas($pagina = 1, $cant_pag) {
        if ($pagina <= 0)
            return false;

        $campos = "idnota, titulo, idusuario, autor, fecha_alta fecha, bajada, DATE_FORMAT(fecha_alta, '%d/%m/%Y') fecha_alta, imagen";
        $this->db->select($campos, false);
        $this->db->order_by('fecha', 'desc');

        $query = $this->db->get('notas', $cant_pag, ($pagina - 1) * $cant_pag);
        return $query->result_array();
    }

    public function nota($idnota) {
        if ($idnota == 0)
            return false;

        $campos = "idnota, titulo, idusuario, autor, fecha_alta fecha, bajada, contenido, DATE_FORMAT(fecha_alta, '%d/%m/%Y') fecha_alta, imagen";
        $this->db->select($campos, false);
        $query = $this->db->get_where('notas', array('idnota' => $idnota));
        return $query->row_array();
    }

    public function nueva_nota($idnota, $imagen) {
        if ($idnota != 0) {
            $insert['idnota'] = $idnota;
        }
        $insert['titulo'] = $this->input->post('titulo');
        $insert['imagen'] = $imagen;
        $insert['contenido'] = $this->input->post('contenido');
        $insert['idusuario'] = $this->session->userdata('usuario')['idusuarios'];
        $insert['autor'] = $this->input->post('autor');
        $insert['bajada'] = $this->input->post('bajada');

        $this->db->insert('notas', $insert);

        return $this->db->insert_id();
    }

    public function editar($idnota, $imagen, $fecha) {
        $this->db->trans_start();
        
        $this->db->where('idnota', $idnota);
        $this->db->delete('notas');
        
        if ($idnota != 0) {
            $insert['idnota'] = $idnota;
        }
        $insert['titulo'] = $this->input->post('titulo');
        $insert['imagen'] = $imagen;
        $insert['contenido'] = $this->input->post('contenido');
        $insert['idusuario'] = $this->session->userdata('usuario')['idusuarios'];
        $insert['autor'] = $this->input->post('autor');
        $insert['bajada'] = $this->input->post('bajada');
        if(!($fecha == false)){
            $insert['fecha_alta'] = $fecha;
        }
        
        $this->db->insert('notas', $insert);
        $return = $this->db->insert_id();
        $this->db->trans_complete();
        
        return $return;
    }

    public function eliminar($idnota) {
        $this->db->where('idnota', $idnota);
        $this->db->delete('notas');
    }

}

?>
