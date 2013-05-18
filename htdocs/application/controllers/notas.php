<?php
class notas extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        
        $this->load->helper(array('form', 'url'));
        $this->load->model('revistas_model');
        $this->load->library('common');
    }
    
    public function view($mes = '', $año = '')
    {
        if($mes == '')
            $mes = date('m');
        if($año == '')
            $año = date('Y');
        
	$this->data['title'] = ucfirst($page);
        //$revista = $this->revistas_model->revista($mes, $año);
        //$this->data['nombre_imagen'] = $revista['nombre_imagen'];
        //$this->data['nombre_pdf'] = $revista['nombre_pdf'];
        //$this->data['titulo'] = $revista['titulo'];
        
        $this->load->template('pages/notas.php', $this->data);
    }
}

?>
