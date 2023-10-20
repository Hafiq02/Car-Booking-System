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

//Retrieve new bookings
$sql = " SELECT * FROM tb_user
         WHERE u_id = '$uid'";

$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
?>


<div class ="container">
  <h3>Customer Details</h3>

  <form class= "form-horizontal" method="POST" action="profileEdit.php"> 
    <table class="table table-hover">
      <tr> 
        <td>IC Number</td>
        <td><?php echo $uid; ?></td>
      </tr>
      <tr> 
        <td>Full Name</td>
        <td><?php echo $row['u_name']; ?></td>
      </tr>
      
       <tr> 
        <td>Address</td>
        <td><?php echo $row['u_address']; ?></td>
      </tr>
       <tr> 
        <td>Contact Number</td>
        <td><?php echo $row['u_phone']; ?></td>
      </tr>
       <tr> 
        <td>License Number</td>
        <td><?php echo $row['u_lno']; ?></td>
      </tr>
      </tr>

    </table>
    
    <input type="hidden" name="fbid" value="<?php echo $row['u_id'];?> ">
    <button type="submit" class="btn btn-warning">Edit Profile</button>
    <a href="editpassword.php" class="btn btn-warning">Change Password</a>
<br><br>


  </form>
 


</div>

<?php include 'footermain.php'
;?>