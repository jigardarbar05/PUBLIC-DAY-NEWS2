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
        <form class="dark-form" method="POST">
            <h2>Add Category</h2>
            <label for="cat no">Cat No:</label>
            <input type="cat no" id="cat no" name="cat no" required>

            <label for="name">Cat Name:</label>
            <input type="text" id="name" name="name" required>

            <button type="submit" name="submit" value="submit">Submit</button>
        </form>
    </div>


</body>
</html>
<?php
include("config.php");

if(isset($_POST['submit']))

{

$name= $_POST["name"];
$query="INSERT INTO category(cat_name)VALUES('$name')";
$RES=mysqli_query($conn,$query);
echo $query;

if($RES)
{

 header("location:amg cat.php");
}
else{
  echo
  "connection failed";
}
}
?>