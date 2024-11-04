<?php
  class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    private $conn = null;

    public function __construct(){
      $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
      if ($this->conn->connect_error) {
        exit($this->conn->connect_error);
      }
      
    }

    
    public function __descontruct(){
      $this->conn->close();
    }

    public function prepare($sql) {
      return $this->conn->prepare($sql);
    }

  }