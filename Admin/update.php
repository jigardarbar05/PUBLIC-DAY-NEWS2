<?php
include("config.php");
$id=$_GET['user_id'];

if(isset($_POST['Save']))

{
  
$name = $_POST["name"];
$city = $_POST["city"];
$gender = $_POST["gender"];
$mobile = $_POST["mobile"];
$email = $_POST["email"];
$password =$_POST["password"];
$query = mysqli_query($conn,"UPDATE registration SET
name='$name',city='$city',gender='$gender',mobile='$mobile',
 email='$email', password='$password' where id='$id'");



if($query)
{
 header("location:amg user.php");
}
else{
  echo
  "connection failed";
}
}
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="acss/res.css">
    <title>Login Form</title>
            
  </head>
   <body >
   <?php
include("anave.php");
?>
   
      <div class="wrapper">
      <?php
    include("config.php");
    
$up="SELECT * FROM registration WHERE id=$id";

$UPDATE=mysqli_query($conn,$up);
$row=mysqli_fetch_assoc($UPDATE);
?>
         <form class="form-signin" id="abc" method="POST" >
       
               
           <h2 class="form-signin-heading" >Update detali</h2>
           <div class="name">Username</div>
           <div class="form-1">
            <input type="text" class="form-control" name="name" value="<?php echo $row['name']?>" Required/>
            </div>
           <div class="name">City</div>
           <div class="form-1">
            <input type="text" class="form-control" name="city" value="<?php echo $row['city']?>"  Required/>
            </div>
          <div class="name">Gender</div>
            <div class="form-1 d-flex" style="padding-left: 0.8rem;">
            <input type="radio" name="gender" value="male" <?php echo ($row['gender']=='male')?
            "checked":"";?>>Male<div class="f"><input type="radio" name="gender"value="female"<?php echo ($row['gender']=='female')?
            "checked":"";?>>Female</div>
             </div>  
             <div class="name">Mobile No</div>
              <div class="form-1">
               <input type="text" class="form-control" name="mobile"  value="<?php echo $row['mobile']?>"  Required/>
               </div>
             <div class="name">Email</div>
             <div class="form-1">
              <input type="text" class="form-control" name="email" value="<?php echo $row['email']?>" Required/>
              </div>
              
               <div class="name">Password</div>
               <div class="form-1">
                <input type="password" id="pwd" class="form-control" name="password"  value="<?php echo $row['password']?>" Required/>
                
                </div>
                   
                <div class="btn-1"><input type="submit" name="Save" class="b-1" style="height: 2.4rem; width: 7rem;" 
                value="Save">
           
                
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
