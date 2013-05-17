<?php

include_once 'conexion.php';
include_once 'tablas.php';

class usuarios implements tablas {

    private $_idusuarioauto, $_idusuario, $_nombre, $_pass, $_mail, $_fechaalta, $_fechamodif, $_status;
    
// <editor-fold defaultstate="collapsed" desc="Gets y Sets">
    public function get_idusuarioauto() {
        return $this->_idusuarioauto;
    }

    public function get_idusuario() {
        return $this->_idusuario;
    }

    public function get_nombre() {
        return $this->_nombre;
    }

    public function get_pass() {
        return $this->_pass;
    }

    public function get_mail() {
        return $this->_mail;
    }

    public function get_fechaalta() {
        return $this->_fechaalta;
    }

    public function get_fechamodificacion() {
        return $this->_fechamodif;
    }

    public function get_status() {
        return $this->_status;
    }

    public function set_idusuarioauto($_idusuarioauto) {
        $this->_idusuarioauto = $_idusuarioauto;
    }

    public function set_idusuario($_idusuario) {
        $this->_idusuario = $_idusuario;
    }

    public function set_nombre($_nombre) {
        $this->_nombre = $_nombre;
    }

    public function set_pass($_pass) {
        $this->_pass = $_pass;
    }

    public function set_mail($_mail) {
        $this->_mail = $_mail;
    }

    public function set_fechaalta($_fechaalta) {
        $this->_fechaalta = $_fechaalta;
    }

    public function set_fechamodificacion($_fechamodif) {
        $this->_fechamodif = $_fechamodif;
    }

    public function set_status($_status) {
        $this->_status = $_status;
    }
    // </editor-fold>
    
    function __construct() {
        $this->_idusuarioauto = -1;
        $this->_idusuario = -1;
        $this->_nombre = '';
        $this->_pass = '';
        $this->_mail = '';
        $this->_fechaalta = 0;
        $this->_fechamodif = 0;
        $this->_status = 1;
    }

    // <editor-fold defaultstate="collapsed" desc="Select, Insert, Update, Delete, Load">
    static public function Select($usuario) {
        $conexion = new conexion();
        $consulta = "Call usuarios_SELECT('" . $usuario->get_idusuarioauto() . "','" . $usuario->get_idusuario() . "','"
                . $usuario->get_nombre() . "','" . $usuario->get_pass() . "','" . $usuario->get_mail() . "',"
                . $usuario->get_fechaalta() . "," . $usuario->get_fechamodificacion() . "," . $usuario->get_status() . ")";
        $result = mysql_query($consulta);
        if (!$result) {
            echo 'Error en la consulta: ' . mysql_error();
            return false;
        }
        return $result;
    }

    static public function Insert($usuario) {
        $conexion = new conexion();
        $consulta = "Call usuarios_INSERT('" . $usuario->get_nombre() . "','" . $usuario->get_pass() . "','" . $usuario->get_mail() . "')";
        $result = mysql_query($consulta);
        if (!$result) {
            echo 'Error en la consulta: ' . mysql_error();
            return false;
        }
        return $result;
    }

    static public function Update($usuario) {
        $conexion = new conexion();
        $consulta = "Call usuarios_UPDATE('" . $usuario->get_idusuario() . "','" . $usuario->get_nombre() . "','" . $usuario->get_mail() ."'," . $usuario->get_fechaalta(). ")";
        $result = mysql_query($consulta);
        if (!$result) {
            echo 'Error en la consulta: ' . mysql_error();
            return false;
        }
        return $result;
    }

    static public function Delete($usuario) {
        $conexion = new conexion();
        $consulta = "Call usuarios_DELETE('" . $usuario->get_idusuario() . "')";
        $result = mysql_query($consulta);
        if (!$result) {
            echo 'Error en la consulta: ' . mysql_error();
            return false;
        }
        return $result;
    }

    static public function Load($usuario) {
        $result = usuarios::Select($usuario);

        if ($result == false) {
            return false;
        }
        $row = mysql_fetch_array($result);

        $usuario->set_idusuarioauto($row["idUsuarioAuto"]);
        $usuario->set_idusuario($row["idUsuario"]);

        $usuario->set_nombre($row["Nombre"]);

        $usuario->set_pass($row["Pass"]);
        $usuario->set_mail($row["Mail"]);

        $usuario->set_fechaalta($row["FechaAlta"]);
        $usuario->set_fechamodificacion($row["FechaModificacion"]);

        $usuario->set_status($row["Status"]);

        return $usuario;
    }
    // </editor-fold>
}

;
?>
