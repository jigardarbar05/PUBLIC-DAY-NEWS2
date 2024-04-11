<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="css/indexs.css"> 
<link rel="stylesheet" href="css/nave.css">
 

<title>NEWS PROJECT</title>
    </head>
    
    
    

<body>
<?php
  
  $currentpage = basename($_SERVER['REQUEST_URI']);

  ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
                 <h6 class="navbar-brand" href="#">
          <img src="IMG/l1.png"class="image">
         
</h6>

<form class="d-flex" method="POST" >
        <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-dark" type="submit">Search</button>
      </form>     
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="true" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
  

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ms-auto mb-2 mb-lg-0">
            <a id="as" href="index.php">Home</a> 
            <a id="as" href="post.php">Post</a> 
            <a id="as" href="feedback.php">Feedback</a> 
            <a id="as" href="contect.php">Contect Us</a>
            <a id="as" href="profileuser.php">
               <?php
 
 include("connection.php");
  session_start();
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
   border:1px solid black;
   height:40px;
   width: 40px;
   border-radius: 5rem;
 }
 
   </style>                  
 <?php
 }
   }
 }
 }
 
 ?>
</a> 
  <?php 
  if(!isset($_SESSION["email"]))
  
  {
echo "  <a id='as' href='login.php'  >login</a>";
  }
  // else
  // {
  //   echo "  <a id='as' href='logout.php'>logout </a>";


  // }
  ?>


            
             </div>
        </div>
    
    </nav>
<?php

include("connection.php");
if(isset($_GET['cid'])){
$id=$_GET['cid'];
}

$cat="SELECT * FROM category WHERE post >0";
 $mo=mysqli_query($conn,$cat);
 if(mysqli_num_rows($mo)>0)
{
 
  
    ?>
     <div class="co">
     <?php
  while($ko=mysqli_fetch_assoc($mo)){
    $active="";
    if(isset($_GET['cid'])){

    if($ko['cat_id']==$id){
      $active="active";
  }
  else{
      $active="";
      
  }
    }   
    echo" <a id='bj'class='{$active}' href='cat.php?cid={$ko['cat_id']}'>{$ko['cat_name']}</a>";
  
  }
    
     
           ?>
              </div>
<?php
}
?>
</div>
</div>
</div>
  <?php
  include("slider.php");
  ?>

<!-- search post start-->
<div class="container">
    <div class="row md-6"> 
    <?php
 include("connection.php");
 if(isset($_POST['search'])){
 $search=$_POST['search'];
    $sql ="SELECT * FROM post  LEFT JOIN category ON post.category=category.cat_id
    WHERE `title` LIKE '%$search%' OR `cat_name` LIKE '%$search%' ";
    $no=mysqli_query($conn,$sql);
if(mysqli_num_rows($no)>0)
{
       while ($row = mysqli_fetch_array($no)){
    ?>


 <div class="col-sm-6 col-md-4 col-lg-3" style="width:20rem;height:27rem;"> 
  <div class="card">
            <div class="card-body">
            <img src="Admin/PIMAGE/<?php echo $row['image'];?>" style="width:17.5rem;height:12rem;margin-left:0.5rem;"/>
            <h2 class="card-category"><?php echo $row['cat_name'];?></h2>
           
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
        <div class="card-desc">
             <?php
               $des=$row['description'];
             $lent=strlen($des);
           if($lent)
           {
               $sub=substr($des,0,70);
               echo"$sub";
               ?></div>
                    <p class="card-date"><?php echo $row['date'];?></p>
                   
               <form action="row.php" method="POST">
                <input type="hidden" value="<?php echo $row['post_id'];?>" name="post_id">
               
                
                 <a href="row.php?post_id=<?php echo $row['post_id']; ?>"class="btn btn-primary" style="margin-top:-1rem;border:none;background:none;text-decoration:underline;color:blue;">Read More</a>
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
}
    
     
     ?>
</div>
</div></div>
</div></div>
<!-- search post end-->

<!-- card stat-->

<div class="container-lg">
    <div class="row md-6" id="xx"> 
      <?php
      include("connection.php");
        
    
      $query="SELECT post.post_id,registration.name,post.title,post.description,
      category.cat_name,post,post.category,post.image,post.date FROM post 
      LEFT JOIN category ON post.category=category.cat_id
      LEFT JOIN registration ON post.user_id=registration.id
      ORDER BY post.post_id DESC ";
    
    
      $res=mysqli_query($conn,$query);
      $post=mysqli_num_rows($res)>0;
      
  if($post)
      {
        while($row=mysqli_fetch_assoc($res))
        {
 ?>

 <div class=" col-sm-6 col-md-4 col-lg-3"style="width:20rem;height:27.5rem;"> 
  <div class="card">
            <div class="card-body">
            <img src="Admin/PIMAGE/<?php echo $row['image'];?>" style="width:17.5rem;height:13rem;margin-left:0.5rem;"/>
            <h4 class="card-category" id="ff"><b><?php echo $row['cat_name'];?></b></h4>
       
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

            <!-- title ed-->
        <div class="card-desc">
             <?php
               $des=$row['description'];
             $lent=strlen($des);
           if($lent)
           {
               $sub=substr($des,0,35);
               echo"$sub";
               ?></div>
                   <b><div class="card-date"><?php echo $row['date'];?></div></b> 
                    <h6 class="card-date"><?php echo $row['name']?></h6>
               
               <form action="row.php" method="POST">
                <input type="hidden" value="<?php echo $row['post_id'];?>" name="post_id">
               
                
                 <a href="row.php?post_id=<?php echo $row['post_id']; ?>"class="btn btn-primary" style="margin-top:-1rem;border:none;background:none;text-decoration:underline;color:blue;">Read More</a>
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
<!--card end -->
</div>
</div>

  </body>
</html>
<?php
  include("footer.php");
  ?>