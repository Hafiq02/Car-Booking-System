<?php
include 'cbssession.php';
include ('dbconnect.php');


if (isset($_POST['submit'])) {
  $v_reg = mysqli_real_escape_string($con, $_POST['v_reg']);
  $v_type = mysqli_real_escape_string($con, $_POST['v_type']);
  $v_model = mysqli_real_escape_string($con, $_POST['v_model']);
  $v_year = mysqli_real_escape_string($con, $_POST['v_year']);
  $v_price = mysqli_real_escape_string($con, $_POST['v_price']);
  $v_img = mysqli_real_escape_string($con, $_POST['v_img']);

  $imageName = $_FILES['v_img']['name'];
  $imageError = $_FILES['v_img']['error'];
  $imageSize = $_FILES['v_img']['size'];
  $imageTempName = $_FILES['v_img']['tmp_name'];

  $filename_seperate = explode('.', $imageName);
  $file_extension = strtolower(end($filename_seperate));

  $extension = array('jpg', 'jpeg', 'png', 'pdf');
  if (in_array($file_extension, $extension)) {
    if ($imageSize > 500000) {
      $error = "Sorry,image size has exceed the limit!";
      header("location:staffaddvehicle.php?error=$error");
    } else {
      $uploadImage = 'img/' . $imageName;
      move_uploaded_file($imageTempName, $uploadImage);
      $sql = "INSERT INTO tb_vehicle (v_reg, v_type, v_model, v_year, v_price, v_img)
      VALUES ('$v_reg', '$v_type', '$v_model', '$v_year', '$v_price', '$uploadImage')";
      $result = mysqli_query($con, $sql);
      header('location: staff.php');
    }
  }
}

?>