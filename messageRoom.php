<?php namespace Phprachet;?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
</head>
<header>
    <a href="homepage.php" id="go_back">Go Back</a>
</header>
<body>
    <?php
    $conn=require("dbConnect.php");
    require("chatSession.php");
    
    $newObjchat=new ChatSession;
    $newObjchat->setSessionId($conn);
    $newObjchat->getAllUsers($conn);


    ?>
</body>
</html>