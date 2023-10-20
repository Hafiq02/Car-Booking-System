<?php
include('dbconnect.php');
include 'cbssession.php';
if(!session_id())
{
    session_start();
}


//get booking ID from URL

if(isset($_GET['id']))
{
    $bid =$_GET['id'];
    $sql ="SELECT * FROM tb_booking WHERE b_vehicle= '$bid'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result)) {
        header('location:staffcarlist.php?message3');
    }else{
       
        $delete= "DELETE FROM tb_vehicle WHERE v_reg='$bid'";


        $result = mysqli_query($con,$delete);
        mysqli_close($con);
        header('location:staffcarlist.php?message2');
    }

}else{
    header('location:staffcarlist.php');
}

?>