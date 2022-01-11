<?php 

require("dbConnect.php");
include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $Username = $_POST['Username'];
        $Name = $_POST['Name'];
        $Password = $_POST['Password'];
        $Email = $_POST['Email'];
        $Acc_Type = $_POST['Acc_Type'];
        $Acc_Status = $_POST['Acc_Status'];
        $Gender = $_POST['Gender'];
        $PhoneNumber = $_POST['PhoneNumber'];
        $Location = $_POST['Location'];
        echo "hello";   
            if( !empty($Username) && 
                !empty($Name) && 
                !empty($Password) && 
                !empty($Email) && 
                !empty($Acc_Type) && 
                !empty($Acc_Status) &&
                !empty($Gender) &&
                !empty($PhoneNumber) &&
                !empty($Location)
                )
                {
                    
                    $UserID = random_number(20);
                    var_dump ($UserID);
                    $query = "insert into users 
                    values
                    ($UserID,'$Username','$Name','$Password','$Email','$Acc_Type','$Acc_Status','$Gender',091234567890,'$Location')";
                    
                    echo "Saving User Data";
                    
                    //mysqli_query($con, $query);

                    if (mysqli_query($con, $query)){
                        echo "User data Saved";
                    }
                    else{
                        echo "Error: " . $query . "<br>" . mysqli_error($con);
                    }
                    
                    header("Location: rent_login.php");
                    die;
                }
            else
            {
                echo "please fill-up all the blank";
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
            <h2>SIGNUP</h2>
            <p>Welcome to the Sign-UP Page!!</p>
            <form method="POST">
                <div class="form-group">
                    <label>Username: </label>
                    <input type="text" name="Username" class="form-control">
                   
                     
                <div class="form-group">
                    <label>Name: </label>
                    <input type="text" name="Name" class="form-control">
                    
                </div>

                <!--Password-->
                <div class="form-group">
                    <label>Password: </label>
                    <input type="password" name="Password" class="form-control ">
                    
                </div>
            
                <!--Email-->
                <div class="form-group">
                    <label>Email: </label>
                    <input type="text" name="Email" class="form-control" >
                 
                 </div>
                 
                  <!--Acc_Type-->
                  <div class="form-group">
                    <label>Account Type: </label>
                    <input type="text" name="Acc_Type" class="form-control">
                     
                  </div>

                  <!--Acc_Status-->
                  <div class="form-group">
                    <label>Account Status: </label>
                    <input type="text" name="Acc_Status" class="form-control">
                     
                  </div>

                  <!--Gender-->
                  <div class="form-group">
                    <label>Gender: </label>
                    <input type="text" name="Gender" class="form-control">
                     
                  </div>

                <!--PhoneNumber-->
                <div class="form-group">
                    <label>Phone-Number: </label>
                    <input type="text" name="PhoneNumber" class="form-control ">
                   
                 </div>
                 
                
                <!--Location-->
                <div class="form-group">
                    <label>Location: </label>
                    <input type="text" name="Location" class="form-control ">
                    
                 </div>
                
                 <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <input type="reset" class="btn btn-secondary ml-2" value="Reset">
                </div>
                <p>Already have an account? <a href="Rent_login.php">Login here</a>.</p>
            </form>
        </div>
    </body>
</html>