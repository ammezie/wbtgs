<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of vaidate
 *
 * @author Mezie
 */
class validate {
    private $_db = null,
            $_errors = array(),
            $_passed = false;
    
    public function __construct(){
        $this->_db = database::getInstance();
    }
    
    public function check($source,  $fields = array()){
        foreach ($fields as $field => $rules) {
            foreach ($rules as $rule => $rule_value) {
               
                $value = trim(form::get($field));
               
                if($rule === 'required' && empty($value)){
                    $this->addError("{$field} is required");
                } else if(!empty ($value)){
                    switch ($rule){
                        case'min':
                            if(strlen($value) < $rule_value){
                                $this->addError("{$field} must be a minimum of {$rule_value} characters");
                            }
                        break;
                        case'max':
                            if(strlen($value) > $rule_value){
                                $this->addError("{$field} must be a maximum of {$rule_value} characters");
                            }
                        break;
                        case'numeric':
                            if(!is_numeric($value)){
                                $this->addError("{$field} must be numerical");
                            }
                        break;
                        case'matches':
                            if($value != form::get($rule_value)){
                                $this->addError("{$rule_value} must match");
                            }
                        break;
                        case'unique':
                            if ($this->_db->checkStudent($value)){
                                $this->addError("{$field} already registered");
                            }
                        break;
                        case'add-unique':
                            if ($this->_db->checkAddStudent($value)){
                                $this->addError("{$field} already in the school database");
                            }
                        break;
                    }
                }
            }
        }
        
        if(empty($this->_errors)){
            $this->_passed = TRUE;
        }
        return $this;
    }
    
    private function addError($error){
        $this->_errors[] = $error;
    }
    
    public function errors(){
        return $this->_errors;
    }
    
    public function passed(){
        return $this->_passed;
    }
}

?>
