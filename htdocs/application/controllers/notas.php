<?php

class notas extends MY_Controller {

    private static $cant_pagina = 9;
    private static $paginas_mostrar_max = 5;

    function __construct() {
        parent::__construct();

        $this->load->helper(array('form', 'url'));
        $this->load->model('notas_model');
        $this->load->library('common');
    }

    public function view($pagina = 1) {
        $this->data['title'] = 'Revista Tiempo - Notas';
        $this->load->template('/notas/notas.php', $this->data);
    }

    public function pages($pagina = 1) {
        $cant_pagina = notas::$cant_pagina;
        $paginas_mostrar_max = notas::$paginas_mostrar_max;

        $this->data['cantidad'] = $this->notas_model->cantidad_notas();


        if ($this->data['cantidad'] != 0)
            $this->data['notas'] = $this->notas_model->notas($pagina, notas::$cant_pagina);


        if (ceil($this->data['cantidad'] / $cant_pagina) <= $paginas_mostrar_max)
            $paginas_mostrar_max = ceil($this->data['cantidad'] / $cant_pagina);

        $medio = round($paginas_mostrar_max / 2, 0, PHP_ROUND_HALF_UP);
        $numeros = null;
        for ($i = 0; $i <= $paginas_mostrar_max - 1; $i++) {
            if ($pagina <= $medio || $paginas_mostrar_max >= ceil($this->data['cantidad'] / $cant_pagina)) {
                $numeros[$i] = $i;
            } elseif ($pagina > ceil($this->data['cantidad'] / $cant_pagina - $medio)) {

                $numeros[$i] = $pagina - ($medio + ($pagina - ceil($this->data['cantidad'] / $cant_pagina - $medio) - 1)) + $i;
            } else {
                $numeros[$i] = $pagina - $medio + $i;
            }
        }
        $this->data['pagina'] = $pagina;
        $this->data['ultima_pagina'] = ceil($this->data['cantidad'] / $cant_pagina);
        $this->data['numeros'] = $numeros;
    }

    public function nota_view($idnota = 0) {
        if ($idnota == 0) {
            show_404();
            return;
        }
        $nota = $this->notas_model->nota($idnota);
        if (sizeof($nota) == 0 || $nota == false) {
            show_404();
            return;
        }

        $this->data['title'] = $nota['titulo'];
        $this->data['nota'] = $nota;
        $this->load->template('/notas/nota.php', $this->data);
    }

    public function ajax_table($pagina = 1) {
        $this->pages($pagina);
        $this->load->view('notas/tabla.php', $this->data);
        //echo json_encode($this->data);
    }

    public function cargar_editar($idnota = 0) {

        if (!($this->data['usuario']['idnivel'] <= Administrador) || $this->data['usuario'] == null) {
            show_404();
        }
        if ($idnota == 0) {
            show_404();
        }
        $nota = $this->notas_model->nota($idnota);
        if (sizeof($nota) == 0 || $nota == false) {
            show_404();
        }
        $this->data['nota'] = $nota;
        $this->load->template('/notas/editar.php', $this->data);
    }

    public function editar_submit($idnota = 0) {
        if ($idnota == 0) {
            show_404();
            return;
        }
        if (!($this->data['usuario']['idnivel'] <= Administrador) || $this->data['usuario'] == null) {
            show_404();
            return;
        }
        $nota = $this->notas_model->nota($idnota);

        $imagen_name = NULL;
        if (!$this->input->post('eliminar') && $_FILES['imagen']['name'] == '') {
            $imagen_name = $nota['imagen'];
        }

        $this->notas_model->eliminar($idnota);
        self::nueva_nota($idnota, $imagen_name);
    }

    public function nueva_nota($idnota = 0, $imagen_name = NULL) {
        if (!($this->data['usuario']['idnivel'] <= Contribuidor) || $this->data['usuario'] == null) {
            show_404();
            return;
        }

        $this->load->library('form_validation');

        $this->form_validation->set_rules('titulo', "Titulo", 'required');
        $this->form_validation->set_rules('contenido', "Contenido", 'required');
        $this->form_validation->set_rules('bajada', "Bajada", 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->data['titulo_form'] = $this->input->post('titulo');
            $this->data['bajada_form'] = $this->input->post('bajada');
            $this->data['contenido_form'] = $this->input->post('contenido');
            $this->data['autor_form'] = $this->input->post('autor');
            $this->data['imagen'] = $_FILES['imagen']['name'];
            $this->data['error_nota'] = validation_errors();
            $this->view();
            return;
        }
        $imagen['file_name'] = $imagen_name;
        if ($_FILES['imagen']['name'] != '') {
            $config['upload_path'] = './images/notas/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '500';
            $config['remove_spaces'] = TRUE;

            $this->load->helper('file');
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('imagen')) {
                $this->data['titulo_form'] = $this->input->post('titulo');
                $this->data['bajada'] = $this->input->post('bajada');
                $this->data['contenido_form'] = $this->input->post('contenido');
                $this->data['autor_form'] = $this->input->post('autor');
                $this->data['error_nota'] = $this->upload->display_errors();
                $this->view();
                return;
            } else {
                $imagen = $this->upload->data();

                //Hago el Thumb
                if (!file_exists('images/notas/thumb')) {
                    mkdir('images/notas/thumb');
                }
                $resize = new Resize('images/notas/' . $imagen['file_name']);
                $resize->resizeImage(214, 0);
                $resize->saveImage('images/notas/thumb/' . $imagen['file_name']);
            }
        }

        $idnota = $this->notas_model->nueva_nota($idnota, $imagen['file_name']);

        if ($idnota > 0) {
            $this->data['redireccion'] = '/notas/' . $idnota;
            $this->load->template('/success.php', $this->data);
        }
        else
            show_404();
    }

    public function eliminar($idnota = 0, $view = false) {
        if ($idnota == 0) {
            show_404();
            return;
        }
        if (!($this->data['usuario']['idnivel'] <= Administrador) || $this->data['usuario'] == null) {
            show_404();
            return;
        }
        $this->notas_model->eliminar($idnota);
        $this->view();
    }

}

?>
