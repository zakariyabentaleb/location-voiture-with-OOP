<?php

class Connection{
    protected $server = "localhost";
    protected $user = "root";
    protected $password = "root";
    protected $database = "societe";
   public $connection;
    public $conn; 

    
    public function __construct($server, $user, $password, $database){
        $this->connection = mysqli_connect($server, $user, $password, $database);

    }
    
    public function getConnection() {
        return $this->conn;
    }
    
}