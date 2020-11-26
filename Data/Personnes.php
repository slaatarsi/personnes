
<?php
    
    require "Niveau.php";
    require "../Classes/Personnes.php";
    

    
    
    //Insert Personnes

    function InsertPersonne($con,$Nom,$Prenom,$Adresse,$DateN,$tel,$Email,$IdNiveau){
        $sql = "Insert INTO Personne(Nom,Prenom,Adresse,DateN,tel,Email,IdNiveau) 
        VALUE ('".$Nom."','".$Prenom."','".$Adresse."','".$DateN."','".$tel."','".$Email."','".$IdNiveau."')";
        if (mysqli_query($con, $sql)) {
            //Redirect to View Niveau
            header("location: ../Views/Personnes.php");

        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    }

    //select Personnes

    function selectPersonns($con){
        $sql = "Select * FROM Personne";
        $result = mysqli_query($con, $sql);
        $PersonneArray = array();

        if (mysqli_num_rows($result) > 0) {

            while($row = mysqli_fetch_assoc($result)) {
              
                $PersonneSelected = new Personne($row["IdPersonne"],$row["Nom"],$row["Prenom"],$row["Adresse"],$row["DateN"],$row["tel"],$row["Email"],$row["IdNiveau"]);
                $PersonneArray[] = $PersonneSelected ;
                
            }
        } else {
            echo "0 results";
        }
        return $PersonneArray;
    }

    //Delete Row from table Niveau
    function DeletePersonne($IdPersonne,$con){
        $sql = "DELETE FROM Personne Where IdPersonne = '".$IdPersonne."'";
        if (mysqli_query($con, $sql)) {
            //Redirect to View Niveau
            header("location: ../Views/Personnes.php");

        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    }

     //test Req Prupose
    
     if(isset($_POST['InsertPersonnes'])){
        $Personne = new Personne(1,trim($_POST["Nom"]),trim($_POST["Prenom"]),trim($_POST["Adresse"]),trim($_POST["DateN"]),trim($_POST["tel"]),trim($_POST["Email"]),trim($_POST["IdNiveau"]));
        InsertPersonne($con,$Personne->Nom,$Personne->Prenom,$Personne->Adresse,$Personne->DateN,$Personne->tel,$Personne->Email,$Personne->IdNiveau);
    }
    
    if(isset($_POST['DeletePersonne'])){
        DeletePersonne(trim($_POST['IdPersonne']),$con);
    }


?>