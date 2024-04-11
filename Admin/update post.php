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
    <title>update post</title>
            
  </head>
   <body >
   <?php
include("anave.php");
?>
   <div class="wrapper">
      
      <?php
    include("config.php");
    $id=$_GET['post_id'];    
    $up="SELECT * FROM post WHERE post_id=$id";
    $UPDATE=mysqli_query($conn,$up);
    $row=mysqli_fetch_assoc($UPDATE);


?>
         <div class="container-fluid">
        <div class="row" style="display: flex; justify-content: center; align-items: center;padding-top: 3rem;">
            <div class="col-md-5" style="display: flex; justify-content: center; align-items: center;">
                <form id="update_form" style="border: 1px solid black;padding: 2rem;" >
                    <h4 > update Your Post</h4>
                    <div class="mb-2">
                    <input type="hidden" name="post_id" value="<?php echo $row['post_id'];?>">
                    </div>
                    <div class="mb-2">
                     
                    <label for="exampleFormControlInput1" class="form-label" text="black">Title</label>
                    <input type="text" name="title" value="<?php echo $row['title'];?>" class="form-control"  id="exampleFormControlInput1" Required>
                  </div>
            <div class="mb-2">
                    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                    <textarea class="form-control" name="description"  Required><?php echo $row['description'];?></textarea>
                  </div><br>
                  <div class="mb-2">
                    <label for="exampleFormControlInput1" class="form-label">Category</label>
                      <select name="category"id="#"value="<?php echo $row['category'];?>" Required>
                      <option disabled>select category</option>
                      <?php

include("config.php");
$que="SELECT * FROM category";
$po=mysqli_query($conn,$que);
if(mysqli_num_rows($po)>0){
  while($IM= mysqli_fetch_assoc($po)){
    if($row['category']==$IM['cat_id']){
      $selected="selected";
    }
    else{
      $selected="";
    }
    echo "<option {$selected} value='{$IM['cat_id']}'>{$IM['cat_name']}</option>";
  }
}
?>
 </select>
  </div><br>
            <div class="mb-2"> 
            <input type="file" name="image"class="form-control">
            <img src="PIMAGE/<?php echo $row['image'];?>" hight="150px" width="150px">
          <input type="hidden" name="old_image" value="<?php echo $row['image'];?>">
         

        </div><br>
                <div class="mb-2">
                 <input type="submit" value="update" name="update">
                  </div>
                </form>
            </div>
        </div>
    </div>
 
       </div>
   <!-- Option 1: Bootstrap Bundle with Popper -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="js/reg.js"></script>

<div id="op" style="color: red;"></div>

<script>
     $(document).ready(function () {

      $("#update_form").on("submit", function (event) {
            event.preventDefault();
           
            let formData = new FormData(this)
            $.ajax({
                url: "up.php",
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (result) {
                  $("#op").html(result);
                },
            })
      })
     })
</script>
</body>
</html>