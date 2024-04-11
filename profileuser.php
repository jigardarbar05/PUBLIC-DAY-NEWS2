 
<!DOCTYPE html>
<html lang="en">

<head>
  
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Profile</title>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <meta name="author" content="Codeconvey" />
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!--Only for demo purpose - no need to add.-->
  <!-- <link rel="stylesheet" href="css/nave.css"> -->
  <link rel="stylesheet" href="css/profil.css">
  <link rel="stylesheet" href="css/card1.css">
</head>

<body>
<?php
  include("nav.php");
  ?>

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
  
  <header class="ScriptHeader">
    <div class="rt-container">
      <div class="col-rt-12">
        <div class="rt-heading">

        </div>
      </div>
    </div>
  </header>
  
 <?php
  include("connection.php");
  
  $sp = $_SESSION['email'];
  $sql = "SELECT *FROM registration where email='$sp'";
  $gresult = mysqli_query($conn, $sql);
  if ($gresult) {
    if (mysqli_num_rows($gresult) > 0) {
      while ($row = mysqli_fetch_array($gresult)) {
        $name = $row["name"];
        $city = $row["city"];
        $gender = $row["gender"];
        $mobile = $row["mobile"];
        $email = $row["email"];
        $image = $row["profile_image"];
      }
    }
  }


  ?>
 
  <section>
    <div class="rt-container">
      <div class="col-rt-12">
        <div class="Scriptcontent">

          <!-- Student Profile -->
          <div class="student-profile">
            <div class="container">
              <div class="row">
                <div class="col-lg-10">
                  <div class="card shadow-sm">
                    <div class="card-header bg-transparent text-center">
                      <img src=" <?php echo "Admin/USERPROFILE/" . $image ?>" class="pic">

                      <p><strong class="name"></strong><?php echo $name; ?>
                        <span  class="bbb" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-pencil-square"></i></span>
                       &nbsp; &nbsp; &nbsp; &nbsp; <a id='as' href='logout.php'>logout &nbsp;<i class="bi bi-box-arrow-right"></i></a>
                      </p>
                    </div>
                    <div class="card-body">

                      <table class="table">
                        <tr width="10px">
                          <th>
                            <p class="mb-10">
                              <strong class="pr-1">City:</strong>
                          </th>
                          <td class="bold"><?php echo $city; ?></p>
                          </td>
                        </tr>
                        <tr>
                          <th>
                            <p class="mb-10">
                              <strong class="pr-1">Gender:</strong>
                          </th>
                          <td class="bold"><?php echo $gender; ?></p>
                          </td>
                        </tr>
                        <tr>
                          <th>
                            <p class="mb-10">
                              <strong class="pr-1">Email:</strong>
                          </th>
                          <td class="bold"><?php echo $email; ?></p>
                          </td>
                        </tr>
                        <tr>
                          <th>
                            <p class="mb-10">
                              <strong class="pr-1">Mobile:</strong>
                          </th>
                          <td class="bold"><?php echo $mobile; ?></p>
                          </td>
                        </tr>
                        </table>
                     </div></div>
                </div></div>
            </div></div>
      </div></div>
      </div>
  </section>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <?php
          include("connection.php");
          $sp = $_SESSION['email'];
          $sql = "SELECT *FROM registration where email='$sp'";
          $gresult = mysqli_query($conn, $sql);
          if ($gresult) {
            if (mysqli_num_rows($gresult) > 0) {
              while ($row = mysqli_fetch_array($gresult)) {
          ?>
                <form id="abc" class="form-signin">
                  <h2 class="form-signin-heading">UPDATE YOUR PROFILE</h2>
                  <div class="name">Username</div>
                  <div class="form-1">
                    <input type="text" class="form-control" name="name" value="<?php echo $row['name'] ?>" Required />
                  </div>
                  <div class="name">City</div>
                  <div class="form-1">
                    <input type="text" class="form-control" name="city" value="<?php echo $row['city'] ?>" Required />
                  </div>
                  <div class="name">Gender</div>
                  <div class="form-1 d-flex" style="padding-left: 0.8rem;">
                    <input type="radio" name="gender" value="Male" <?php echo ($row['gender'] == 'Male') ?"checked" : ""; ?>>Male<div class="f">
                <input type="radio" name="gender" value="female" <?php echo ($row['gender'] == 'female') ?"checked" : ""; ?>>Female</div>
                  </div>
                  <div class="name">Mobile No</div>
                  <div class="form-1">
                    <input type="text" class="form-control" name="mobile" value="<?php echo $row['mobile'] ?>" Required />
                  </div>
                  <div class="name">Password</div>
                  <div class="form-1">
                    <input type="password" id="pwd" class="form-control" name="password" value="<?php echo $row['password'] ?>" Required />

                  </div><br>
                  <div class="name">
                    <input type="file" name="image" class="form-control">
                    <img src="Admin/USERPROFILE/<?php echo $row['profile_image']; ?>" hight="150px" width="150px">
                    <input type="hidden" name="old_image" value="<?php echo $row['profile_image']; ?>">


                  </div><br>

                  <button  id="update" name="update" class="b-1" style="height: 2.4rem; width: 7rem;"> update</button>
                  <div id="op" style="color: red;"></div>

        </div>
  <?php
              }
            }
          }
  ?>


  </form>
  <?php
  }
  ?>

      </div>


    </div>
  </div>
  </div>
 
<!-- YOUR POST -->


 <h3 class="hhh">Your Post</h3>
 
    <div class="container py-5">
    <div class="row md-4"> 
      <?php
      include("connection.php");

  
  
      $user_id=$_SESSION['user_id'];
     
      $query="SELECT * FROM post LEFT JOIN category ON post.category=category.cat_id 
      WHERE user_id=$user_id";
      $res=mysqli_query($conn,$query);
      $post=mysqli_num_rows($res)>0;
      
  if($post)
      {
              
     
        while($row=mysqli_fetch_assoc($res))
        {
          
          ?>
 <div class=" col-sm-6 col-md-4 col-lg-3"style="width:20rem;height:27rem;"> 
          <div class="card" id="dj">
       
            <img class="pro" src="Admin/PIMAGE/<?php echo $row['image'];?>" style="width:17.9rem;height:12rem;margin-left:0.3rem;margin-top:0.1rem;"/>
  <a href="delete.php?post_id=<?php echo $row['post_id']; ?>&cat_id=<?php echo $row['category']; ?>"><i class="bi bi-trash3-fill text-danger"></i></a>

            <h5 class="card-category"><?php echo $row['cat_name'];?></h5>
           
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
               $sub=substr($des,0,30);
               echo"$sub";
               ?>
               </div>
                <h6 class="card-date"><?php echo $row['date'];?></h6>
               <form action="row.php" method="POST">
                <input type="hidden" value="<?php echo $row['post_id'];?>" name="post_id">
               <a href="row.php?post_id=<?php echo $row['post_id']; ?>"id="ie">read more</a>
           </form>
               <?php
           }
           else
           {
               echo "$sub";
           }
           ?>

</div></div>

          

          <?php
        }
      }
    }
      else{
        echo"<script>";
      }
    
     ?>
    
 </div>
      </div> 
      

<!-- END CODE -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="js/reg.js"></script>
 <script>
    $(document).on("submit","#abc",function(e) {
        
        e.preventDefault();

        let formData = new FormData(this)
        $.ajax({
          url: "poupdateuser.php",
          type: 'POST',
          data: formData,
          contentType: false,
          processData: false,
          success: function(result) {
            $("#op").html(result);
          },
        })

      })
  </script>
  
</body>

</html>
<?php
  include("footer.php");
  ?>