
<?php

include("config.php");
if(isset($_GET['user_id'])){
$id=$_GET['user_id']; // User ID to block

$change_status_query = mysqli_query($conn,"UPDATE registration SET  id=$id ");
 if($change_status_query){
 	echo "block";
 }
else{
    echo "not block";

}

}
?>
