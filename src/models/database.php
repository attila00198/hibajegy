<?php

class Database {
    private $dbHost;
    private $dbUser;
    private $dbPass;
    private $dbName;
    private $db;

    public function __construct() {
        require_once 'src/config/config.php';
        $this->dbHost = DB_HOST;
        $this->dbUser = DB_USER;
        $this->dbPass = DB_PASS;
        $this->dbName = DB_NAME;
    }

    public function connect(){
        $dsn = "mysql:dbhost=$this->dbHost;dbname=$this->dbName;";
        try {
            $this->db = new PDO($dsn, $this->dbUser, $this->dbPass);
        } catch(PDOException $e) {
            echo $e->getMessage();
            die();
        }
    }

    public function getConnection() {
        return $this->db;
    }
}