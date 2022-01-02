<?php

include("rent_Connection.php");


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
    echo "1";
    //$text = "";
    if($length < 5 )
    {
        $length = 5;
        echo "2";
    }
    echo "3";
    $len = rand(4,$length);
    echo "4";
        for($i=0;$i<$len;$i++){

            $text = rand(0,9);
        }
        
        echo "5";
    return $text;
};