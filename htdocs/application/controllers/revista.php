<?php
class revista extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        
        $this->load->helper(array('form', 'url'));
        $this->load->model('revistas_model');
        $this->load->library('common');
    }
    
    public function view($filtro_revista = '')
    {
        $this->data['title'] = 'Tiempo de la Comunidad';
        
        $revista = $this->revistas_model->revista();
        $this->data['nombre_imagen'] = $revista['nombre_imagen'];
        $this->data['nombre_pdf'] = $revista['nombre_pdf'];
        $this->data['titulo'] = $revista['titulo'];
        
        $this->load->template('pages/revista.php', $this->data);
    }
    
    public function ajax_verificar_existente($mes, $ano)
    {
        $revista = $this->revistas_model->verificar_existente($mes, $ano);
        if($revista == false)
        {
            echo 'false';
            return;
        }
        echo $revista['titulo'];
    }
    
    public function do_upload()
    {
        $config['upload_path'] = './revista/';
        $config['allowed_types'] = 'gif|jpg|png|pdf';
        $config['max_size'] = '10000';
        $config['remove_spaces'] = TRUE;
        
        $this->load->helper('file');
        $this->load->library('upload', $config);
        $this->load->library('form_validation');
        
        $this->data['error_upload'] = '';

        //Valido el formulario
        $this->form_validation->set_rules('titulo', "Titulo", 'required');
        
        if($this->form_validation->run() === FALSE)
        {
            $this->data['error_upload'] = validation_errors();
            $this->view();
            return;
        }
        $this->data['titulo_form'] = $this->input->post('titulo');
        
        //Manejo la subida de archivos
        $pdf = '';
        $imagen = '';
        
        $ferror = FALSE;
        $uploaded_files = $_FILES;
        foreach($uploaded_files as $key => $value){
            if($this->upload->do_upload($key))
            {
                $upload_data =  array('upload_data' => $this->upload->data());
                $this->data[$key] = array_merge($this->data, $upload_data);

                if($this->data[$key]['upload_data']['file_ext'] == '.pdf')
                    $pdf = $this->data[$key]['upload_data']['file_name'];
                elseif($this->data[$key]['upload_data']['file_ext'] != '.pdf')
                    $imagen = $this->data[$key]['upload_data']['file_name'];
            }else{
                $ferror = TRUE;
            }
        }
        
        if($pdf == ''){
            $this->data['error_upload'] .= '<br/>Tiene que subir un archivo ".pdf"';
            $ferror = TRUE;
        }
        if($imagen == ''){
            $this->data['error_upload'] .= '<br/>Tiene que subir un archivo de imágen';
            $ferror = TRUE;
        }
        
        if($ferror){
            if($imagen != '')
                unlink('./revista/'.$this->data['imagen']['upload_data']['file_name']);
            if($pdf != '')
                unlink('./revista/'.$this->data['pdf']['upload_data']['file_name']);
            $this->view();
        }
        else{
            $this->revistas_model->upload($imagen, $pdf);
            $this->load->view('pages/upload_success', $this->data['imagen']);
        }
    }
}

?>
