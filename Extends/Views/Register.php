<?php
    
    include "../Data/User.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Register</h2>
        <form action="../Data/User.php" method="POST">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="UserName" class="form-control">
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="Pass" class="form-control" >
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit" name="insertUser">
            </div>
            <div class="form-group">
                <a href="../Views/index.php">login</a>
            </div>
        </form>
    </div>    
</body>
</html>