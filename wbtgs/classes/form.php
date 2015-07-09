<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of form
 *
 * @author Mezie
 */
class form {
    public static function exist($type = "post"){
        switch ($type){
            case "post":
                if(!empty($_POST)){
                    return TRUE;
                } else {
                    return FALSE;
                }
            break;
            case "get":
                if(!empty($_GET)){
                    return TRUE;
                } else {
                    return FALSE;
                }
            break;
            default :
                return FALSE;
            break;
        }
    }
    
    public static function get($field){
        if(isset($_POST[$field])){
            return $_POST[$field];  
        } elseif(isset($_GET[$field])){
            return $_GET[$field];
        } 
        return "";
    }
}

?>
