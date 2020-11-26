<?php

    require "ConnexionDB.php";
    require "../Classes/Niveau.php";

    

    //insertion Table Niveau
    function InsertNiveau($IntituleNiveau,$con){
        $sql = "Insert INTO Niveau(IntituleNiveau) value('".$IntituleNiveau."')";
        if (mysqli_query($con, $sql)) {
            //Redirect to View Niveau
            header("location: ../Views/Niveau.php");

        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    }

    //Delete Row from table Niveau
    function DeleteNiveau($IdNiveau,$con){
        $sql = "DELETE FROM Niveau Where IdNiveau = '".$IdNiveau."'";
        if (mysqli_query($con, $sql)) {
            //Redirect to View Niveau
            header("location: ../Views/Niveau.php");

        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    }

    // select Table Niveau and return array of object Niveau
    function selectNiveau($con){
        $sql = "SELECT * FROM Niveau";
        $result = mysqli_query($con, $sql);
        $niveauArray = array();

        if (mysqli_num_rows($result) > 0) {

            while($row = mysqli_fetch_assoc($result)) {
              
                $Niveau = new Niveau($row['IdNiveau'],$row['IntituleNiveau']);
                $niveauArray[] = $Niveau ;
                
            }
        } else {
            echo "0 results";
        }
        return $niveauArray;
    }

    
    //test Req Prupose
    
    if(isset($_POST['InsertNiveau'])){
        InsertNiveau(trim($_POST['IntituleNiveau']),$con);
    }

    if(isset($_POST['DeleteNiveau'])){
        DeleteNiveau(trim($_POST['IdNiveau']),$con);
    }

    

?>