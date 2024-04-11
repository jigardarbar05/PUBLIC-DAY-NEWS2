<?php
include("connection.php");
session_start();
        $sp=$_SESSION['email'];

if(isset($_POST['update']))

{
  
$name = $_POST["name"];
$city = $_POST["city"];
$gender = $_POST["gender"];
$mobile = $_POST["mobile"];
$email = $_POST["email"];
$password =$_POST["password"];
$query = mysqli_query($conn,"UPDATE registration SET
name='$name',city='$city',gender='$gender',mobile='$mobile',
 password='$password' where email='$sp'");



if($query)
{
 header("location:profile.php");
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
<?php
        include("connection.php");
       
        $sp=$_SESSION['email'];
        $sql="SELECT *FROM registration where email='$sp'";
        $gresult=mysqli_query($conn,$sql);
        if($gresult){
          if(mysqli_num_rows($gresult)>0){
            while($row=mysqli_fetch_array($gresult)){
         ?>
         
                <div class="wrapper">
                <form class="form-signin" id="abc" method="POST" >
           <h2 class="form-signin-heading" >Registration</h2>
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
            <input type="radio" name="gender" value="Male" <?php echo ($row['gender']=='male')?
            "checked":"";?>>Male<div class="f"><input type="radio" name="gender"value="Female"<?php echo ($row['gender']=='female')?
            "checked":"";?>>Female</div>
             </div>  
                    <div class="name">Mobile No</div>
                     <div class="form-1">
                      <input type="text" class="form-control" name="mobile" value="<?php echo $row['mobile']?>"  Required/>
                      </div>
                    <div class="name">Email</div>
                    <div class="form-1">
                     <input type="text" class="form-control" name="email" value="<?php echo $row['email']?>" Required/>
                     </div>
                     
                      <div class="name">Password</div>
                      <div class="form-1">
                       <input type="password" id="pwd" class="form-control" name="password" value="<?php echo $row['password']?>" Required/>
                       
                       </div>
                       <div class="form-1"> 
                    <input type="file" name="new_image" class="form-control" value="<?php echo $row['profile']?>" Required />
                  </div><br>
                 
                          
                       <div class="btn-1"><input type="submit" name="update" class="b-1" style="height: 2.4rem; width: 7rem;" 
                       value="update">
              
                       
                     </div>
       
                </form>
              </div>
         
         
         <?php
            }
          }

        }

       
        ?>
</body>
</html>