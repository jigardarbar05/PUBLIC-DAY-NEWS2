<?php
session_start();
include("connection.php");
if(isset($_SESSION['email'])){
    $email=$_SESSION['email'];
    $sql = "SELECT *FROM registration where email='$email'";
    $gresult = mysqli_query($conn, $sql);
    if ($gresult) {
      if (mysqli_num_rows($gresult) > 0) {
        while ($row = mysqli_fetch_array($gresult)) {
 
          ?>
 <table class="table">
                        <tr width="10px">
                          <th>
                            <p class="mb-10">
                              <strong class="pr-1">welcome:</strong>
                          </th>
                          <td class="bold"><?php echo $row['name']; ?></p>
                          </td>
                        </tr>
        </table>
<?php
        }
    }
}
}

?>