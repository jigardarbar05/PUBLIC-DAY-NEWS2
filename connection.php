<?php
// error_reporting(0);
$servarname = "localhost";
$username = "root";
$password = "";
$dbname = "public-news";

$conn = mysqli_connect($servarname,$username,$password,$dbname);
if($conn)
{
   // echo "connection successfully";
}
else{
    echo "connection failed". mysqli_connect_error();
    }
?>
