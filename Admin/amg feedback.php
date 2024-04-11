<?php
include("config.php");
if(isset($_GET['id'])){
    $fid=$_GET['id'];
    $del=mysqli_query($conn,"DELETE FROM feed WHERE id='$fid'");
}

?>

<?php
include("config.php");
$que="SELECT * FROM feed";
$res=mysqli_query($conn,$que);

?>
<?php
include("config.php");
session_start();
if(!isset($_SESSION["emailid"]))
{
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <!-- Required meta tags -->
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <link rel="stylesheet" href="acss/anav.css"> -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  
</head>
<body>
    
<?php
include("anave.php");
?>

<!-- <div class="card-body"> -->
<table class="table table-bodered text-center">
  <tr class="bg-dark text-white">
    <td>id</td>
    <td>name</td>
   
    <td>email</td>
    <td>option</td>
    <td>comments</td>
    
    <td>delete fq </td>
   
</tr>
<?php
  while($row=mysqli_fetch_assoc($res))
  
  {

   ?>
    <td><?php echo $row['id'];?></td>
    <td><?php echo $row['name'];?></td>
    <td><?php echo $row['email'];?></td>
    <td><?php echo $row['option'];?></td>
    <td><?php echo $row['comments'];?></td>
    
    <td><a href="amg feedback.php?id=<?php echo $row['id']; ?>"><i class="bi bi-trash3-fill text-danger"></i></a></td>
    
  </tr> 
  <?php
   
  }
  ?>
  </table>
</body>
</html>