<?php
include("config.php");

$title = $_POST["title"];
$description = $_POST["description"];
$category = $_POST["category"];
$post_id = $_POST["post_id"];

if (!empty($_FILES['image']['name'])) {

  $file_name = $_FILES['image']['name'];
  $file_size = $_FILES['image']['size'];
  $file_tmp = $_FILES['image']['tmp_name'];
  $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);

  $valid_extension = array("jpg", "jpeg", "png");

  if (in_array($file_extension, $valid_extension)) {

    if (move_uploaded_file($file_tmp, "PIMAGE/" . $file_name)) {
      
      $sql = "UPDATE `post` SET title='{$title}',`description`='{$description}',
        `category`='{$category}',`image`='$file_name'
         WHERE post_id ='{$post_id}'";
        
        $result = mysqli_query($conn, $sql);

      if ($result) {

        echo "<script> window.location.href='amg post.php'; </script>";
        return;
        header("location:amg post.php");
        
      }
    }
  } else {
    echo "this file extension is not allowed , plese choose a jpg or png file";
  }
} else {
  $sql = "UPDATE `post` SET title='{$title}',`description`='{$description}',
  `category`='{$category}'
   WHERE post_id='{$post_id}'";

$result = mysqli_query($conn, $sql);

if ($result) {
  echo "<script> window.location.href='amg post.php'; </script>";
  return;
  header("location:amg post.php");
}
}
