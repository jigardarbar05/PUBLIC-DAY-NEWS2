<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/row.css">
<title> show post</title>
</head>
<body>
  <?php
  include("nav.php");
  ?>
  
<section class="d-flex justfy-content-center h-100 min-vh-100 ">
<div class="container">
    <div class="row gy-2">
      <?php
      include("connection.php");

    $query="SELECT * FROM post LEFT JOIN category ON post.category=category.cat_id
     WHERE post_id=".$_GET['post_id'];
      $res=mysqli_query($conn,$query);
      $post=mysqli_num_rows($res)>0;
      if($post)
      {

        while($row=mysqli_fetch_assoc($res))
       
        {
          ?>
 <div class="col-12" id="cl">
            <div class="card-body">
            <div class="box-bg-primary h-100 d-flex  flex-column text-black">
            <img class="ab"src="Admin/PIMAGE/<?php echo $row['image'];?>" width="100%"/>
            <h3 class="card-category"><?php echo $row['cat_name'];?></h3>
           <h2 class="card-title"><?php echo $row['title'];?></h2>
           <h6 class="card-date"><?php echo $row['date'];?></h6>
           
             <?php
             if($row>1)
             {
               echo $row['description'];
             }
              ?>
               <a id="dd"href="index.php">Read Less</a>
</div>
          
</div></div>
          <?php
        }
      }
      ?>
    
      </div></div>
      </section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    

</body>

</html>