<?php
include("dbConnect.php");

function check_login($con)
{
    if(issert($_SESSION['UserID']))
        {
            $id = $_SESSION['user_ID'];
            $query = "select * form users where UserID= '$id' limit 1";
            $Result= mysqli_query($con,$query);
            if($result && mysqli_num_row($result)>0)
            {
                $user_data=mysqli_fetch_assoc($result);
                return $user_data;
            }
        }
    header("Location:rent_login.php");
    die;
}

function random_number($length)
{
    //$text = "";
    if($length < 5 )
    {
        $length = 5;
        
    }
    $len = rand(4,$length);
    
        for($i=0;$i<$len;$i++){

            $num = rand(0,9);
        }

    return $num;
};