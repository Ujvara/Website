<?php

class databaseConnection{
    private $server="localhost";
    private $username="root";
    private $password="";
    private $database = "shtyp1";


    function startConnection(){
        try{
            $conn = new PDO("mysql:host=$this->server;dbname=$this->database",$this->username,$this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }catch(PDOException $e){
            echo "Database Conenction Failed".$e->getMessage();
            return null;
        }
    }
}
?>