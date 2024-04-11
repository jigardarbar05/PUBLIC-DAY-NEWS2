<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/newpas.css">
</head>
<body>
<div class="mainDiv">
  <div class="cardStyle">
  <form method="POST">
  <div id="alert"></div>
<h3> Change your password  </h3>
  <label for="password">Password</label>
  <input type="password" id="password" name="new_password" placeholder="enter Password" Required>

  <label for="password-verify">Re-type password</label>
  <input type="password" id="password-verify" name="confirm_password" placeholder=" Re-enter Password" Required>

  <button type="submit" name="submit">Reset password</button>
</form>
  </div>
</div>
<script src="https://cdn.userfront.com/core.js"></script>
<script src="js/newpass.js"></script>
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