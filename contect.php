<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contect us</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" href="css/contect.css">
    <link rel="stylesheet" href="css/nave.css">

 
    
</head>
<body>
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

<?php

  $a=$_SESSION["email"];
  if($a==null)
  {
header("location:login.php");
  }
  else
  {
  ?>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
      
        <div class="modal-body">
    <section id="section-wrapper">
        <div class="box-wrapper">
            <div class="info-wrap">
                <h2 class="info-title">Contact us</h2>
                <ul class="info-details">
                    <li>
                        <i class="fas fa-phone-alt"></i>
                        <span>Phone:</span> <a href="tel:+ 1235 2355 98">+91 63548 09288</a>
                    </li>
                    <li>
                        <i class="fas fa-paper-plane"></i>
                        <span>Email:</span> <a href="mailto:info@yoursite.com">milanparmar568@gmail.com</a>
                    </li>
                    <li>
                        <i class="fas fa-globe"></i>
                   <a href="#">https://www.publicnews.com</a>
                    </li>
                </ul>
                <ul class="social-icons">
                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
                </ul>
            </div>
            <div class="form-wrap">
        
                <form method="POST" action="https://api.web3forms.com/submit">
                <input type="hidden" name="access_key" value="45d2ebdf-7f3d-4699-8994-5101523219cf">

                    <h2 class="form-title">Send Message</h2>
                    <div class="form-fields">
                        <div class="form-group">
                       
              
                            <input type="text" class="fname" placeholder="First Name" Required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="lname" placeholder="Last Name" Required>
                        </div>
                        <div class="form-group">
                            <input type="email" class="email" placeholder="Email" Required>
                        </div>
                        <div class="form-group">
                            <input type="number" class="phone" placeholder="Phone No" Required>
                        </div>
                        <div class="form-group">
                            <textarea name="message" id="" placeholder="Write your message" Required></textarea>
                        </div>
                    </div>
                    <input type="submit" name="submit" value="Send Message" class="submit-button">
                </form>
                </div>
        </div>
        </div>
        </div>
            </div>
        </div>
    </section>
</body>
</html>
<?php
  include("footer.php");
  ?>
<?php
  }
?>
<?php
include("connection.php");
if(isset($_POST['submit'])){

echo" <script> 
    alert('Successfully send feedback');
    </script>";
    // header("location:index.php");
 }



?>
