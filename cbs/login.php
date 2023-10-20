<?php

 include 'headermain.php';?>


<style>
#grad1 {
 
  background-color: red; /* For browsers that do not support gradients */
  background-image: linear-gradient(to bottom right, teal, yellow);
}
#grad2 {
 
  background-color: red; /* For browsers that do not support gradients */
  background-image: linear-gradient(to bottom right, red, yellow);
}
</style>
<section class="h-100 gradient-form" style="background-color: #4aaba5;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-4 text-black" >
          <div class="row g-0">
            <div class="col-lg-6"style="background-color:  #eee;">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <img src="img/CarYuh2.png"
                    style="width: 185px;" alt="logo">
                  <h4 class="mt-1 mb-5 pb-1">Welcome To Car Yuh</h4>
                </div>

               <form method="POST" action="loginprocess.php">
                  <p>Please login to your account</p>

                  <div class="form-outline mb-4">
                   <input type="text" name="fic" class="form-control" id="exampleInputPassword1" placeholder="Please enter your registration number" required>
                    <label class="form-label" for="form2Example11">Username</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" name="fpwd" class="form-control" id="exampleInputPassword1" placeholder="Please enter your password"required>
                    <label class="form-label" for="form2Example22">Password</label>
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                    <button type="submit"  class="btn btn-success btn-block fa-lg gradient-custom-2 mb-3" type="button">Log
                      in</button>
                       <button type="reset" id="grad2" class="btn btn-danger btn-block fa-lg gradient-custom-2 mb-3" type="button">Clear Form</button>
                       
                  
                  </div>

                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2">Don't have an account?</p><a href="register.php">   <button  type="button" class="btn btn-outline-warning">Create new</button></a>
                 
                  </div>

                </form>

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2"id="grad1">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4">We are more than just a company</h4>
                <p class="small mb-0">Dear valued customers,

We hope this message finds you well. We wanted to take a moment to thank you for choosing our car rental company for all your transportation needs. We are dedicated to providing you with the best possible experience, and we are always working to improve our services. As a registered customer, you have access to a wide range of benefits and exclusive offers. You can easily manage your reservations and profile information online, and enjoy faster check-in and check-out times. We are grateful for your loyalty, and we look forward to serving you again in the future. If you have any questions or concerns, please don't hesitate to reach out to our customer support team.

Best regards,
</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class=" gradient-form" style="background-color: #4aaba5;"><div class="container py-5 h-100"></div>
</section>
<div><?php if (isset($_GET['message1'])) {
          echo '<script>
          var Toast = Swal.mixin({
          toast: true,
          position: "top",
          showConfirmButton: false,
          timer: 3000,
        });
        Toast.fire({
            icon: "error",
            title:"Unsuccessful login. Please enter a valid info",
          });</script>';
        } ?></div>
</div>

<div><?php if (isset($_GET['message6'])) {
          echo '<script>
          var Toast = Swal.mixin({
          toast: true,
          position: "top",
          showConfirmButton: false,
          timer: 3000,
        });
        Toast.fire({
            icon: "success",
            title:"Successfully registered. Please log to view profile",
          });</script>';
        } ?></div>
</div>

<?php include 'footermain.php';?>