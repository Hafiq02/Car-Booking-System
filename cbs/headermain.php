<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
   <link rel="icon" type="image/x-icon" href="img/favicon.ico">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

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

#grad1 {
 
  background-color: red; /* For browsers that do not support gradients */
  background-image: linear-gradient(to bottom right, teal, yellow);
}
#grad2 {
 
  background-color: red; /* For browsers that do not support gradients */
  background-image: linear-gradient(to bottom right, red, yellow);
}
body {

  background-image: radial-gradient( white, floralwhite);
}
}
</style>
</head>

<body >

  <!-- NAVBAR-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand custom-font" href="index.php">CarYuh</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="index.php">Home
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="register.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
     <!--    <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
       <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Separated link</a>
          </div>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-sm-2" type="text" placeholder="Search">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
      </form>-->
    </div>
  </div>
</nav>



</body>
</html>
