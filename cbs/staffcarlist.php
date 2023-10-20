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


  $sql1 ="SELECT *FROM tb_vehicle";
$result1 = mysqli_query($con,$sql1);
?>



    
  
   <div class="container ">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-sm-8 ">
            <h1 class="text-center my-4">Car List</h1>
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col-sm-6">Car Image</th>
                        <th scope="col-sm-6">Model</th>
                        <th scope="col-sm-6">Year</th>
                         <th scope="col-sm-6">Vehicle Registration</th>
                        <th scope="col-sm-6">Price</th>
                        
                        <th scope="col"></th>
                        <th scope="col"></th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM tb_vehicle";
                    $result = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td>
                                <img class="img-thumbnail" src="<?php echo $row['v_img']; ?>">

                            </td>
                            <td><?php echo $row['v_model']; ?></td>
                            <td><?php echo $row['v_year']; ?></td>
                            <td><?php echo $row['v_reg']; ?></td>
                            <td>RM<?php echo $row['v_price']; ?></td>
                            <td> 
  <a class="btn btn-warning" role="button" href="staffmodifyvehicle.php?id=<?php echo htmlentities($row["v_reg"]); ?>"  name="submit" onclick="return confirm('Are you sure you want to modify?');">Modify </a>

 
</td>
<td>   <a class="btn btn-danger" role="button" href="deletevehicle.php?id=<?php echo htmlentities($row["v_reg"]); ?>"  name="submit" onclick="return confirm('Are you sure you want to delete?');">Delete</a></td>

                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
   


  </tbody>
</table>
<br><br>


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

        <div><?php if (isset($_GET['message2'])) {
          echo '<script>
          var Toast = Swal.mixin({
          toast: true,
          position: "top",
          showConfirmButton: false,
          timer: 3000,
        });
        Toast.fire({
            icon: "success",
            title:"Successfully deleted.",
          });</script>';
        } ?></div>
        <div><?php if (isset($_GET['message3'])) {
          echo '<script>
          var Toast = Swal.mixin({
          toast: true,
          position: "top",
          showConfirmButton: false,
          timer: 3000,
        });
        Toast.fire({
            icon: "error",
            title:"cannot delete car because car is in use.",
          });</script>';
        } ?></div>
</div>



<?php include 'footermain.php';?>