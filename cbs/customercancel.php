<?php 
include ('dbconnect.php');
include 'cbssession.php';
if(!session_id())
{
  session_start();
}



//get booking from url
if(isset($_GET['id']))
{

  $bid = $_GET['id'];

}
//sql delete
$sql = "DELETE FROM tb_booking WHERE b_id='$bid'";
$result = mysqli_query($con, $sql);
mysqli_close($con);

header('location: customermanage.php');

?>