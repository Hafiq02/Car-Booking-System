<?php 
include ('dbconnect.php');
include 'cbssession.php';
if(!session_id())
{
  session_start();
}

include 'headercustomer.php';


$uid = $_SESSION['uid'];
$now = new DateTime();
$now = $now->format("Y-m-d");
$currentDate = date("Y-m-d");

//retrieve individual bookings 
$sql = "SELECT * FROM tb_booking 
    LEFT JOIN tb_vehicle ON tb_booking.b_vehicle = tb_vehicle.v_reg
    LEFT JOIN tb_status ON tb_booking.b_status = tb_status.s_id
    WHERE b_customer = '$uid'and b_rdate >'$currentDate'";
$result = mysqli_query($con,$sql);

if(isset($_POST['search'])) {
  $search = mysqli_real_escape_string($con, $_POST['search']);
  $sql = "SELECT * FROM tb_booking 
      LEFT JOIN tb_vehicle ON tb_booking.b_vehicle = tb_vehicle.v_reg
      LEFT JOIN tb_status ON tb_booking.b_status = tb_status.s_id
      WHERE b_customer = '$uid' AND (b_id LIKE '%$search%' 
      OR v_model LIKE '%$search%' OR s_desc LIKE '%$search%')";
  $result = mysqli_query($con, $sql);
} else {
  $sql = "SELECT * FROM tb_booking 
      LEFT JOIN tb_vehicle ON tb_booking.b_vehicle = tb_vehicle.v_reg
      LEFT JOIN tb_status ON tb_booking.b_status = tb_status.s_id
      WHERE b_customer = '$uid'and b_rdate >'$currentDate'";
  $result = mysqli_query($con, $sql);
}

if(isset($_POST['back'])){
  $sql = "SELECT * FROM tb_booking 
      LEFT JOIN tb_vehicle ON tb_booking.b_vehicle = tb_vehicle.v_reg
      LEFT JOIN tb_status ON tb_booking.b_status = tb_status.s_id
      WHERE b_customer = '$uid'and b_rdate >'$currentDate'";
  $result = mysqli_query($con,$sql);
}


$sql1 = "SELECT * FROM tb_booking 
      LEFT JOIN tb_vehicle ON tb_booking.b_vehicle = tb_vehicle.v_reg
      LEFT JOIN tb_status ON tb_booking.b_status = tb_status.s_id
      WHERE b_customer = '$uid'and b_rdate <'$currentDate'";
  $result1 = mysqli_query($con, $sql1);
?>
<script type="text/javascript">function disableButtons(pickupDate) {
  const currentDate = new Date();

  if (currentDate > pickupDate) {
    document.getElementById("modify-button").disabled = true;
    document.getElementById("cancel-button").disabled = true;
  }
}


</script>

<div class="container">
  <br><h3>Your booking list</h3>
 <section class="container-fluid" >
  <div class="col-sm-6">
  <form method="post">
    <div class="form-group">
      <input type="text" class="form-control" name="search" placeholder="Search booking by vehicle model or booking ID">
    </div>
    <button type="submit" name="search" class="btn btn-success">Search</button>
    <button type="submit" name="back" class="btn btn-warning">Back</button>
</div>
</section>

<div class="table-responsive">
  <label>Current Booking</label>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Booking ID</th>
        <th>Vehicle Model</th>
        <th>Pick-up Date</th>
        <th>Return Date</th>
        <th>Status</th>
        <th>Modify</th>
        <th>Cancel</th>
      </tr>
    </thead>
    <tbody>
      <?php while($row = mysqli_fetch_array($result)): ?>
        <tr>
          <td><?php echo $row['b_id']; ?></td>
          <td><?php echo $row['v_model']; ?></td>
          <td><?php echo $row['b_pdate']; ?></td>
          <td><?php echo $row['b_rdate']; ?></td>
          <td><?php echo $row['s_desc']; ?></td>
          <!-- Disable modify button if pick-up date is earlier than current date -->
          <td>
            <?php if ($row['b_pdate'] < $now): ?>
              <button type="button" class="btn btn-secondary" disabled>Modify</button>
            <?php else: ?>
              <a href="customermodify.php?id=<?php echo $row['b_id']; ?>" class="btn btn-warning">Modify</a>
            <?php endif; ?>
          </td>
          <!-- Disable cancel button if pick-up date is earlier than current date -->
          <td>
            <?php if ($row['b_pdate'] < $now): ?>
              <button type="button" class="btn btn-secondary" disabled>Cancel</button>
            <?php else: ?>
              <a href="customercancel.php?id=<?php echo $row['b_id']; ?>" class="btn btn-danger">Cancel</a>
            <?php endif; ?>
          </td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>


<div class="table-responsive">
  <label>Previous Booking</label>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Booking ID</th>
        <th>Vehicle Model</th>
        <th>Pick-up Date</th>
        <th>Return Date</th>
        <th>Status</th>
     
      </tr>
    </thead>
    <tbody>
      <?php while($row1 = mysqli_fetch_array($result1)): ?>
        <tr>
          <td><?php echo $row1['b_id']; ?></td>
          <td><?php echo $row1['v_model']; ?></td>
          <td><?php echo $row1['b_pdate']; ?></td>
          <td><?php echo $row1['b_rdate']; ?></td>
          <td><?php echo $row1['s_desc']; ?></td>
          
     
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>
<div><?php if (isset($_GET['message1'])) {
          echo '<script>
          var Toast = Swal.mixin({
          toast: true,
          position: "top",
          showConfirmButton: false,
          timer: 3000,
        });
        Toast.fire({
            icon: "success",
            title:"Successfully booked.",
          });</script>';
        } ?></div>
</div>
<!-- include footer -->
<?php include 'footermain.php'; ?>