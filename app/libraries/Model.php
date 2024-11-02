<?php
    class Model{
        private $db;
        protected $table = null;
        protected $conn = null;

        protected $stmt = null;
        protected $db = null;
        public function __construct(){
            $this->db = new Database;
            $this->conn = $db;
        }

        public function setDb($db){
            $this->db = $db;
        }

        public function getDb(){
            return $this->db;
        }


        // public function setTable($table){
        //     $this->table = $table;
        // }
        public function getTable(){
            return $this->table;
        }
        public function getAll(){
            $items = [];

            $sql = "SELECT * from $this->table";

            $this->stmt = $this->conn->prepare($sql);
            $this->stmt->execute();
            $items = $stmt->get_result();
            // if ($result->num_rows > 0) {
            //     while($row = $result->fetch_assoc()) {
            //         echo $row;
            //         // $items[] = $row;
            //     }
            //   } 
              return $items;
        }

    }