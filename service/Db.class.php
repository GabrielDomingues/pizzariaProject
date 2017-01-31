<?php

class Db{
    public $con;        
    
    public function __construct(){
        $hostname = "(local),1433";
        $dbname = "Pizzaria";
        $username = "sa";
        $pw = "qw4152";
        
        $this->con = new PDO ("sqlsrv:Server=$hostname;Database=$dbname","$username","$pw");
    }
}

?>