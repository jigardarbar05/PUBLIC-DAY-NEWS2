
<?php

    include("config.php");
    $id=$_GET['user_id'];
 // User ID to unblock
$status = 'active'; // Set status to active

// Update user status in the database
$query = "UPDATE registration SET status = '$status' WHERE id = $id";

?>
