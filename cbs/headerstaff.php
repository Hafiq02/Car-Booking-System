<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
   <link rel="icon" type="image/x-icon" href="img/favicon.ico">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

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

if($row['u_type']==2) //customer
{     

  header('location:staff.php');
}  

?>
<body>

  <!-- NAVBAR-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="staff.php">CarYuh</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
                </li>
        <li class="nav-item">
<a class="nav-link" href="staff.php"> Home</a>
        </li>


     
        </li>
        <li class="nav-item">
          <a class="nav-link" href="staffview.php">Booking List</a>
        </li>
     <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Car</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="staffcarlist.php">Car list</a>
            <a class="dropdown-item" href="staffaddvehicle.php">Add Car</a>
         
          </div>
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


    </div>
  </div>
</nav>



</body>
</html>
