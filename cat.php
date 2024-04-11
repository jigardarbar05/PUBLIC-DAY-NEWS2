<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/nave.css">
    <link rel="stylesheet" href="css/cat.css"> 
    
  
    <title> BK PROJECT</title>
    
  </head>
  <body>
    <?php
  include("nav.php");
  ?>
  <?php
 $currentpage = basename($_SERVER['REQUEST_URI']);
?>
 
  
  <?php

include("connection.php");
$id=$_GET['cid'];


$cat="SELECT * FROM category WHERE post >0";
 $mo=mysqli_query($conn,$cat);
 if(mysqli_num_rows($mo)>0)
{
 
    ?>
     
     <div class="mp">
     <?php
  while($ko=mysqli_fetch_assoc($mo)){
    if($ko['cat_id']==$id){
      $active="active";
  }
  else{
      $active="";
      
  }
   
    echo" <a id='aj' class='{$active}' href='cat.php?cid={$ko['cat_id']}'>{$ko['cat_name']}</a>";
    
  
  }
    
     
           ?>
              </div>
<?php
}
?>


<section class="d-flex justfy-content-center h-100 min-vh-100 ">
<div class="container" id="md">
    <div class="row gy-2">
      <?php
   
      // session_start();
      include("connection.php");
      $id=$_GET['cid'];
      
 
      $query="SELECT * FROM post LEFT JOIN category ON post.category=category.cat_id
       LEFT JOIN registration ON post.user_id=registration.id
      where category=$id";
      $res=mysqli_query($conn,$query);
      $post=mysqli_num_rows($res)>0;
      
  if($post)
      {
              
  
        while($row=mysqli_fetch_assoc($res))
        {
            if($row['category']==$id){
                $active="active";
            }
            else{
                $active="";
                
            }
          ?>
 <div class=" col-sm-6 col-md-4 col-lg-4">
            <div class="card-body">
            <div class="box-bg-primary h-100 d-flex  flex-column text-black">
            <img class="ab"src="Admin/PIMAGE/<?php echo $row['image'];?>" width="100%"/>
            <h3 class="card-category"><?php echo $row['cat_name'];?></h3>
     
      <!-- title st-->
      <div class="card-title">
             <?php
               $title=$row['title'];
             $lent=strlen($title);
           if($lent)
           {
               $ti=substr($title,0,40);
  ?>
<h5><?php
             echo"$ti";
?></h5>
               <?php
               ?></div>
               <!-- title end -->
            <div class="desc card-title">
             <?php
               $des=$row['description'];
             $lent=strlen($des);
           if($lent)
           {
               $sub=substr($des,0,50);
               echo"$sub";
               ?>
               </div>
              <h6 class="card-date"><?php echo $row['date'];?></h6>
              <h6 class="card-date"><?php echo $row['name']?></h6>
              <form action="row.php" method="POST">
                <input type="hidden" value="<?php echo $row['post_id'];?>" name="post_id">
               <a id="aa"href="row.php?post_id=<?php echo $row['post_id']; ?>"class="btn mt-auto">read more</a>
          </form>
               <?php
           }
         
           ?>
</div>
          
</div></div>
          <?php
        }
      }
    }
     ?>
 </div>
      </div>
      </section>
    </body>
    </html>
    <?php
  include("footer.php");
  ?>