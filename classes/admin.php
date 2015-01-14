<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of admin
 *
 * @author Mezie
 */
require_once 'classes/database.php';

class admins {
	private $_db,
                $_username,
                $_password,
                $_role,
                $_query,
                $_result,
                $_fname,
                $_mname, 
                $_lname, 
                $_matric, 
                $_dept, 
                $_phone, 
                $_pic, 
                $_dob,  
                $_state, 
                $_lga, 
                $_address, 
                $_gender,
                $_image = false,
                $_logged_in = false;
			
	public function __construct(){
		$this->_db = database::getInstance();
	}	
	
	public function login($username, $password){
		$this->_username 	= $username;
		$this->_password 	= $password;
		$this->_role 		= $role;
		
		if($this->_db->adminLogin($this->_username, $this->_password)){
			$this->_logged_in = true;
		}
		return $this;
	}	
	
	public function logged_in(){
            return $this->_logged_in;
        }	
	
	public function addStudent($fname, $mname, $lname, $matric, $dept, $phone, $pic, $dob, $state, $lga, $address, $gender){
		$this->_fname = $fname; 
		$this->_mname = $mname;
		$this->_lname = $lname;
		$this->_matric = $matric;
		$this->_dept = $dept;
		$this->_phone = $phone;
		$this->_pic = $pic; 
		$this->_dob = $dob;
		$this->_state = $state;
		$this->_lga = $lga;
		$this->_address = $address;
		$this->_gender = $gender;
		
                if($this->_db->add($this->_fname, $this->_mname, $this->_lname, $this->_matric, $this->_dept, $this->_phone, $this->_pic, $this->_dob, $this->_state, $this->_lga, $this->_address, $this->_gender)){
                    header("location: add-student-success.php");
                } else {
                    header("location: add-student-fail.php");
                }

	}
	public function uploadResult(){
		
	}
        
}

?>
