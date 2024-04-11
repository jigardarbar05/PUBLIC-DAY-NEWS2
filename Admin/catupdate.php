<?php
 include ("config.php");
$id=$_GET['id'];
if(isset($_POST['update']))

{
  
$name = $_POST["name"];

$query = mysqli_query($conn,"UPDATE category SET
cat_name='$name' where cat_id='$id'");



if($query)
{
 header("location:amg cat.php");
}
else{
  echo
  "connection failed";
}
}
?>
<?php
include("config.php");
session_start();
if(!isset($_SESSION["emailid"]))
{
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>catgory</title>
    <link rel="stylesheet" href="acss/cat.css">
</head>                 
<body>
<?php
include("anave.php");
?>
    <div class="dark-container">
    <?php
    include("config.php");
    
$up="SELECT * FROM category WHERE cat_id=$id";

$UPDATE=mysqli_query($conn,$up);
$row=mysqli_fetch_assoc($UPDATE);

?>
        <form class="dark-form" method="POST">
            <h2>update Category</h2>
            <label for="cat no">Cat No:</label>
            <input type="cat no" id="cat no" name="cat no"value="<?php echo $row['cat_id']?>" required>

            <label for="name">Cat Name:</label>
            <input type="text" id="name" name="name"value="<?php echo $row['cat_name']?>" required>

            <button type="submit" name="update" value="update">update</button>
        </form>
    </div>


</body>
</html>