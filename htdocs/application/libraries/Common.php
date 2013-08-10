<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Common
 *
 * @author Ignacio
 */

class Common {
    public static function mes($numero_mes)
    {
        switch($numero_mes){
            case 1:
                return "Enero";
            case 2:
                return "Febrero";
            case 3:
                return "Marzo";
            case 4:
                return "Abril";
            case 5:
                return "Mayo";
            case 6:
                return "Junio";
            case 7:
                return "Julio";
            case 8:
                return "Agosto";
            case 9:
                return "Septiembre";
            case 10:
                return "Octubre";
            case 11:
                return "Noviembre";
            case 12:
                return "Diciembre";
        }
        return "Error";
    }
    
    public function select_mes($selected = '0')
    {
        $name = 'mes';
        setlocale(LC_ALL, 'es_AR.utf8');
        
        if($selected == '0')
            $selected = date('m');
        
        $select = '<select id="ddlMes" name="' . $name . '" />';
        for( $i = 1; $i <= 12; $i++)
        {
            $select .= '<option value="' . $i . '"';
            if($selected == $i)
                $select .= 'selected="selected"';
            $select .= '>' . Common::mes($i) .'</option>';
        }
        $select .= '</select>';
        
        return $select;
    }
    
    public function select_año($selected = '0')
    {
        $name = 'ano';
                
         if($selected == '0')
            $selected = date('Y');
         
        $select = '<select id="ddlAno" name="' . $name . '" />';
        
        $año_comienzo = date('Y') + 1;
        $año_fin = $año_comienzo - 10;
        for( $año_comienzo; $año_comienzo >= $año_fin; $año_comienzo--)
        {
            $select .= '<option value="' . $año_comienzo . '" '; 
            if($año_comienzo == $selected)
                $select .= 'selected="selected"';        
            $select .='>' . $año_comienzo .'</option>';
        }
        $select .= '</select>';
        
        return $select;
    }
}

?>
