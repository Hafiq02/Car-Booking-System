<?php include 'headermain.php';?>
>
<div class="container ">
	

<form method="POST" action="registerprocess.php">
  <fieldset>
    <legend style="color:black;">Registration forms</legend>
    <div class="form-group row">
   
      <div class="col-sm-10">
        
    </div> 

  <div class="form-group">
      <label for="exampleInputPassword1"style="color:black;" >Enter IC number</label>
      <input type="text" name="fic" class="form-control" id="exampleInputPassword1" placeholder="Please enter your registration number" required>
    </div>

     <div class="form-group">
      <label style="color:black;" for="exampleInputPassword1"> Create Password</label>
      <input type="password" name="fpwd" class="form-control" id="exampleInputPassword1" placeholder="Please create strong password"required>
    </div>
      <div class="form-group">
      <label style="color:black;" for="exampleInputPassword1"> Confirm Password</label>
      <input type="password" name="cpwd" class="form-control" id="exampleInputPassword1" placeholder="Please create strong password"required>
    </div>

  
    <div class="form-group">
      <label style="color:black;" for="exampleInputPassword1"> Fullname</label>
      <input type="text" name="fname" class="form-control" id="exampleInputPassword1" placeholder="Enter your fullname"required>
    </div>

    <div class="form-group">
      <label style="color:black;" for="exampleInputPassword1"> Current address</label>
  <textarea class="form-control" name="fadd" id="exampleTextarea" rows="3" placeholder="Enter your complete adrress"></textarea>
    </div>


    <div class="form-group">
      <label style="color:black;" for="exampleInputPassword1"> Contact Number</label>
      <input type="text" name="fcontact" class="form-control" id="exampleInputPassword1" placeholder="Please enter your phone number" required>
    </div>


    <div class="form-group">
      <label style="color:black;" for="exampleInputPassword1">License Number</label>
      <input type="text" name="flno" class="form-control" id="exampleInputPassword1" placeholder="Enter your license number"required>

    </div>



   <br><br><br>
 
  </fieldset>
  <br>
  <button type="submit" class="btn btn-success">Register</button>
  <button type="reset" class="btn btn-danger">Clear Form</button>
</form>
<br>

<br><br><br>
 <div><?php if (isset($_GET['message0'])) {
          echo '<script>
          var Toast = Swal.mixin({
          toast: true,
          position: "center-top",
          showConfirmButton: false,
          timer: 3000,
        });
        Toast.fire({
            icon: "warning",
            title: "Error: The field is left empty",
          });</script>';
        } ?></div>
  <div><?php if (isset($_GET['message1'])) {
          echo '<script>
          var Toast = Swal.mixin({
          toast: true,
          position: "top-center",
          showConfirmButton: false,
          timer: 3000,
        });
        Toast.fire({
            icon: "warning",
            title: "Error: Name should not be numeric",
          });</script>';
        } ?></div>
  <div><?php if (isset($_GET['message2'])) {
          echo '<script>
          var Toast = Swal.mixin({
          toast: true,
          position: "center-top",
          showConfirmButton: false,
          timer: 3000,
        });
        Toast.fire({
            icon: "warning",
            title: "Error: IC number is already registered",
          });</script>';
        } ?></div>
 
  <div><?php if (isset($_GET['message3'])) {
          echo '<script>
          var Toast = Swal.mixin({
          toast: true,
          position: "center-top",
          showConfirmButton: false,
          timer: 3000,
        });
        Toast.fire({
            icon: "warning",
            title: " Error: Passwords do not match",
          });</script>';
        } ?></div>
        <div><?php if (isset($_GET['message4'])) {
          echo '<script>
          var Toast = Swal.mixin({
          toast: true,
          position: "center-top",
          showConfirmButton: false,
          timer: 3000,
        });
        Toast.fire({
            icon: "warning",
            title:" Error: IC number must be numeric",
          });</script>';
        } ?></div>
        <div><?php if (isset($_GET['message5'])) {
          echo '<script>
          var Toast = Swal.mixin({
          toast: true,
          position: "center-top",
          showConfirmButton: false,
          timer: 3000,
        });
        Toast.fire({
            icon: "warning",
            title:" Error: Phone Number must be numeric",
          });</script>';
        } ?></div>

  




<?php include 'footermain.php';?>