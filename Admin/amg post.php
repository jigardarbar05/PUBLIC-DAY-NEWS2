<?php
include("config.php");
session_start();
if(!isset($_SESSION["emailid"]))
{
    header("location:login.php");
}
?>
<?php
include("config.php");
$que="SELECT * FROM post
LEFT JOIN category ON post.category=category.cat_id";
$result=mysqli_query($conn,$que);
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <!-- Required meta tags -->
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="acss/anav.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   </head>
   <?php
include("nav.php");
?>
<body>

    <!-- <div class="card-body"> -->
<table class="table table-bodered text-center">
  <tr class="bg-dark text-white">
    <td>post_id</td>
    <td>image</td>
        <td>title</td>
    <td>description</td>
    <td>category</td>
     
    <td>date</td>
    
    
    <td>update post</td>
    <td>delete post </td>
    <td><a href="add post.php"><i class="bi bi-file-earmark-plus text-white h4 "></i></a></td>

   
</tr>
<tr>

<?php
 include("config.php");
 if(isset($_POST['search'])){
 $search=$_POST['search'];
    $sql ="SELECT * FROM post  LEFT JOIN category ON post.category=category.cat_id
    WHERE `post_id` LIKE '%$search%' OR `cat_name` LIKE '%$search%' ";
    $no=mysqli_query($conn,$sql);
if(mysqli_num_rows($no)>0)
{
       while ($row = mysqli_fetch_array($no)){
    ?>
        <td><?php echo $row['post_id'];?></td>
  
   
  <style>
  .im{
   height: 100px;
   width: 100px;
}

   </style>
   <td>
   <img class="im" src=" <?php echo "PIMAGE/".$row['image'];?>" >
   </td>
   
   <td ><?php echo $row['title'];?></td>
   <td><?php echo $row['description'];?></td>
   <td><?php echo $row['cat_name'];?></td>

   <td><?php echo $row['date'];?></td>
   <td><a href=" update post.php?post_id=<?php echo $row['post_id']; ?>"><i class="bi bi-pencil-square"></i></a></td>
   <td><a href="deletepost.php?post_id=<?php echo $row['post_id']; ?>&cat_id=<?php echo $row['category']; ?>"><i class="bi bi-trash3-fill text-danger"></i></a></td>

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

<?php
  while($row=mysqli_fetch_assoc($result))
  {
   
    ?>
    <td><?php echo $row['post_id'];?></td>
  
   
   <style>
   .im{
    height: 100px;
    width: 100px;
}

    </style>
    <td>
    <img class="im" src=" <?php echo "PIMAGE/".$row['image'];?>" >
    </td>
    
    <td ><?php echo $row['title'];?></td>
    <td><?php echo $row['description'];?></td>
    <td><?php echo $row['cat_name'];?></td>

    <td><?php echo $row['date'];?></td>
    <td><a href=" update post.php?post_id=<?php echo $row['post_id']; ?>"><i class="bi bi-pencil-square"></i></a></td>
    <td><a href="deletepost.php?post_id=<?php echo $row['post_id']; ?>&cat_id=<?php echo $row['category']; ?>"><i class="bi bi-trash3-fill text-danger"></i></a></td>

  </tr> 
  <?php
   
  }
  ?>
  
     
  </table>
</body>
</html>