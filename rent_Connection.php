<?php

$dbhost= "localhost";
$dbuser= "root";
$dbpass= "";
$dbname= "rentapartment";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
    die("Failed to Connect to the Database!!");
}

?>