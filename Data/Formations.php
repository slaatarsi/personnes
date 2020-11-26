<?php
    require "Personnes.php";
    require "../Classes/Formations.php";

     //Insert Fromation

    function InsertFormation($con,$IntituleFormation,$Ecole,$DateD,$DateF,$IdPersonne){
        $sql = "Insert INTO Formation(IntituleFormation,Ecole,DateDebut,DateFin,IdPersonne) 
        VALUE ('".$IntituleFormation."','".$Ecole."','".$DateD."','".$DateF."','".$IdPersonne."')";
        if (mysqli_query($con, $sql)) {
            //Redirect to View Niveau
            header("location: ../Views/Formations.php");

        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }

    }

    // select Formations
    function selectFormations($con){
        $sql = "Select * FROM Formation";
        $result = mysqli_query($con, $sql);
        $FormationArray = array();

        if (mysqli_num_rows($result) > 0) {

            while($row = mysqli_fetch_assoc($result)) {
              
                $FormationSelected = new Formation($row["IdFormation"],$row["IntituleFormation"],$row["Ecole"],$row["DateDebut"],$row["DateFin"],$row["IdPersonne"]);
                $FormationArray[] = $FormationSelected ;
                
            }
        } else {
            echo "0 results";
        }
        return $FormationArray;
    }


    //Delete Row from table Niveau
    function DeleteFormations($IdFormation,$con){
        $sql = "DELETE FROM Formation Where IdFormation = '".$IdFormation."'";
        if (mysqli_query($con, $sql)) {
            //Redirect to View Niveau
            header("location: ../Views/Formations.php");

        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    }

     //test Req Prupose
    
     if(isset($_POST['InsertFormations'])){
        $Formation = new Formation(1,trim($_POST["IntituleFormation"]),trim($_POST["Ecole"]),trim($_POST["DateDebut"]),trim($_POST["DateFin"]),trim($_POST["IdPersonne"]));
        InsertFormation($con,$Formation->IntituleFormation,$Formation->Ecole,$Formation->DateDebut,$Formation->DateFin,$Formation->IdPersonne);
    }
    
    if(isset($_POST['DeleteFormations'])){
        DeleteFormations(trim($_POST['IdFormation']),$con);
    }

?>