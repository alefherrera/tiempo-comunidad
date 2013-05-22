<?php
class notas extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        
        $this->load->helper(array('form', 'url'));
        $this->load->model('notas_model');
        $this->load->library('common');
    }
    
    public function view($pagina = 1)
    {
//        if($mes == '')
//            $mes = date('m');
//        if($año == '')
//            $año = date('Y');
        
	$this->data['title'] = 'Notas';
        //$revista = $this->revistas_model->revista($mes, $año);
        //$this->data['nombre_imagen'] = $revista['nombre_imagen'];
        //$this->data['nombre_pdf'] = $revista['nombre_pdf'];
        //$this->data['titulo'] = $revista['titulo'];
        $this->data['cantidad'] = $this->notas_model->cantidad_notas();
        $cant_pagina = 5;
        if($this->data['cantidad'] != 0)
            $this->data['notas'] = $this->notas_model->notas($pagina, $cant_pagina);
//        echo ceil($this->data['cantidad']/5);
        
        $paginas_mostrar_max = 5;
        
        if(ceil($this->data['cantidad']/$cant_pagina) <= $paginas_mostrar_max)
            $paginas_mostrar_max = ceil($this->data['cantidad']/$cant_pagina);
        
        $medio = round($paginas_mostrar_max/2, 0, PHP_ROUND_HALF_UP);

        for($i = 0; $i <= $paginas_mostrar_max -1; $i++){
            if($pagina <= $medio || $paginas_mostrar_max >= ceil($this->data['cantidad']/$cant_pagina)){
                $numeros[$i] = $i;
            }elseif($pagina > ceil($this->data['cantidad']/$cant_pagina - $medio)){
                
                $numeros[$i] = $pagina - ($medio + ($pagina - ceil($this->data['cantidad']/$cant_pagina - $medio) - 1)) + $i;
            }
            else{
                $numeros[$i] = $pagina - $medio + $i;
            }
        }
        $this->data['pagina'] = $pagina;
        $this->data['ultima_pagina'] = ceil($this->data['cantidad']/$cant_pagina);
        $this->data['numeros'] = $numeros;
        
        $this->load->template('/notas/notas.php', $this->data);
    }
    
    public function nota_view($idnota = 0){
        if($idnota == 0){
            show_404();
            return;
        }
        $nota = $this->notas_model->nota($idnota);
        if(sizeof($nota) == 0 || $nota == false){
            show_404();
            return;
        }
        
        $this->data['title'] = $nota['titulo'];
        $this->data['nota'] = $nota;
        $this->load->template('/notas/nota.php', $this->data);
    }
    
    public function nueva_nota($imagen = ''){
           //Inserto la nueva
        $insert['titulo'] = $this->input->post('titulo');
        $insert['imagen'] = $imagen;
        $insert['contenido'] = $this->input->post('contenido');
        $insert['idusuario'] = $this->session->userdata('usuario')['idusuarios'];
        $insert['activo'] = true;
        $insert['autor'] = $this->input->post('autor');
        $insert['activo'] = true;
        
        return $this->db->insert('notas', $insert);
    }
}

?>
