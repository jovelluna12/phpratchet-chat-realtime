<?php 

$hostname="localhost:4560";
$username="root";
$password="Jchrister123";

$connect=mysqli_connect($hostname,$username,$password);

if(!$connect){
    die("Connection Failed!");
}
echo "Done!";

?>