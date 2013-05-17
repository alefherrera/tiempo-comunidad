<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of news
 *
 * @author Ignacio
 */
class news extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('news_model');
    }
    public function index()
    {
        $data['news'] = $this->news_model->get_news();
        
	$data['title'] = 'Noticias';

	$this->load->view('templates/header', $data);
	$this->load->view('news/index', $data);
	$this->load->view('templates/footer');
    }
    public function view($slug)
    {
	$data['news_item'] = $this->news_model->get_news($slug);

	if (empty($data['news_item']))
	{
		show_404();
	}

	
	$data['title'] = $data['news_item']['title'];

	$this->load->view('templates/header', $data);
	$this->load->view('news/view', $data);
	$this->load->view('templates/footer');
    }
    
    
}

?>
