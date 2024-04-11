<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/nave.css">
    <!-- <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/cardd.css"> -->
    <!-- <script defer src="js/nav.js"></script> -->
    <!-- <link rel="stylesheet" href="css/index.css"> -->

</head>

<body>

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
   border:2px solid black;
   height: 50px;
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
  
            
            </a> 


             </a> 
            
            
             <?php  
            
  if(!isset($_SESSION["email"]))
  
  {
echo "  <a id='as' href='login.php'  >login</a>";
  }
  else
  {
    // echo "  <a id='as' href='logout.php'> logout</a>";

  }
  ?>


                   </div>
        </div>
    
    </nav>
        <div class="container">
    <div class="row md-4"> 
     
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
        <div class=" col-sm-6 col-md-4 col-lg-3"> 
        <div class="card">
                  <div class="card-body">
                  <img src="Admin/PIMAGE/<?php echo $row['image'];?>"/>
                  <h2 class="card-category"><?php echo $row['cat_name'];?></h2>
                  <h2 class="card-title"><?php echo $row['title'];?></h2>
                 
                  <h6 class="card-title"><?php echo $row['date'];?></h6>  
                   <?php
                     $des=$row['description'];
                   $lent=strlen($des);
                 if($lent)
                 {
                     $sub=substr($des,0,70);
                     echo"$sub";
                     ?>
                     <form action="row.php" method="POST">
                      <input type="hidden" value="<?php echo $row['post_id'];?>" name="post_id">
                     
                      
                       <a href="row.php?post_id=<?php echo $row['post_id']; ?>"class="btn btn-primary">Read More</a>
                 </form>
                     <?php
                 }
               
                 ?>
      </div>
                
      </div>
      </div>
                
      </div>
      </div>
    <?php
  }
  
}
else{
    echo"no record found";
  }
}
   ?>
</body>
</html>

