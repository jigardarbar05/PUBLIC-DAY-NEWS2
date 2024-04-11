<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/forget.css">
</head>
<body>

<div class="form-gap"></div>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Forgot Password?</h2>
                  <p>You can reset your password here.</p>
                  <div class="panel-body">
    
                    <form id="register-form" role="form" autocomplete="off" class="form" method="post">
    
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input id="email" name="emailid" placeholder="email address" class="form-control"  type="email" Required>
                        </div><br>
                        <div class="input-group">
                               <input id="email" name="fnum" placeholder="favourite number" class="form-control"  type="num" Required>
                        </div><br> 
                       <div class="input-group">
                             <input id="email" name="fword" placeholder="favourite word" class="form-control"  type="text" Required>
                        </div>
                      </div>
                      <div class="form-group">
                        <input name="submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                      </div>
                      
                      <input type="hidden" class="hide" name="token" id="token" value=""> 
                    </form>
    
                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>
</body>
</html>
<?php
include("connection.php");
session_start();
if(isset($_POST['submit']))
{

$enteredEmail = $_POST['emailid'];
$num=$_POST['fnum'];
$fword=$_POST['fword'];

$sql="SELECT email,fnum,fword FROM registration WHERE email='$enteredEmail'AND fnum='$num'AND fword='$fword'";

$result = $conn->query($sql);
 
if (!$result) {
    die("Query failed: " . $conn->error);
}

if ($result->num_rows > 0) {
$_SESSION['email']=$enteredEmail;
// $_SESSION['fnum']=$num;
// $_SESSION['fcelebrity']=$celebrity;
    header("Location: newpass.php");
    exit();
} else {

    echo"
    <script> alert('invalid detail
    ');</script>";
}

$conn->close();

}
?>
