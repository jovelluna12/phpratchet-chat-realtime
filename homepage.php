<?php
    session_start();
    include("dbConnect.php");
    include("functions.php");
    //$user_data = check_login($con);

    $username=$_SESSION['Username'];
    
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <Title>SignUP</Title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
    </head>
    <body>
        <span><?php echo $username ?></span>
        <div class="wrapper">
            <a href="messageRoom.php">Messages</a><br>
            <a href="rent_login.php">Log out</a>

        </div>
    </body>