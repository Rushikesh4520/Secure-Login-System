<?php

$showAlert = false;
$showError = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'partials/_dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    // $exists = false;

    // Check whether this username Exists
    $existSql = " SELECT * FROM `USERS` WHERE username = '$username'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
        $showError = "Username already Exists";
    }
    else{
            if ($password == $cpassword){
                $sql = "INSERT INTO `users` ( `username`, `password`, `dat`) VALUES ( '$username', '$password', current_timestamp())";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    $showAlert = true;
                }
            }
        else{
            $showError= " Password do not match";
            }
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
    if ($showAlert) {
        echo " <div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>SUCCESS!</strong> Your account is created Successfully.
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

    <h2 class="text-center my-3">welcome Sign Up</h2>

    <div class="container">
        <!-- //form -->
        <div class="container my-3">
            <!-- <h2>Add a Note</h2> -->
            <form action="/loginsystem/signup.php" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="Username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" aria-describedby="emailHelp" placeholder="Password">
                </div>

                <div class="form-group">
                    <label for="password">Confirm Password</label>
                    <input type="password" class="form-control" id="cpassword" name="cpassword" aria-describedby="emailHelp" placeholder="Confirm Password">
                </div>


                <button type="submit" class="btn btn-primary">Sign Up</button>
            </form>
        </div>
    </div>



</body>

</html>