<?php

include("connection.php");
    
    if(isset($_SESSION['user_id'])){
        $lo=$_SESSION['user_id'];
       echo $lo;
       die();

$cat="SELECT * FROM feed WHERE user_id=$lo";
// WHERE user_id=$id
 $mo=mysqli_query($conn,$cat);
 if(mysqli_num_rows($mo)>0)
{
    while($ko=mysqli_fetch_assoc($mo)){
        echo $ko['id'];
        echo $ko['name'];
}
    
}else{
    echo "data not found";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  
    <link rel="stylesheet" href="css/fbq.css">
    
    <title>Document</title>

</head>
<body>
<?php include("nav.php");
   ?>
  
<form method="POST">
<h3 >Feedback</h3>
<input type="hidden" name="access_key" value="45d2ebdf-7f3d-4699-8994-5101523219cf">
<input type="hidden" name="user_id" id="pm" Required><br><br>
    
        <label for="fullName">Your Name</label> <br>
        <input type="text" name="name" id="pm" Required><br><br>
    
        <label for="email">Your E-mail</label> <br>
        <input type="text" name="email" id="pm"Required><br>
        <br>
        <input type="radio" name="option" value="feedback">Feedback<br><br>
        <label for="comments">Your Comments</label> <br>
        <textarea name="comments" class="sk" id="pm"Required></textarea><br><br>    
        <input type="submit" name="submit" value="Submit">
       
    </form>
</body>
</html>
<?php
include("connection.php");
if(isset($_POST['submit'])){
    $id=$_SESSION['user_id'];
$name=$_POST['name'];
$email=$_POST['email'];
$gender=$_POST['option'];
$comments=$_POST['comments'];
$query = mysqli_query($conn, "INSERT INTO `feed`(`id`,`user_id`, `name`, `email`,`option`, `comments`) VALUES ('','$id','$name','$email','$gender','$comments')");

if($query)
 {
echo" <script> 
    alert('Successfully send feedback');
    </script>";
 }else
 {
    echo"connection is not ok";
   
}

}
?>

<?php
  include("footer.php");
  ?>