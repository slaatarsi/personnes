<?php
    include "../Classes/User.php";

    class DataUser extends User{
        

        public function selectUserTable($UserName,$Pass){
            $sql = "Select * FROM Users";
            $datas = $this->getUserTable($sql);
            foreach($datas as $data){
                if($data['UserName'] == $UserName && $data['Pass'] == $Pass){
                    session_start();
                    $_SESSION["loggedin"] = true;
                    header("location: ../Views/Personne.php");
                }else{
                    header("location: ../Views/index.php");
                }
            }
        }

        public function insertUser($UserName,$Pass){
            $sql = "Insert INTO Users(UserName,Pass) VALUE('".$UserName."','".$Pass."')";
            $data = $this->setUserTable($sql);
            if($data == true){
                header("location: ../Views/index.php");
            }else{
                header("location: ../Views/Register.php");
            }
        }


    }

    if(isset($_POST['insertUser'])){
        $user = new DataUser();
        $user->insertUser(trim($_POST['UserName']),trim($_POST['Pass']));
    }
    if(isset($_POST['loginUser'])){
        $user = new DataUser();
        $user->selectUserTable(trim($_POST['UserName']),trim($_POST['Pass']));
    }

    


?>