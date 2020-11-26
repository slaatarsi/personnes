
<?php

    class ConnexionDB{
        private $serverName;
        private $userName;
        private $passWord;
        private $dbName;

        protected function connect(){
            $this->serverName = "localhost";
            $this->userName = "root";
            $this->passWord = "";
            $this->dbName = "gestionpersonne";

            $con = new mysqli($this->serverName,$this->userName,$this->passWord,$this->dbName);

            return $con;
        }
    }


?>