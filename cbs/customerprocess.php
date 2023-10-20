
<?php  
include("dbconnect.php");
include 'cbssession.php';

if (!session_id())
{
        session_start();
}



$uid = $_SESSION['uid'];
$fvec =  $_POST['fvec'];
$fpdate =  $_POST['fpdate'];
$frdate = $_POST['frdate'];

//Calculate number of day
$pickup = date('Y-m-d H:i:s', strtotime($fpdate));
$return = date('Y-m-d H:i:s', strtotime($frdate));
$daydiff = abs(strtotime($frdate)-strtotime($fpdate));
//$daydiff = abs($return - $pickup)
$daynum = $daydiff/(60*60*24);

//Retrieve price from DB

$sqlprice = "SELECT v_price FROM tb_vehicle WHERE v_reg='$fvec'";
$resultprice = mysqli_query($con, $sqlprice);
$rowprice = mysqli_fetch_array($resultprice);

//Calculate total price
$totalprice = $daynum * ($rowprice['v_price']);

//Record (Insert) new booking into DB

$sql = "INSERT INTO tb_booking (b_customer, b_vehicle, b_pdate, b_rdate, b_total, b_status)
        VALUES ('$uid','$fvec','$fpdate','$frdate','$totalprice','1')" ;

mysqli_query($con, $sql);    
mysqli_close($con);

//Succesfull notification or redirect

header('location:customermanage.php?message1');

?>
