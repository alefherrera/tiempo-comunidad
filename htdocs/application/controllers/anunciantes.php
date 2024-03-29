<?php

class item_rubro {

    public $id;
    public $text;
    public $expanded;
    public $spriteCssClass;
    public $items = array();

    public function addItem($item) {
        array_push($this->items, $item);
    }

}

class anunciantes extends MY_Controller {

    private static $cant_pagina = 9;
    private static $paginas_mostrar_max = 5;

    function __construct() {
        parent::__construct();

        $this->load->helper(array('form', 'url'));
        $this->load->model('anunciantes_model');
        $this->load->library('common');
    }

    public function view($idanunciantes = 0) {
        $this->data['title'] = 'Revista Tiempo - Anunciantes';
        $this->data['anunciantes'] = $this->anunciantes_model->anunciantes($idanunciantes);

        if ($idanunciantes == 0) {
            $this->load->template('/anunciantes/anunciantes.php', $this->data);
        } elseif ($this->data['anunciantes'] != false) {
            $this->load->template('/anunciantes/anunciante.php', $this->data);
        } else {
            show_404();
        }
    }

    public function ajax_table($pagina = 1) {
        $rubros = json_decode($this->input->post('rubros'));
        $this->data['anunciantes'] = $this->anunciantes_model->anunciantes(0, $rubros);
        $this->load->view('anunciantes/tabla.php', $this->data);
    }

    public function cargar_editar($idanunciante = 0) {
        if (!($this->data['usuario']['idnivel'] <= Administrador) || $this->data['usuario'] == null) {
            show_404();
            return;
        }
        if ($idanunciante == 0) {
            show_404();
        }
        $anunciante = $this->anunciantes_model->anunciantes($idanunciante);
        $especial = $this->anunciantes_model->especiales($idanunciante);

        if ($anunciante == null) {
            show_404();
            return;
        }

        $this->data['idanunciantes'] = $idanunciante;

        if (!isset($this->data['error_anunciante'])) {
            $this->data['nombre_form'] = $anunciante['nombre'];
            $this->data['telefono_form'] = $anunciante['telefono'];
            $this->data['direccion_form'] = $anunciante['direccion'];
            $this->data['mail_form'] = $anunciante['mail'];
            $this->data['web_form'] = $anunciante['web'];
            $this->data['rubros_form'] = htmlspecialchars(json_encode(explode("-", $anunciante['idrubros'])));
            $this->data['descripcion_form'] = $anunciante['descripcion'];
            if ($especial != null) {
                $this->data['especial_form'] = $especial['link'];
                $this->data['link_form'] = $especial['link'];
            }
        }

        $this->data['logo_form'] = $anunciante['logo'];
        $this->data['logo_especial_form'] = $especial['imagen'];



        $this->load->template("/anunciantes/editar.php", $this->data);
    }

    public function editar_submit($idanunciante = 0) {
        if ($idanunciante == 0) {
            show_404();
            return;
        }
        if (!($this->data['usuario']['idnivel'] <= Administrador) || $this->data['usuario'] == null) {
            show_404();
            return;
        }

        $anunciante = $this->anunciantes_model->anunciantes($idanunciante);

        $imagen_name = NULL;
        if (!$this->input->post('eliminar') && $_FILES['logo']['name'] == '') {
            $imagen_name = $anunciante['logo'];
        }
        $imagen = $this->validate($imagen_name);
        $imagen_especial = $this->validate_especial();

        if ($imagen == false) {
            $this->cargar_editar($idanunciante);
            return;
        }
        if ($imagen_especial == false) {
            $this->cargar_editar($idanunciante);
            return;
        }


        $this->anunciantes_model->eliminar($idanunciante);
        $idanunciante = $this->anunciantes_model->nuevo_anunciante($imagen['file_name'], $imagen_especial['file_name']);



        if ($idanunciante > 0) {
            $this->data['redireccion'] = '/anunciantes/' . $idanunciante;
            $this->load->template('/success.php', $this->data);
        } else
            show_404();
    }

    public function validate($imagen_name = NULL) {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nombre', "Nombre", 'required');
        $rubros = json_decode($this->input->post('rubros'));
        $error_completar = false;
        if ($this->input->post('telefono') == '' && $this->input->post('direccion') == '') {
            $error_completar = true;
        }

        if ($this->form_validation->run() === FALSE || count($rubros) <= 0 || $error_completar) {
            $this->data['nombre_form'] = $this->input->post('nombre');
            $this->data['telefono_form'] = $this->input->post('telefono');
            $this->data['direccion_form'] = $this->input->post('direccion');
            $this->data['mail_form'] = $this->input->post('mail');
            $this->data['web_form'] = $this->input->post('web');
            $this->data['descripcion_form'] = $this->input->post('descripcion');


            $this->data['descripcion_form'] = $this->input->post('descripcion');
            $this->data['rubros_form'] = htmlspecialchars(json_encode($rubros));
            $this->data['logo'] = $_FILES['logo']['name'];
            $this->data['error_anunciante'] = validation_errors();
            if (count($rubros) <= 0) {
                $this->data['error_anunciante'] .= "El campo Rubro es requerido";
            } elseif ($error_completar) {
                $this->data['error_anunciante'] .= "Debe completar Dirección o Teléfono";
            }

            //Para cargar el especial
            if ($this->input->post('especial') != null && $this->input->post('especial') == true) {
                $this->data['especial_form'] = true;
                $this->data['link_form'] = $this->input->post('link');
            }
            return false;
        }

        $logo['file_name'] = $imagen_name;
        if (!($_FILES['logo']['name'] == '' )) {
            $config['upload_path'] = './images/anunciantes/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '500';
            $config['remove_spaces'] = TRUE;
            $config['encrypt_name'] = TRUE;

            $this->load->helper('file');
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('logo')) {
                $this->data['nombre_form'] = $this->input->post('nombre');
                $this->data['telefono_form'] = $this->input->post('telefono');
                $this->data['direccion_form'] = $this->input->post('direccion');
                $this->data['mail_form'] = $this->input->post('mail');
                $this->data['web_form'] = $this->input->post('web');
                $this->data['descripcion_form'] = $this->input->post('descripcion');
                $this->data['rubros_form'] = htmlspecialchars(json_encode($rubros));
                $this->data['error_anunciante'] = $this->upload->display_errors();
                return false;
            } else {
                $logo = $this->upload->data();

                //Hago el Thumb
                if (!file_exists('images/anunciantes/')) {
                    mkdir('images/anunciantes');
                }
                $resize = new Resize('images/anunciantes/' . $logo['file_name']);
                $resize->resizeImage(251, 0);
                $resize->saveImage('images/anunciantes/' . $logo['file_name']);
            }
        }


        return $logo;
    }

    public function validate_especial() {
        $logo_especial['file_name'] = '';
        if (!($_FILES['logo_especial']['name'] == '' )) {
            $config['upload_path'] = './images/anunciantes/especiales/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '500';
            $config['remove_spaces'] = TRUE;
            $config['encrypt_name'] = TRUE;

            $this->load->helper('file');
            $this->load->library('upload');
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('logo_especial')) {
                $this->data['error_especial'] = $this->upload->display_errors();
                return false;
            }
            $logo_especial = $this->upload->data();
        }

        return $logo_especial;
    }

    public function nuevo_anunciante() {
        if (!($this->data['usuario']['idnivel'] <= Administrador) || $this->data['usuario'] == null) {
            show_404();
            return;
        }
        $logo = $this->validate();

        if ($logo == false) {
            $this->view();
            return;
        }

        $idanunciante = $this->anunciantes_model->nuevo_anunciante($logo['file_name']);

        if ($idanunciante > 0) {
            $this->data['redireccion'] = '/anunciantes/';
            $this->load->template('/success.php', $this->data);
        } else {
            show_404();
        }
    }

    public function ajax_rubros($idanunciante = 0) {
        $item_l = array();
        $item_l = self::cargar_lista($item_l, 0, $idanunciante);

        $array_final = json_encode($item_l);
        echo $array_final;
    }

    public function cargar_lista($item_l, $idpadre = 0, $idanunciante = 0) {
        $rubros = $this->anunciantes_model->rubros($idpadre, $idanunciante);
        foreach ($rubros as $row) {
            $item = new item_rubro();
            $item->id = $row['idrubros'];
            $item->text = $row['rubro'];
            $item->expanded = true;
            $item->spriteCssClass;
            $item->items = self::cargar_lista($item->items, $row['idrubros'], $idanunciante);

            array_push($item_l, $item);
        }

        return $item_l;
    }

    public function eliminar($idanunciantes = 0, $view = false) {
        if ($idanunciantes == 0) {
            show_404();
            return;
        }
        if (!($this->data['usuario']['idnivel'] <= Administrador) || $this->data['usuario'] == null) {
            show_404();
            return;
        }
        $this->anunciantes_model->eliminar($idanunciantes);
        $this->view();
    }

}

?>
