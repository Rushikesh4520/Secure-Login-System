<?php

$login = false;
$showError = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'partials/_dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];

    // $sql = "Select * from users where username='$username' AND password = '$password'";
        $sql = "Select * from users where username='$username'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if ($num == 1) {
            while($row =mysqli_fetch_assoc($result)){
                if(password_verify($password, $row['password'])){
                    $login = true;
                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['username'] = $username;
                    header("location: welcome.php");
                }
            }       
            
        } 
        else {
        $showError = "invalid credentials";
       } 
        
       }

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login System</title>
</head>

<body>

    <?php
    require 'partials/_navbar.php';
    ?>

    <?php
    if ($login) {
        echo " <div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>SUCCESS!</strong> Your Log in  Successfully.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
        </button>
        </div>";
    }

    if ($showError) {
        echo " <div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>Error!</strong> '.$showError.'
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
        </button>
        </div>";
    }
    ?>

    <h2 class="text-center my-3">welcome to Log in</h2>

    <div class="container">
        <!-- //form -->
        <div class="container my-3">
        
            <form action="/loginsystem/login.php" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="Username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" aria-describedby="emailHelp" placeholder="Password">
                </div>

                


                <button type="submit" class="btn btn-primary">Log In</button>
            </form>
        </div>
    </div>



</body>

</html>