<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
   <link rel="icon" type="image/x-icon" href="img/favicon.ico">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Google Font: Source Sans Pro -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
  <!-- Font Awesome -->
<!-- <link rel="stylesheet" href="AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css"> -->
  <!-- SweetAlert2 -->
  <!-- <link rel="stylesheet" href="AdminLTE-3.2.0/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css"> -->
  <!-- Toastr -->
  <!-- <link rel="stylesheet" href="AdminLTE-3.2.0/plugins/toastr/toastr.min.css"> -->
 <!-- SweetAlert2 -->
 <!--  <link rel="stylesheet" href="css/bootstrap.min.css"/>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="AdminLTE-3.2.0/plugins/sweetalert2/sweetalert2.min.js"></script> -->

  <style>
.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: teal;
   color: floralwhite;
   text-align: center;
}

</style>
</head>
<?php 
$uid = $_SESSION['uid'];
$sql = "SELECT *FROM tb_user WHERE u_id = '$uid'";

$result=mysqli_query($con, $sql);
$row=mysqli_fetch_array($result);

if($row['u_type']==1) //customer
{     

  header('location:customer.php');
}  

?>
<body>

  <!-- NAVBAR-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="customer.php">CarYuh</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
        <!-- <li class="nav-item">
          <a class="nav-link active" href="index.php">Home
            <span class="visually-hidden">(current)</span>
          </a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="customer.php">Book</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="customermanage.php">Manage</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="profile.php">Edit Profile</a>
        </li>
        <li class="nav-item">
         <a class="nav-link" href="#" onclick="return confirmLogout()">Logout</a>

<script>
  function confirmLogout() {
    var result = confirm("Are you sure you want to logout?");
    if (result) {
      window.location = "logout.php";
    }
    return false;
  }
</script>

        </li>
        
      </ul>
      
    </div>
  </div>
</nav>



</body>
</html>
