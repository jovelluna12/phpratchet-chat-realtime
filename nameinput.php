<?php session_start();
    if(isset($_POST["nameinput"])){
        $_SESSION["name"]= $_POST["nameinput"];
        header("Location: chatbox.php");

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter your Name - Real Time Chat Application</title>
</head>
<body>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
        <input type="text" name="nameinput" placeholder="Enter Your Name"> 
        <input type="submit" value="Submit">
    </form>
</body>
</html>