<?php
class Pages extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }
    
    public function view($page = 'home')
    {
        if ( ! file_exists('application/views/pages/'.$page.'.php'))
	{
            show_404();
	}
	$this->data['title'] = ucfirst($page); // Capitalize the first letter
	$this->data['error'] = '';
        
        $this->load->template('pages/' . $page . '.php', $this->data);
    }
}

?>
