<!DOCTYPE html>
<html lang="en">
<head> 
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <?php include("nav.php");
   ?>
    </head>
<body>
  <style>
    form {
     background-color: rgb(235, 235, 235);
   
    border: 2px solid black;
    border-radius: 0.5rem;
   }
  </style>
  <?php
  // session_start();
  $a=$_SESSION["email"];
  if($a==null)
  {
header("location:login.php");
  }
  else
  {
  ?>
  
    <div class="container-fluid">
        <div class="row" style="display: flex; justify-content: center; align-items: center;padding-top: 3rem;">
            <div class="col-md-5" style="display: flex; justify-content: center; align-items: center;">
                <form action="post.php" method="POST" enctype="multipart/form-data"style="border: 1px solid black;padding: 2rem;" >
                    <h4 >Your Post</h4>
                    <div class="mb-2">
                     
                    <label for="exampleFormControlInput1" class="form-label" text="black">Title</label>
                    <input type="text" name="title" class="form-control"  id="exampleFormControlInput1" Required>
                  </div>
            <div class="mb-2">
                    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3" Required></textarea>
                  </div><br>
                  <div class="mb-2">
                    <label for="exampleFormControlInput1" class="form-label">Category</label>
                      <select name="category"id="#" Required>
                      <option disabled>select category</option>
                      <?php

                      include("connection.php");
                      $que="SELECT * FROM category";
                      $po=mysqli_query($conn,$que);
                      if(mysqli_num_rows($po)>0){
                        while($IM= mysqli_fetch_assoc($po)){
                          echo "<option value='{$IM['cat_id']}'>{$IM['cat_name']}</option>";
                        }
                      }
                      ?>
                     </select>
                  </div><br>
                  <div class="mb-2"> 
                    <input type="file" name="image" class="form-control" Required />
                  </div><br>
                <div class="mb-2">
                 <input type="submit" value="submit" name="submit">
                  </div>
                </form>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<?php  
}
?>
</body>
</html>
<?php

include("connection.php");

if(isset($_FILES['image']))
{
  $file_name=$_FILES['image']['name'];
  $file_size=$_FILES['image']['size'];
  $file_tmp=$_FILES['image']['tmp_name'];
  $file_type=$_FILES['image']['type'];

  // if(in_array($file_ext,$extensions) ===false)
  //  {
  //   $errors[] ="this is extension file not allowed,plese choose a jpg or png file";
    
  //  }
     if(empty($errors) ==true)
   {
    move_uploaded_file($file_tmp,"Admin/PIMAGE/".$file_name);
   }
   else{
    echo"
    <script> alert('image size must me not allowed');</script>
    die();
    ";
   }
  
}


if(isset($_POST['submit']))
{
 

$title = $_POST["title"];
$description = $_POST["description"];
$category = $_POST["category"];
$date = date("d M,Y");
$user_id=$_SESSION['user_id'];

$query="INSERT INTO post (user_id,title,description,category,date,image)VALUES('$user_id','$title','$description','$category','$date','$file_name');";
$query.="UPDATE category SET post = post + 1 WHERE cat_id={$category}";


if(mysqli_multi_query($conn,$query))
{
 $_SESSION["cat_name"]='category';
  
  header("location:index.php");

}
else{
  echo
  "connection failed";
}
}

?>
<?php
  include("footer.php");
  ?>