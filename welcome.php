<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - <?php $_SESSION['username'] ?></title>
</head>

<body>

    <?php
    require 'partials/_navbar.php';
    ?>


    <div class="container my-4">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Welcome - <?php echo $_SESSION['username'] ?> </h4>
            <p>Hey! How are you doing ? Welcome to iSecure. Your logged in as <?php echo $_SESSION['username'] ?> you successfully read this important alert message.</p>
            <hr>
            <p class="mb-0">Whenever you need to, be sure to log out <a href=" /loginsystem/logout.php">Using this link.</a></p>
        </div>
    </div>


</body>

</html>