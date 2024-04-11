<?php
// session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  
    <style>
     
body{
  
  background-color: red;
}
.error{
          color: brown;
        }
    </style>
     
   
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- icon -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

   <link rel="stylesheet" href="css/login.css">
   <?php include("nav.php");
   ?>
  <title>Login Form</title>
      </head>
   <body>
   
      <div class="wrapper">
         <form class="form-signin" id="xyz" action="" method="POST">       
           <h2 class="form-signin-heading" >Login Form</h2>
           <div class="form-1">
           <i class="bi bi-envelope-at-fill">&nbsp;Email
            <input type="text" class="form-control" name="email"placeholder="@email" />
            </i>
          </div>
           <div class="form-1">
           <i class="bi bi-person-fill-lock">&nbsp;Password</i>
            <input type="password" class="form-control" name="password" placeholder="Password"/>
          
          </div> 
           <a href="forget-password.php">forget-password</a>
           <div class="d-grid gap-2">
  <button class="btn btn-dark" type="submit" name="login" value="login">Login</button></div>
        <div class="acc"> Don't have an account?<a href="registration.php" class="crete-a">Signup</a></div> 
        
         
           </div>
         </form>
         </div>
      

        <?php
 if (isset($_POST['login'])) {
   if (empty($_POST['email']) || empty($_POST['password'])) {
   }
   else
   {
   $emailid=$_POST['email'];
   $password=$_POST['password'];
   $connection = mysql_connect("localhost", "root", "");
   $email = stripslashes($emailid);
   $password = stripslashes($password);
   $emailid= mysql_real_escape_string($email);
   $password = mysql_real_escape_string($password);
   $db = mysql_select_db("public-news", $connection);
   $query = mysql_query("select * from registration where password='$password' AND email='$emailid'", $connection);
   $rows = mysql_num_rows($query);
   $RP=mysql_fetch_assoc($query);
   if ($rows) {
   $_SESSION['email']=$emailid;
   $_SESSION['user_id']=$RP['id'];

   
   header("location: index.php"); 
   }
   else
   {
     echo" <script> 
     alert('invalid email and password');
     </script>";
   mysql_close($connection); 
   }
   }
   }
 ?>
   <!-- Option 1: Bootstrap Bundle with Popper -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="js/login.js"></script> 
</body>
</html>

