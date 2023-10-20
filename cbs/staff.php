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
    WHERE b_status ='1' ";
$result = mysqli_query($con,$sql);

$sql1 ="SELECT * FROM tb_vehicle";
$result1 = mysqli_query($con,$sql1);
$count = mysqli_num_rows($result1);

$sql2 ="SELECT * FROM tb_booking";
$result2 = mysqli_query($con,$sql2);
$count2 = mysqli_num_rows($result2);


$sql3="SELECT * FROM tb_user WHERE u_type='2'";
$result3 = mysqli_query($con,$sql3);
$count3 = mysqli_num_rows($result3);

$sql4="SELECT * FROM tb_user WHERE u_type='1'";
$result4 = mysqli_query($con,$sql4);
$count4 = mysqli_num_rows($result4);
?>

            <h1 class="m-0">Dashboard</h1>
       
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content ">
      <div class="container-fluid" style="color: black;">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $count?></h3>

                <p>Cars Total</p>
              </div>
            
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $count2?></h3>

                <p>Total Booking</p>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $count3?></h3>

                <p>User Registrations</p>
              </div>
             
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $count4?></h3>

                <p>Total Admin</p>
              </div>
         
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        </div>
        </div>
      </section>


<div class="container">
  <br><h3>New booking list</h3>
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
        echo"<a href='staffapproval.php?id=".$row['b_id']."'class= 'btn btn-warning' >Approval</a> &nbsp";
        
        echo"</td>";
        echo'</tr>';



      }

    ?>
   
   
  </tbody>
</table>


</div>



<?php include 'footermain.php';?>

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
            title:"Successfully log in.",
          });</script>';
        } ?></div>
</div>



<?php include 'footermain.php';?>