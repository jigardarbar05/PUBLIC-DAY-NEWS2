<?php
include("config.php");
if(isset($_GET['user_id'])){
    $id=$_GET['user_id'];
  
    $del=mysqli_query($conn,"DELETE FROM registration WHERE id='$id'");
    
}

?>
<?php
session_start();
if(!isset($_SESSION["emailid"]))
{
    header("location:login.php");
}
?>

<?php

$que="SELECT * FROM registration";
$result=mysqli_query($conn,$que);
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <!-- Required meta tags -->
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="acss/anave.css">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <a class="navbar-brand" href="#">
          <img class="sasa" src="images/l1.png"class="image">
        </a>

        <form class="d-flex" method="POST" >
        <input class="formcontrol me-2" type="search" name="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-dark" type="submit">Search</button>
      </form>     

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ms-auto mb-2 mb-lg-0">
          <a class="nav-link" href="amg user.php">User</a>
            <a class="nav-link" href="amg post.php">Post</a>
            <a class="nav-link" href="amg cat.php">Category</a>
            <a class="nav-link" href="amg feedback.php">Feedback</a>
            <a href="logout.php" class="abc"><i class="bi bi-person-circle h4"></i></a>
           
            
            
           </div>
        </div>
    
    </nav>
<style>
  .aaa{
    height: 1rem;
    width: 5rem;
  }
</style>
<!-- <div class="card-body"> -->
<table class="table table-bodered text-center">
  <tr class="bg-dark text-white">
    <td>user_id</td>
    <td>profile</td>
    <td>name</td>
    <td>city</td>
    <td>gender</td>
    <td>mobile</td>
    <td>email</td>
    
    
   
    <td>update</td>
    <td>delete</td>
    
    <td><a href="user.php"><i class="fa bi-person-plus text-white h4"></i></a></td>
</tr>
<!---SEARCH START---->

<tr>

<?php
 include("config.php");
 if(isset($_POST['search'])){
 $search=$_POST['search'];
    $sql ="SELECT * FROM registration 
    WHERE `id` LIKE '%$search%' OR `name` LIKE '%$search%' ";
    $no=mysqli_query($conn,$sql);
if(mysqli_num_rows($no)>0)
{
       while ($row = mysqli_fetch_array($no)){
    ?>
      <td>   
    <?php echo $row['id'];?></td>
    <td>
      <style>
        .form-control{
	padding: 0rem;
	border-radius: 6rem;
}
      
      </style>
    <img src="<?php echo "USERPROFILE/".$row['profile_image'];?>" class="form-control" style="height: 4rem;  width: 4rem;"   >
     </td>
    <td><?php echo $row['name'];?></td>
    <td><?php echo $row['city'];?></td>
    <td><?php echo $row['gender'];?></td>
    <td><?php echo $row['mobile'];?></td>
    <td><?php echo $row['email'];?></td>
   
    
    <td><a href="update.php?user_id=<?php echo $row['id']; ?>"><i class="bi bi-pencil-square"></i></a></td>
    <td><a href="amg user.php?user_id=<?php echo $row['id']; ?>" ><i class="bi bi-trash3-fill text-danger"></i></a></td>
         
                     <?php
                 }
               
                 ?>
      
    <?php
  }
  

else{
    echo"no record found";
  }
 }
   ?>
   </tr>



<!---SEARCH END---->
<tr>
  <?php
  while($row=mysqli_fetch_assoc($result))
  {
   
    ?>
    <td>   
    <?php echo $row['id'];?></td>
    <td>
      <style>
        .form-control{
	padding: 0rem;
	border-radius: 6rem;
}
      
      </style>
    <img src="<?php echo "USERPROFILE/".$row['profile_image'];?>" class="form-control" style="height: 4rem;  width: 4rem;"   >
     </td>
    <td><?php echo $row['name'];?></td>
    <td><?php echo $row['city'];?></td>
    <td><?php echo $row['gender'];?></td>
    <td><?php echo $row['mobile'];?></td>
    <td><?php echo $row['email'];?></td>
   

    <td><a href="update.php?user_id=<?php echo $row['id']; ?>"><i class="bi bi-pencil-square"></i></a></td>
    <td><a href="amg user.php?user_id=<?php echo $row['id']; ?>" ><i class="bi bi-trash3-fill text-danger"></i></a></td>
    
   
  </tr> 
  <?php
   
  }
  ?>
</table>
    
</body>
</html>