<?php

define("SERVIDOR","localhost");
define("BD","prueba_innus");
define("USUARIO","root");
define("PASS","");

class God { 
    public $_db;
   public function __construct() {
       try {			
           $host		= SERVIDOR;
           $database	= BD;
           $user		= USUARIO;
           $passwd		= PASS;			
           $this->_db = new PDO('mysql:host='.$host.';dbname='.$database, $user, $passwd, array(
               PDO::ATTR_PERSISTENT => true, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
       } catch (PDOException $e) {
           error_log("Failed to connect to database: ".$e->getMessage());
       }				
   }	

}