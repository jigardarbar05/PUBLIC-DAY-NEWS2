<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/nave.css">
    <!-- <script defer src="js/nav.js"></script> -->
    <!-- <link rel="stylesheet" href="css/index.css"> -->

</head>
<body>

<!--  -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
                 <h6 class="navbar-brand" href="#">
          <img src="IMG/l1.png"class="image"></h6>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="true" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ms-auto mb-2 mb-lg-0">
            <a id="as" href="index.php">Home</a> 
            <a id="as" href="post.php">Post</a> 
        
            <a id="as" href="feedback.php">Feedback</a>
            <a id="as" href="contect.php">Contect Us </a>
            <a id="as" href="profileuser.php">
            <?php
 
 include("connection.php");
  session_start();
 if(isset($_SESSION['email'])){
 $email=$_SESSION['email'];
 $sql = "SELECT *FROM registration where email='$email'";
 $gresult = mysqli_query($conn, $sql);
 if ($gresult) {
   if (mysqli_num_rows($gresult) > 0) {
     while ($row = mysqli_fetch_array($gresult)) {
 
       ?>
 
 <img src="Admin/USERPROFILE/<?php echo $row['profile_image']; ?>" class="jb" >
 
   <style>
 .jb{
   border:1px solid black;
   height:40px;
   width:40px;
   border-radius: 5rem;
 }
 
   </style>                  
 <?php
 }
   }
 }
 }
 
 ?>
  
            
            </a> 
         <?php
          
            
  if(!isset($_SESSION["email"]))
  
  {
echo "  <a id='as' href='login.php'>login</a>";
  } 
  // else
  // {
  //   echo "  <a id='as' href='logout.php'>logout</a>";
  // }
  ?>


                 </div>
        </div>
      </nav>
    </body>
</html>