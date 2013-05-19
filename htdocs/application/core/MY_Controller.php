<?php
class MY_Controller extends CI_Controller{
    private $path;
    protected $data = array();

    function __construct()
    {
        parent::__construct();
        $this->load->helper('cookie');
        $this->load->model('usuarios_model');
        
        //Si ya esta en sesion el usuario
        if($this->session->userdata('usuario') != false)
            $this->data['usuario'] = $this->session->userdata('usuario');
        //Si no esta en sesion el usuario me fijo las cookies
        elseif($this->input->cookie('usuario') == false)
            $this->data['usuario'] = false;
        //Lo traigo de cookies
        else{
            $usuario = $this->input->cookie('usuario');
            $password = $this->input->cookie('password');
            $query = $this->usuarios_model->get_usuario_nombre($usuario);
            
            if(!($this->encrypt->decode($password) == $this->encrypt->decode($query['password'])))
                return;
            $this->session->set_userdata('usuario', $query);
            $this->data['usuario'] = $this->session->userdata('usuario');
        }
        
    }
    
    public function login()
    {
        $this->load->library('user_agent');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('usuarios_model');
        
	$this->form_validation->set_rules('usuario', 'Usuario', 'required');
	$this->form_validation->set_rules('password', 'Contraseña', 'required');
        
        if($this->form_validation->run())
        {
            $usuario = $this->input->post('usuario');
            $password = $this->input->post('password');
            $recordar = $this->input->post('recordar');
            
            $query = $this->usuarios_model->get_usuario_nombre($usuario);
            if(count($query) == 0)
                $this->data['error_login'] = 'Nombre de usuario incorrecto';
            elseif($password != $this->encrypt->decode($query['password']))
                $this->data['error_login'] = 'Contraseña incorrecta';
            else
            {
                //Logueado correcto!
                $this->session->set_userdata('usuario', $query);
                if($recordar){
                    //$this->input->set_cookie($cookie);
                    setcookie('usuario', $usuario, 0, '/');
                    setcookie('password', $this->encrypt->encode($password), 0, '/');
                }
                //$data['usuario'] = $this->session->userdata('usuario');
            }
            
        }
        else
            $this->data['error_login'] = validation_errors();
        $this->data['usuario'] = $this->session->userdata('usuario');
        redirect($this->agent->referrer());
    }
    
    public function logout()
    {
        $this->load->library('user_agent');
        setcookie('usuario', '', time()-3600, '/');
        setcookie('password', '', time()-3600, '/');
        $this->data['usuario'] = false;
        $this->session->set_userdata('usuario', false);
        redirect($this->agent->referrer());
    }
}

?>
