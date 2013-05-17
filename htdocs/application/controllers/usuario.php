<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of about
 *
 * @author Ignacio
 */
class usuario extends MY_Controller{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('usuarios_model');
        $this->load->library('encrypt');
    }
    
    public function view($nombre_usuario, $password)
    {
        $this->load->helper(array('form', 'url'));
        if($password != "")
            $this->usuarios_model->nuevo_usuario($nombre_usuario, $password);
        else
        {
            $usuario = $this->usuarios_model->get_usuario_nombre($nombre_usuario);
            $password = $this->encrypt->decode($usuario['password']);
        }
        
        $this->$data['title'] = 'Nuevo Usuario';
        $this->$data['error'] = '';
        $this->$data['usuario'] = $nombre_usuario;
        $this->$data['password'] = $password;

        $this->load->template('pages/usuario.php', $data);
    }
    
//    public function login()
//    {
//        $data = array();
//        $this->load->helper('form');
//        $this->load->helper('url');
//        $this->load->library('form_validation');
//        
//        
//	$this->form_validation->set_rules('usuario', 'Usuario', 'required');
//	$this->form_validation->set_rules('password', 'Contraseña', 'required');
//        
//        if($this->form_validation->run())
//        {
//            $usuario = $this->input->post('usuario');
//            $password = $this->input->post('password');
//            
//            $query = $this->usuarios_model->get_usuario_nombre($usuario);
//            if(count($query) == 0)
//                $data['error_login'] = 'Nombre de usuario incorrecto';
//            elseif($password != $this->encrypt->decode($query['password']))
//                $data['error_login'] = 'Contraseña incorrecta';
//            else
//            {
//                //Logueado correcto!
//                $this->session->set_userdata('usuario', $query);
//                //$data['usuario'] = $this->session->userdata('usuario');
//            }
//            
//        }
//        else
//            $data['error_login'] = validation_errors();
//        echo $this->session->userdata('usuario')['nombre_usuario'];
//        $this->load->library('../controllers/revista');
//        $this->revista->view($data);
//    }
}

?>
