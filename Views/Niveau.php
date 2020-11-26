<?php

    require "../Data/Niveau.php";

    session_start();
    
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: ../index.php");
        exit;
    }

    $result = selectNiveau($con);
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Niveau</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">

    <a href="Personnes.php">Personnes</a>
        <a href="Niveau.php">Niveau</a>
        <a href="Formations.php">Formations</a>
        <h2>Niveau</h2>

        <form action="../Data/Niveau.php" method="POST">
            <div class="form-group">
                <label>Intitulé de Niveau</label>
                <input type="text" name="IntituleNiveau" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Ajouter" name="InsertNiveau">
            </div>
        </form>
        
        <table class="table">

            
            <thead>
                <tr>
                <th scope="col">Niveau</th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach($result as $x => $Niveau) {
                    echo"
                    <tr>
                        <td>".$Niveau->IntituleNiveau."</td>
                        <td>
                            <form action='../Data/Niveau.php' method='POST'>
                                <input type='Number' name='IdNiveau' value='".$Niveau->IdNiveau."' hidden>
                                <input type='submit' class='btn btn-primary' value='Delete' name='DeleteNiveau'>
                            </form>
                        </td>
                    </tr>
                    ";
                }
            ?>
            </tbody>
        </table>
        
    </div>    
</body>
</html>