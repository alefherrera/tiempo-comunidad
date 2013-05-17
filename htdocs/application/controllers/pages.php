<?php
class Pages extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('revistas_model');
    }
    public function index()
    {
        $data['title'] = 'index';
        $data['error'] = '';
        
        $this->load->view('templates/header', $data);
	$this->load->view('pages/home.php', $data);
	$this->load->view('templates/footer', $data);
    }
    
    public function view($page = 'home')
    {
        if ( ! file_exists('application/views/pages/'.$page.'.php'))
	{
            show_404();
	}

	$data['title'] = ucfirst($page); // Capitalize the first letter
	$data['error'] = '';
        
	$this->load->view('templates/header', $data);
	$this->load->view('pages/'.$page, $data);
	$this->load->view('templates/footer', $data);
    }
    
    public function do_upload()
    {
        $config['upload_path'] = './revista/';
        $config['allowed_types'] = 'gif|jpg|png|pdf';
        $config['max_size']	= '5000';
        
        
        
        $this->load->library('upload', $config);
        
        if ( ! $this->upload->do_upload())
        {
                $error = array('error' => $this->upload->display_errors());

                $this->load->view('pages/home', $error);
        }
        
        $data = array('upload_data' => $this->upload->data());
        $this->revistas_model->upload($data['upload_data']);
        
        $this->load->view('pages/upload_success', $data);
    }
}

?>
