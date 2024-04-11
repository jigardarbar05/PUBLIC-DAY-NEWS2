<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="confirm.css">
</head>
<body>
      <form id="fo"method="POST">
  <label class="lb" for="new_password">New Password:</label><br>
  <input type="password" name="new_password" id="new_password" required><br>

  <label for="confirm_password">Confirm Password:</label><br>
  <input type="password" name="confirm_password" id="confirm_password" required><br><br>

  <input type="submit" name="submit" value="Submit">
</form>
</body>
</html>

<?php
include("connection.php");
session_start();
if(isset($_POST['submit']))
{
  $email=$_SESSION['email'];
  
$newPassword = $_POST['new_password'];
  $confirmPassword = $_POST['confirm_password'];
  
  if ($newPassword===$confirmPassword) {

$qe="UPDATE registration SET `password`='$newPassword' WHERE `email`='$email'";

$result = mysqli_query($conn, $qe);
      
if ($result) {
  
header("location:login.php");
  
}
else {
  echo "password are not match";
}
}
}

?>