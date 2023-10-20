<?php 
include ('dbconnect.php');
include 'cbssession.php';
if(!session_id())
{
  session_start();
}

include 'headercustomer.php';

$uid = $_SESSION['uid'];



$fpwd = $_POST['fpwd'];
$cpwd = $_POST['cpwd'];

$sql = "UPDATE tb_user SET u_pwd = '$fpwd' WHERE u_id  ='$uid'";

mysqli_query($con,$sql);
mysqli_close($con);

header('location:profile.php');
?>
<div class="container">
  <h3>Registration successful.Please login to book</h3>
  <button class="btn btn-info"><a href="login.php">Login Page</a></button>
</div>


<?php 
include 'footermain.php';
?>
