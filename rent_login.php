<?php
session_start();
include("dbConnect.php");


if($_SERVER['REQUEST_METHOD']== "POST"){

    $Username = $_POST["Username"];
    $Password = $_POST["Password"];
        
        if( !empty($Username) && 
            !empty($Password)
        ){
                $query = "Select * from users Where Username = '$Username' limit 1";
                $result = mysqli_query($connect, $query);

            if($result)
            {
                if($result && mysqli_num_rows($result)>0)
                {
                    $userdata= mysqli_fetch_assoc($result);
                    if($userdata['Password']===$Password)
                    {
                        $_SESSION['UserID'] = $userdata['UserID'];
                        $_SESSION['Username']=$Username;
                        $_SESSION["name"]=$userdata['Name'];
                        header("Location: homepage.php");
                        die;
                    }
                    else{
                        echo "Something went wrong";
                    }
                }
            }    
        }
        else
        {
            Echo "please fill-up all the blank";
        }
}
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
        <div class="wrapper">
            <h2>Login</h2>
            <p>Welcome to the Login Page!!</p>
            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>
            "method="post">
                <!--Username-->
                <div class="form-group">
                    <label>Username: </label>
                    <input type="text" name="Username" class="form-control">
                
                <!--name-->
                <div class="form-group">
                    <label>Password: </label>
                    <input type="Password" name="Password" class="form-control">

                </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="submit">
            </div>
            <p>Don't have an account? <a href="rent_signup.php">Sign up now</a>.</p>
             </form>
             </div>
    </body>
</html>