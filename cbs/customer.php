
<?php 
include ('dbconnect.php');
include 'cbssession.php';
if(!session_id())
{
  session_start();
}

$uid = session_id();


include 'headercustomer.php';



//retrieve individual bookings 

$sqla =" SELECT *FROM tb_user  WHERE u_id='$uid'";
$resulta = mysqli_query($con,$sqla);

  $sql1 ="SELECT *FROM tb_vehicle";
$result1 = mysqli_query($con,$sql1);
?>

<h2 > Welcome back <?php echo $row['u_name']; ?> !</h2>

    
  
   <div class="container">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-sm-8">
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
  <a class="btn btn-warning" role="button" href="bookingform.php?id=<?php echo htmlentities($row["v_reg"]); ?>"  name="submit" onclick="return confirm('Are you sure you want to book?');">Book</a>
 
</td>

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
</div>



<?php include 'footermain.php';?>