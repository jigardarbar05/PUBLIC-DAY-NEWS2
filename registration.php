<?php
include("nav.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
<link rel="stylesheet" href="index.html">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/res.css">
    
    <title>Login Form</title>
            
  </head>
   <body >
    
   
      <div class="wrapper">
         <form class="form-signin" id="abc" method="POST" enctype="multipart/form-data">               
           <h2 class="form-signin-heading" >Registration</h2> 
           <input type="hidden" class="form-control" name="id" />
           
           <div class="name">Username</div>
           <div class="form-1">
            <input type="text" class="form-control" name="name" placeholder="name" Required/>
            </div>
            <div class="name">favourite number</div>
             <div class="form-1">
              <input type="text" class="form-control" name="fnum" placeholder="favourite number" Required/>
              <div class="name">favourite word</div>
             <div class="form-1">
              <input type="text" class="form-control" name="fword" placeholder="favourite word" Required/>
              </div>               
            </div>              
           <div class="name">City</div>
           <div class="form-1">
            <input type="text" class="form-control" name="city" placeholder="city"  Required/>
            </div>
          <div class="name">Gender</div>
            <div class="form-1 d-flex" style="padding-left: 0.8rem;">
            <input type="radio" name="gender" value="male">Male<div class="f"><input type="radio" name="gender"value="female">Female</div>
             </div>  
             <div class="name">Mobile No</div>
              <div class="form-1">
               <input type="text" class="form-control" name="mobile" placeholder="mobile no"  Required/>
               </div>
             <div class="name">Email</div>
             <div class="form-1">
              <input type="text" class="form-control" name="email" placeholder="Email id" Required/>
              </div>              
               <div class="name">Password</div>
               <div class="form-1">
                <input type="password" id="pwd" class="form-control" name="password" placeholder="Password" Required/>
                </div><br>
                <div class="form-1"> 
                    <input type="file" name="new_image" class="form-control" Required />
                  </div><br>                   
                <div class="btn-1"><input type="submit" name="register" class="b-1" style="height: 2.4rem; width: 7rem;" 
                value="SUBMIT">
              </div>
         </form>
       </div>
   <!-- Option 1: Bootstrap Bundle with Popper -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="js/reg.js"></script>
</body>
</html>

<?php
include("connection.php");
// session_start();
if(isset($_FILES['new_image']))
{
  $file_name=$_FILES['new_image']['name'];
  $file_size=$_FILES['new_image']['size'];
  $file_tmp=$_FILES['new_image']['tmp_name'];
  $file_type=$_FILES['new_image']['type'];

  // if(in_array($file_ext,$extensions)===false)
  //  {
  //   $errors[] ="this is extension file not allowed,plese choose a jpg or png file";
    
  //  }
     if(empty($errors) ==true)
   {
    move_uploaded_file($file_tmp,"Admin/USERPROFILE/".$file_name);
   }
   else{
    echo"
    <script> alert('image size must me not allowed');</script>
    die();
    ";
   }
  
}
if(isset($_POST['register']))

{
  
$name = $_POST["name"];
$fnum=$_POST['fnum'];
$fword=$_POST['fword'];
$city = $_POST["city"];
$gender = $_POST["gender"];
$mobile = $_POST["mobile"];
$email = $_POST["email"];
$password =$_POST["password"];

 $sq="SELECT * FROM registration WHERE email='$email'";
$result= mysqli_query($conn,$sq);
$mo=mysqli_num_rows($result);
if($mo>0){

  echo"
  <script> alert('email id already exists');</script>";
}else{
$query="INSERT INTO registration(`name`,`fnum`,`fword`,`city`,`gender`,`mobile`,`email`,`password`,`profile_image`)
VALUES('$name','$fnum','$fword','$city','$gender','$mobile','$email','$password','$file_name')";
$RES=mysqli_query($conn,$query);

if($RES)
{
  $_SESSION['user_id']=$id;
  $_SESSION['email']=$email;
  $_SESSION['name']=$name;
 header("location:login.php");
}
}
}

?>
<?php
  include("footer.php");
  ?>