
<?php
    require "../Data/Personnes.php";
    session_start();
    
    
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: ../index.php");
        exit;
    }
    $NiveauArray = selectNiveau($con);
    $PersonneArray = selectPersonns($con);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Personnes</title>
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
        
        <h2>Personnes</h2>
        

        <form action="../Data/Personnes.php" method="POST">
            <div class="form-group">
                <label>Nom</label>
                <input type="text" name="Nom" class="form-control">
                <label>Prenom</label>
                <input type="text" name="Prenom" class="form-control">
                <label>Adresse</label>
                <input type="text" name="Adresse" class="form-control">
                <label>Date de Naissance</label>
                <input type="date" name="DateN" class="form-control">
                <label>Telephone</label>
                <input type="text" name="tel" class="form-control">
                <label>Email</label>
                <input type="text" name="Email" class="form-control">
                <label>Niveau</label>
                <select name="IdNiveau" class="form-control">
                    <?php
                        foreach($NiveauArray as $x => $Niveau) {
                            echo"
                                <option value='".$Niveau->IdNiveau."'>".$Niveau->IntituleNiveau."</option>
                                
                            ";
                        }
                    ?>
                </select>

            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Ajouter" name="InsertPersonnes">
            </div>
        </form>
        
        <table class="table">

            
            <thead>
                <tr>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">Adresse</th>
                <th scope="col">Date Naissance</th>
                <th scope="col">Tel</th>
                <th scope="col">Email</th>
                <th scope="col">Niveau</th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach($PersonneArray as $x => $Personne) {
                    echo"
                    <tr>
                        <td>".$Personne->Nom."</td>
                        <td>".$Personne->Prenom."</td>
                        <td>".$Personne->Adresse."</td>
                        <td>".$Personne->DateN."</td>
                        <td>".$Personne->tel."</td>
                        <td>".$Personne->Email."</td>
                        <td>
                    ";
                            foreach($NiveauArray as $x => $Niveau) {

                                    if($Niveau->IdNiveau == $Personne->IdNiveau){
                                        echo $Niveau->IntituleNiveau;
                                    }
                            }
                        echo"</td>
                        <td>
                            <form action='../Data/Personnes.php' method='POST'>
                                <input type='Number' name='IdPersonne' value='".$Personne->IdPersonne."' hidden>
                                <input type='submit' class='btn btn-primary' value='Delete' name='DeletePersonne'>
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