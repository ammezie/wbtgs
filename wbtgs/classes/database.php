<?php

/**
 * Description of database
 *
 * @author Mezie
 */
require_once 'config.php';

class database {
    private static $instance = null;
    private $_mysqli,
            $_query,
            $_error = false,
            $_result,
            $_results,
            $_row_count;
                 
    
    private function __construct() {
        $this->_mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        if ($this->_mysqli->connect_errno){
            echo 'Failed to connection to the server' . $this->_mysqli->connect_error;
        }
    } 
    
    public static function getInstance(){
        if (!isset(self::$instance)){
            self::$instance = new database();
        }
        return self::$instance;
    }
    
    public function checkStudent($matric){
        $this->_query = $this->_mysqli->query("SELECT * FROM students WHERE matric = '$matric'");
        $this->_row_count = $this->_query->num_rows;
        if($this->_row_count == 1){
            return TRUE;
        }
    }

    public function checkAddStudent($matric){
        $this->_query = $this->_mysqli->query("SELECT * FROM students_bio WHERE matric = '$matric'");
        $this->_row_count = $this->_query->num_rows;
        if($this->_row_count == 1){
            return TRUE;
        }
    }
    
    public function createStudent($matric, $email, $password){
        $this->_query = $this->_mysqli->query("INSERT INTO students VALUES('$matric', '$email', '$password')");
        if($this->_query){
            return TRUE;
        }
    }
    
    public function studentProfile($sql){
        $this->_query = $this->_mysqli->query($sql);
        if($this->_query->num_rows > 0){
            $this->_results = mysqli_fetch_assoc($this->_query);
        }
    }
    
    public function results(){
        return $this->_results;
    }

    public function studentLogin($matric, $password){
        $this->_result = $this->_mysqli->query("SELECT * FROM students WHERE matric = '$matric' AND password = '$password'");
        $this->_row_count = $this->_result->num_rows;
        
        if($this->_row_count == 1){
            return TRUE;
        }
    }
   
    public function adminLogin($username, $password){
        $this->_result = $this->_mysqli->query("SELECT * FROM admin WHERE username = '$username' AND password = '$password'");
        $this->_row_count = $this->_result->num_rows;
        
        if($this->_row_count == 1){
            return TRUE;
        }
    }
	
    public function add($fname, $mname, $lname, $matric, $dept, $phone, $pic, $dob, $state, $lga, $address, $gender){
        $this->_query = $this->_mysqli->query("INSERT INTO students_bio VALUES('$fname', '$mname', '$lname', '$matric', '$dept', '$phone', '$pic', '$dob', '$state', '$lga', '$address', '$gender')");
        if($this->_query){
            return TRUE;
        }
    }
}

?>
