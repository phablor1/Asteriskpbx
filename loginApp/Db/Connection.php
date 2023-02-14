<?php
//namespace LoginApp\Db;

//use mysqli;
    class Connection{
    
        private $host = 'localhost';
        private $username = 'root';
        private $password = 'p123456';
        private $database = 'asterisk';
    
        protected $connection;
    
        public function __construct(){
    
            if (!isset($this->connection)) {
    
                $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
    
                if (!$this->connection) {
                    echo 'Nao foi possivel conectar ao banco '.$this->database;
                    exit;
                }            
            }    
    
            return $this->connection;
        }
    }
    