


<?php 
include("dbconnect.php");

$fic = mysqli_real_escape_string($con,$_POST['fic']);
$fpwd =  mysqli_real_escape_string($con,$_POST['fpwd']);
$cpwd =  $_POST['cpwd'];
$fname=  mysqli_real_escape_string($con,$_POST['fname']);
$fadd =  mysqli_real_escape_string($con,$_POST['fadd']);
$fcontact =  mysqli_real_escape_string($con,$_POST['fcontact']);
$flno =  mysqli_real_escape_string($con,$_POST['flno']);

// Check if IC number and email is already registered
$select = " SELECT u_id FROM tb_user WHERE u_id='$fic' ";
$result = mysqli_query($con, $select);

//declare boolean
$fcontactBool = true;
$ficBool = true;
$isTrue = true;
$fnameBool = true;
$icBool = true;
$emailBool = true;
$passBool = true;
if ($fic == '' || $fpwd == '' || $fname == '' || $fadd == '' || $fcontact == '' || $flno == '') {
    header('location: register.php?message0');
}

// Check if name is not numeric
if (is_numeric($fname)) {
    $isTrue = false;
    $fnameBool = false;
    header('location: register.php?message1');
}

if (mysqli_num_rows($result) > 0) {
    $isTrue = false;
    $icBool = false;
    header('location: register.php?message2');
}

    // Check if passwords match
if ($fpwd != $cpwd) {
    $isTrue = false;
    $passBool = true;

    header('location: register.php?message3');
}
//check ic num is numeric
if (!is_numeric($fic)) {
    $isTrue = false;
    $ficBool = false;
    header('location: register.php?message4');
}
//check phone is numeric
if (!is_numeric($fcontact)) {
    $isTrue = false;
    $fcontactBool = false;
    header('location: register.php?message5');
}
if ($fpwd == $cpwd) {
    $hashPassword = password_hash($fpwd, PASSWORD_BCRYPT);
    // Insert hashed password into the database
    // ...
}
if ($isTrue == true) {
    // Insert data into database
    $sql = "INSERT INTO tb_user(u_id, u_pwd, u_name, u_address, u_phone, u_lno, u_type) VALUES('$fic', '$hashPassword', '$fname', '$fadd', '$fcontact', '$flno', '2')";
    mysqli_query($con, $sql);
    mysqli_close($con);
    header("Location: login.php?message6");
    //        function_alert("Successfully registered. Please log to view profile");
}


