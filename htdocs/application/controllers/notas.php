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
        $cant_pagina = 3;
        if($this->data['cantidad'] != 0)
            $this->data['notas'] = $this->notas_model->notas($pagina, $cant_pagina);
//        echo ceil($this->data['cantidad']/5);
        
        $paginas_mostrar_max = 3;
        
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
        
        $this->load->template('pages/notas.php', $this->data);
    }
}

?>
