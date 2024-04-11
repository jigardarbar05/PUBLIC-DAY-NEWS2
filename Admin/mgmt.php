<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="acss/mgmt.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
</style>
</head>
<body>
  <div class="container-fluid">
    <div class="row row-cols-2">
      <div class="col-3" id="aaa">
        <img src="images/l1.png" alt="" width="250px">
      </div>
      <div class="col-9"style="  border: 2px solid;  border-top: none;border-left:none ;border-right: none;">
        <!-- <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button> &nbsp; &nbsp; &nbsp;
          <a href="#" class="btn btn-dark">logout</a>
        </form> -->
      </div>
    </div>

    <div class="row row-cols-2">
      <div class="col-3" id="aaa">
        <div class="topnav" id="myTopnav">
          <a href="#Menu" class="active">Menu</a>
          <!-- <a class="nav-link" href="amg user.php">User</a>
            <a class="nav-link" href="amg post.php">Post</a>
            <a class="nav-link" href="amg cat.php">Category</a>
            <a class="nav-link" href="amg feedback.php">Feedback</a> -->
            <a href=" amg user.php">user</a>
            <a href=" amg post.php">post</a>
            <a href="amg cat.php">category</a>
            <a href=" amg feedback.php">feedback</a>
            <a href="logout.php">logout</a>
          <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
          </a>
        </div>
      </div>
      <div class="col-9" id="dd" style="margin-bouttm:39rem;">
<!-- new mgmt start-->
<?php
include("amg user.php");
include("amg cat.php");
?>
<!-- new mgmt end -->
  
</div>
  </div>
  
 </div>
 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="js/mgmt.js"></script>

</body>
</html>