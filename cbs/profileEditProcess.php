<?php 
include ('dbconnect.php');
include 'cbssession.php';
if(!session_id())
{
  session_start();
}

include 'headercustomer.php';

$uid = $_SESSION['uid'];

$ffname= $_POST['ffname'];
$fadd = $_POST['fadd'];
$fcontact = $_POST['fcontact'];
$flno = $_POST['flno'];

$sql = "UPDATE tb_user SET  u_name = '$ffname', u_address = '$fadd', u_phone = '$fcontact', u_lno ='$flno' WHERE u_id  ='$uid'";

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
