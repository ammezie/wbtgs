<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'config.php';
 
 $conn = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD)
         or die("Mysql Error: " . mysql_error());
 mysql_select_db(DB_NAME)
        or die("Mysql Error: " . mysql_error());
 
 
?>
