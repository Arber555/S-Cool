<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SQLConnection
 *
 * @author Arber
 */
class SQLConnection {
    
    private $serverName = 'localhost';
    private $userName = 'root';
    private $password = '';
    public $db = 'S-CoolDB';
    
    /*public function __construct()
    {
        $this->$serverName = 'localhost';
        $this->$userName = 'root';
        $this->$password = '';
        $this->$db = 'S-CoolDB';
    }*/

    function connection()
    {
        $con = null;
        if(!isset($con)){
            $con = new mysqli($this->serverName, $this->userName, $this->password, $this->db);
        }
        
        if($con === false) {  
            return mysqli_connect_error(); 
        }
        
        return $con;
    }
}