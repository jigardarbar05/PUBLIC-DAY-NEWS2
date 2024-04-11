<?php
session_start();
include("connection.php");
$sp=$_SESSION['email'];

$name = $_POST["name"];
$city = $_POST["city"];
$gender = $_POST["gender"];
$mobile = $_POST["mobile"];

$password =$_POST["password"];


if (!empty($_FILES['image']['name'])) {
  
  $file_name = $_FILES['image']['name'];
  $file_tmp = $_FILES['image']['tmp_name'];
  $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
  
  $valid_extension = array("jpg", "jpeg", "png");
  echo "ready";
  
  if (in_array($file_extension, $valid_extension)) {
    
    if (move_uploaded_file($file_tmp, "Admin/USERPROFILE/".$file_name)) {
      
      $sql = "UPDATE registration SET
      name='$name',city='$city',gender='$gender',mobile='$mobile',
       password='$password',`profile_image`='$file_name'
          where email='$sp'";
      
      $result = mysqli_query($conn, $sql);
      
      if ($result) {
        
        echo "<script> window.location.href='profileuser.php'; </script>";
        return;
        
      }
    }
  } else {
    echo "this file extension is not allowed , plese choose a jpg or png file";
  }
} else {
  $sql1 = "UPDATE registration SET
  name='$name',city='$city',gender='$gender',mobile='$mobile',
   `password`='$password' where email='$sp'";

$result = mysqli_query($conn, $sql1);

if ($result) {
  echo "<script> window.location.href='profileuser.php'; </script>";
  return;
}
}
