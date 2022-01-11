<?php 
$hostname="localhost:4560";
$username="root";
$password="Jchrister123";
$db="rentapartment";

$connect=mysqli_connect($hostname,$username,$password,$db);

if(!$connect){
    die("Connection Failed!");
}
return $connect;
echo "Done!";

?>