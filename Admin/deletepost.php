<?php
include("config.php");
if(isset($_GET['post_id'])){
    $id=$_GET['post_id'];
    $cat_id=$_GET['cat_id'];
    
    $query1="SELECT *FROM post WHERE post_id=$id;";
    $re=mysqli_query($conn,$query1);
    $ro=mysqli_fetch_assoc($re);
    unlink("PIMAGE/".$ro['image']);
    
    $query="DELETE FROM post WHERE post_id=$id;";
    $query.="UPDATE category SET post=post - 1 WHERE cat_id={$cat_id}";
   
   
    if(mysqli_multi_query($conn,$query))
    {
      header("location:amg post.php");
    }
}

?>