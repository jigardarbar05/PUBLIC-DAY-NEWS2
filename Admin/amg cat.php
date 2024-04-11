
<?php
include("config.php");
if(isset($_GET['cat_id'])){
    $id=$_GET['cat_id'];
    $del=mysqli_query($conn,"DELETE FROM category WHERE cat_id='$id'");
}

?>
<?php
include("config.php");
$que="SELECT * FROM category";
$result=mysqli_query($conn,$que);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php 

  
 
  ?>
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
include("nav.php");
?>

<!-- <div class="card-body"> -->
<table class="table table-bodered text-center">
  <tr class="bg-dark text-white">
    <td>cat_id</td>
    <td>cat_name</td>
    <td>cat_post</td>
    
    
    <td>update cat</td>
    <td>delete cat</td>
    <td><a href="add cat.php"><i class="bi bi-file-earmark-plus text-white h4 "></i></a></td>

   
</tr>
<!---search start--->
<tr>

<?php
 include("config.php");
 if(isset($_POST['search'])){
 $search=$_POST['search'];
    $sql ="SELECT * FROM category
    WHERE `cat_id` LIKE '%$search%' OR `cat_name` LIKE '%$search%' ";
    $no=mysqli_query($conn,$sql);
if(mysqli_num_rows($no)>0)
{
       while ($row = mysqli_fetch_array($no)){
    ?>
        
   <td><?php echo $row['cat_id'];?></td>
    <td><?php echo $row['cat_name'];?></td>
    <td><?php echo $row['post'];?></td>
    <td><a href="catupdate.php?id=<?php echo $row['cat_id']; ?>"><i class="bi bi-pencil-square"></i></a></td>
    <td><a href="amg cat.php?cat_id=<?php echo $row['cat_id']; ?>"><i class="bi bi-trash3-fill text-danger"></i></a></td>

 </tr> 
                 
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

<!---search end--->
<?php
  while($row=mysqli_fetch_assoc($result))
  {
   
    ?>
    <td><?php echo $row['cat_id'];?></td>
    <td><?php echo $row['cat_name'];?></td>
    <td><?php echo $row['post'];?></td>
    <td><a href="catupdate.php?id=<?php echo $row['cat_id']; ?>"><i class="bi bi-pencil-square"></i></a></td>
    <td><a href="amg cat.php?cat_id=<?php echo $row['cat_id']; ?>"><i class="bi bi-trash3-fill text-danger"></i></a></td>

  </tr> 
  <?php
   
  }
  ?>
</table>
</body>
</html>
