<?php
    include "ConnexionDB.php";

    class User extends ConnexionDB{
        private $Iduser;
        private $UserName;
        private $Pass;

        protected function getUserTable($sql){
            $result = $this->connect()->query($sql);
            $numRow = $result->num_rows;
            if($numRow > 0){
                while($row = $result->fetch_assoc()){
                    $data[] = $row;
                }
                return $data;
            }
        }
        protected function setUserTable($sql){

            if ($this->connect()->query($sql)) {
                return true;
    
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($con);
                return false;
            }
        }

    }
?>