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
    public function select_mes($name = 'mes')
    {
        setlocale(LC_ALL, 'es_AR.utf8');
        $selected = date('m');
        
        $select = '<select id="ddlMes" name="' . $name . '" />';
        for( $i = 1; $i <= 12; $i++)
        {
            $select .= '<option value="' . $i . '"';
            if($selected == ('0' . $i) || $selected == $i)
                $select .= 'selected="selected"';
            $select .= '>' . strftime('%B', mktime(0,0,0,$i,0,0)) .'</option>';
        }
        $select .= '</select>';
        
        return $select;
    }
    
    public function select_año($name = 'ano')
    {
        $select = '<select id="ddlAno" name="' . $name . '" />';
        $año_comienzo = date('Y') + 1;
        $año_fin = $año_comienzo - 10;
        for( $año_comienzo; $año_comienzo >= $año_fin; $año_comienzo--)
        {
            $select .= '<option value="' . $año_comienzo . '" '; 
            if($año_comienzo == date('Y'))
                $select .= 'selected="selected"';        
            $select .='>' . $año_comienzo .'</option>';
        }
        $select .= '</select>';
        
        return $select;
    }
}

?>
