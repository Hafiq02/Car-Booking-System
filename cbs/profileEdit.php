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

$sql = "SELECT * FROM tb_user WHERE u_id='$uid'";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);
?>

<div class="container">
<form method="POST" action="profileEditProcess.php">
  <fieldset>
    <legend>Edit Profile</legend>

     <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Full Name</label>
      <input type="text" name ="ffname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"value="<?php echo $row['u_name']?>" required>
    </div>
    <div class="form-group">
     
    </div>
    <div class="form-group">
    
    </div>
    <div class="form-group">
      <label for="exampleTextarea" class="form-label mt-4">Address</label>
      <textarea class="form-control" name="fadd" id="exampleTextarea" rows="3"><?php echo $row['u_address']; ?></textarea>
    </div>
   
    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Contact Number</label>
      <input type="text" class="form-control" name ="fcontact" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $row['u_phone']?>" required>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">License Number</label>
      <input type="text" name ="flno" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $row['u_lno']?>" required>
    </div><br>
     <button type="submit" class="btn btn-success">Submit</button>
  <a href="profile.php"><button  class="btn btn-warning">Back</button></a>
 </fieldset>
</form>
  
  
</div>
<br><br><br><br><br>

<?php include 'footermain.php';?>