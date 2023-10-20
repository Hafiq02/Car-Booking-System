
<?php  
include("dbconnect.php");
include 'cbssession.php';

if (!session_id())
{
        session_start();
}



//retrieve data from approval page
$fbid = $_POST['bid'];
$fstatus =  $_POST['fstatus'];

//UPDATE booking status 

// $sql =$_POST['proofstatus'];
$sql = "UPDATE tb_booking
        SET b_status='$fstatus'
        WHERE b_id ='$fbid'";

mysqli_query($con, $sql);    
mysqli_close($con);

//Succesfull notification or redirect

header('location:staff.php');

?>