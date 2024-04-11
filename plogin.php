<!----profile st----->
<?php
 session_start();
include("connection.php");
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
  border:2px solid black;
  height:50px;
  width:50px;
  border-radius: 5rem;
}

  </style>                  
<?php
}
  }
}
}
?>
<!----profile end ----->