<?php
    require_once "ConnexionDB.php";
    require "../Classes/Users.php";


    
    
    
    $User = new Users();
    $User->UserName  = trim($_POST["UserName"]);
    $User->Pass  = trim($_POST["Pass"]);

    
    

    $sql = "SELECT * FROM Users";
    $result = mysqli_query($con, $sql);
    

    if ($result->num_rows > 0) {
        
        while($row = $result->fetch_assoc()) {

            if($row['UserName'] != $User->UserName  || $row['Pass'] != $User->Pass){

                header("location: ../index.php");

            }else{
                
                session_start();
                $_SESSION["loggedin"] = true;
                header("location: ../Views/Personnes.php");

            }
        }
    } else {
        echo "0 results";
    }
?>