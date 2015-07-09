<?php

/**
 * Description of students
 *
 * @author Mezie
 */
require_once 'classes/database.php';

class students {
    private $_matric,
            $_email,
            $_password,
            $_comPass,
            $_db,
            $_query,
            $_result = false,
            $_logged_in = false;

    public function __construct() {
        $this->_db = database::getInstance();
    }

    public function register($matric, $email, $password){
        $this->_matric = $matric;
        $this->_email = $email;
        $this->_password = $password;
           
        if ($this->_db->createStudent($this->_matric, $this->_email, $this->_password)) {
            header("location: register-success.php");
        }
    }
 
    public function login($matric, $password){
        $this->_matric = $matric;
        $this->_password = $password;
        
        if($this->_db->studentLogin($this->_matric, $this->_password)){
            $this->_logged_in = TRUE;
        }
        return $this;
    }
    public function logged_in(){
        return $this->_logged_in;
    }
    
    public function getProfile($sql){
        if($this->_db->studentProfile($sql)){
            $this->_result = true;
        }
        return $this;
    }
    public function result(){
        return $this->_result;
    }
}

?>
