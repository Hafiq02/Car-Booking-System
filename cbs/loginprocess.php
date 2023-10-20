<?php   
session_start();
//DB CONNECTION
include("dbconnect.php");

//RETRIEVE INPUT
$fic = mysqli_real_escape_string($con, $_POST['fic']);
$fpwd = mysqli_real_escape_string($con, $_POST['fpwd']);


//GET USER DATA FROM DB
$sql = "SELECT * FROM tb_user WHERE u_id='$fic' ";



//execute SQL
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);
$count = mysqli_num_rows($result);

//login check

if ($count == 1) { //user found
    if (password_verify($fpwd, $row['u_pwd'])) {

        $_SESSION['u_id']=session_id();
        $_SESSION['uid']=$fic;
        if ($row['u_type'] == 1) {
            header('location:staff.php?message1'); 
        }
        else{
            
            header("location:customer.php?message1");
        }
    }else{
        //password incorrect
        header('location:login.php?message1');
    }
}
else{
    header('location:login.php?email');
}

mysqli_close($con);
?>






