<?php

// MVC pattern -> Model - View - Controller
// Database connection controller

class Db{

    protected $servername;
    protected $username;
    protected $password;
    protected $database;
    protected $conn;
    
    
    function __construct($servername, $user, $pwd, $database) {
        $this->servername = $servername;
        $this->username = $user;
        $this->password = $pwd;
        $this->database = $database;
    }

    protected function connect(){
        try {
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->database", $this->username, $this->password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return null;
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    
    public function getData($sql){
        $this->connect();
        try {
            $stmt = $this->conn->prepare($sql);
            if($stmt->execute() === false){
                die("Connection failed");
            }
            $data = $stmt->fetchAll(); 
            return $data;
            
        }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    
    public function closeConn(){
        $this->conn = null;
        return null;
    }


}

?>