
<?php
    require "../Data/Formations.php";

    session_start();
    
    
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: ../index.php");
        exit;
    }
    $PersonneArray = selectPersonns($con);
    $FormationArray = selectFormations($con);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formations</title>
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
        <h2>Formations</h2>

        <form action="../Data/Formations.php" method="POST">
            <div class="form-group">
                <label>Intitule Formation</label>
                <input type="text" name="IntituleFormation" class="form-control">
                <label>Ecole</label>
                <input type="text" name="Ecole" class="form-control">
                <label>Date debut</label>
                <input type="date" name="DateDebut" class="form-control">
                <label>Date Fin</label>
                <input type="date" name="DateFin" class="form-control">
                <label>Personne</label>
                <select name="IdPersonne" class="form-control">
                    <?php
                        foreach($PersonneArray as $x => $Personne) {
                            echo"
                                <option value='".$Personne->IdPersonne."'>".$Personne->Nom." ".$Personne->Prenom."</option>
                                
                            ";
                        }
                    ?>
                </select>

            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Ajouter" name="InsertFormations">
            </div>
        </form>
        
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Intitule</th>
                <th scope="col">Ecole</th>
                <th scope="col">date debut</th>
                <th scope="col">Date fin</th>
                <th scope="col">Personne</th>
                </tr>
            </thead>

            <tbody>
            <?php
                foreach($FormationArray as $x => $Formation) {
                    echo"
                        <tr>
                        <td>".$Formation->IntituleFormation."</td>
                        <td>".$Formation->Ecole."</td>
                        <td>".$Formation->DateDebut."</td>
                        <td>".$Formation->DateFin."</td>
                        <td>
                    ";
                        foreach($PersonneArray as $x => $Personne) {

                            if($Personne->IdPersonne == $Formation->IdPersonne){
                                echo $Personne->Nom." ".$Personne->Prenom;
                            }
                        }

                    echo"</td>
                        <td>
                            <form action='../Data/Formations.php' method='POST'>
                                <input type='Number' name='IdFormation' value='".$Formation->IdFormation."' hidden>
                                <input type='submit' class='btn btn-primary' value='Delete' name='DeleteFormations'>
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