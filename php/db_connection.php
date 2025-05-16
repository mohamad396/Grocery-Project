<?php
    class DB_connection
    {
        private static $connection =null;
        private $Connection;
        private $servername = "localhost";
        private $username = "root";
        private $password = "";
        private $dbname ="awlaadmasooddb";
        private function __construct() 
        {
            try 
            {
                $this->Connection = new mysqli($this->servername,$this->username,$this->password,$this->dbname);
            } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            }
            echo("Connection Successfully");
        }
        public static function getInstance()
        {
            if(!self::$connection){
                self::$connection = new DB_connection();
            }
            return self::$connection;
        }
        public function getConnection() {
        return $this->Connection;
        }
    }
?>