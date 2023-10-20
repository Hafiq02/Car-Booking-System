<?php 
include ('dbconnect.php');
include 'cbssession.php';
if(!session_id())
{
  session_start();
}

include 'headercustomer.php';


//get booking ID from URL
$uid = $_SESSION['uid'];

?>
<div class="container">
  <form method="POST" action="editpasswordprocess.php">
    <fieldset>
      <legend>Edit Password</legend>
      <div class="form-group">
        <label for="exampleInputPassword1" class="form-label mt-4">Password</label>
        <input type="password" name="fpwd" class="form-control" id="exampleInputPassword1" required>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1" class="form-label mt-4">Confirm Password</label>
        <input type="password" name="cpwd" class="form-control" id="exampleInputPassword1" placeholder="Confirm Password" required>
      </div>
      <br>
      <button type="submit" class="btn btn-success">Submit</button>
      <a href="profile.php">
        <button type="button" class="btn btn-warning" onclick="window.location.href='profile.php'">Back</button>
      </a>
    </fieldset>
  </form>
</div>

  
</div>
<br><br><br><br><br>

<?php include 'footermain.php';?>