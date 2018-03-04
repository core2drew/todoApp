<?php
    session_start();
    class Db {
        private $servername = "localhost";
        private $username = "root";
        private $password = "";
        private $dbname = "todos_db";
        protected static $connection;

        public function connect(){
            if(!isset(self::$connection)) {
                self::$connection = new mysqli(
                    'localhost',
                    $this->username,
                    $this->password,
                    $this->dbname
                );
            }

            if(self::$connection === false) {
                // Handle error - notify administrator, log to a file, show an error screen, etc.
                return false;
            }

            return self::$connection;
        }

        public function query($query) {
            // Connect to the database
            $connection = $this -> connect();
    
            // Query the database
            $result = $connection -> query($query);
    
            return $result;
        }

        public function select($query) {
            $rows = array();
            $result = $this -> query($query);
            if($result === false) {
                return false;
            }
            while ($row = $result -> fetch_assoc()) {
                $rows[] = $row;
            }
            return $rows;
        }

        public function error() {
            $connection = $this -> connect();
            return $connection -> error;
        }

        public function quote($value) {
            $connection = $this -> connect();
            return "'" . $connection -> real_escape_string($value) . "'";
        }
    }
?>
