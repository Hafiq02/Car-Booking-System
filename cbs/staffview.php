<?php 
include ('dbconnect.php');
include 'cbssession.php';
if(!session_id())
{
	session_start();
}



include 'headerstaff.php';



//retrieve individual bookings 

$sql = "SELECT * FROM tb_booking 
		LEFT JOIN tb_vehicle ON tb_booking.b_vehicle = tb_vehicle.v_reg
		LEFT JOIN tb_status ON tb_booking.b_status = tb_status.s_id
		LEFT JOIN tb_user ON tb_booking.b_customer = tb_user.u_id
		WHERE b_status !='1' ";
$result = mysqli_query($con,$sql);


?>

<?php 

if (isset($_POST['search'])) {
    $search = mysqli_real_escape_string($con, $_POST['search']);
    $sql = "SELECT * FROM tb_booking 
            LEFT JOIN tb_vehicle ON tb_booking.b_vehicle = tb_vehicle.v_reg
            LEFT JOIN tb_status ON tb_booking.b_status = tb_status.s_id
            LEFT JOIN tb_user ON tb_booking.b_customer = tb_user.u_id
            WHERE b_status !='1' 
            AND (b_id LIKE '%$search%' OR u_name LIKE '%$search%' OR v_model LIKE '%$search%')";
    $result = mysqli_query($con, $sql);
} else {
    // retrieve individual bookings 
    $sql = "SELECT * FROM tb_booking 
            LEFT JOIN tb_vehicle ON tb_booking.b_vehicle = tb_vehicle.v_reg
            LEFT JOIN tb_status ON tb_booking.b_status = tb_status.s_id
            LEFT JOIN tb_user ON tb_booking.b_customer = tb_user.u_id
            WHERE b_status !='1'";
    $result = mysqli_query($con, $sql);
}

?>


<?php 
if(isset($_POST['submitreset'])){

$sql = "SELECT * FROM tb_booking 
    LEFT JOIN tb_vehicle ON tb_booking.b_vehicle = tb_vehicle.v_reg
    LEFT JOIN tb_status ON tb_booking.b_status = tb_status.s_id
    LEFT JOIN tb_user ON tb_booking.b_customer = tb_user.u_id
    WHERE b_status !='1' ";
$result = mysqli_query($con,$sql);

}

?>

<div class="container">
	<br><h3> Booking List</h3>
  <div class="container-fluid">
   <form method="post">
    <div class="form-group">
      <input type="text" class="form-control" name="search" placeholder="Search by booking id, customer name or vehicle">
    </div>
    <button type="submit" name="submit" class="btn btn-success">Search</button>
    <button type="submit" name="submitreset" class="btn btn-warning">Back</button>
  </form></div>
<table class="table table-hover ">
  <thead>
    <tr>
      <th scope="col">Booking ID</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Vehicle</th>
      <th scope="col">Pick-up Date</th>
      <th scope="col">Return Date</th>
      <th scope="col">Total Price</th>
      <th scope="col">Status</th>
      <th scope="col">Operation</th>
    </tr>
  </thead>
  <tbody>
  	<?php 
  		while($row=mysqli_fetch_array($result))
  		{

  			echo'<tr>';
  			echo"<td>".$row['b_id']."</td>";
  			echo"<td>".$row['u_name']."</td>";
  			echo"<td>".$row['v_model']."</td>";
  			echo"<td>".$row['b_pdate']."</td>";
  			echo"<td>".$row['b_rdate']."</td>";
  			echo"<td>".$row['b_total']."</td>";
  			echo"<td>".$row['s_desc']."</td>";
  			echo"<td>";
  			echo"<a href='staffmodify.php?id=".$row['b_id']."'class= 'btn btn-warning' >Change</a> &nbsp";
  			
  			echo"</td>";
  			echo'</tr>';



  		}

  	?>
   
   
  </tbody>
</table>


</div>



<?php include 'footermain.php';?>