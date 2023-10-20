//dbconnect letak atas

<?php
include 'dbconnect.php';
include 'cbssession.php';


if (isset($_POST['submit'])) {
    $v_reg = mysqli_real_escape_string($con, $_POST['v_reg']);
    $v_price = mysqli_real_escape_string($con, $_POST['v_price']);

    if ($_FILES['v_img']['error'] === UPLOAD_ERR_OK) {
        $imageName = $_FILES['v_img']['name'];
        $imageTempName = $_FILES['v_img']['tmp_name'];
        move_uploaded_file($imageTempName, "img/$imageName");

        $sql = "UPDATE tb_vehicle SET v_price = '$v_price', v_img = 'img/$imageFilename' WHERE v_reg = '$v_reg'";
    } else {
        $sql = "UPDATE tb_vehicle SET v_price = '$v_price' WHERE v_reg = '$v_reg'";
    }

   if (mysqli_query($con,  $sql)) {
    header('location: staff.php');
  } else {
    echo "Error updating record: " . mysqli_error($con);
  }
}