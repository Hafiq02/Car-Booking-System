<?php 
include('dbconnect.php');
include 'cbssession.php';
if(!session_id())
{
	session_start();
}

if(isset($_GET['id'])){

  $bid=$_GET['id'];
}
include 'headercustomer.php';


 ?>

<br>

			<div class="container" align="text-center">
				      
<br><br>

<script>
  function checkDates() {
    var today = new Date();
    var pickUpDate = new Date(document.getElementsByName("fpdate")[0].value);
    var returnDate = new Date(document.getElementsByName("frdate")[0].value);
    if (pickUpDate < today && pickUpDate.toDateString() !== today.toDateString()) {
      alert("Pick up date cannot be earlier than today's date");
      return false;
    }
    if (returnDate < pickUpDate) {
      alert("Return date cannot be earlier than pick up date");
      return false;
    }
    return true;
  }
</script>

<form method= "POST" action="customerprocess.php" onsubmit="return checkDates()">
 <fieldset>
    <legend>Booking Form</legend>

     <div class="form-group">
      <!-- <label for="exampleSelect1" class="form-label mt-4">Select Vehicle</label> -->

      <?php
       $sql = "SELECT * FROM tb_vehicle WHERE v_reg='$bid'";
        $result = mysqli_query($con,$sql);
$row=mysqli_fetch_array($result)
        // echo '<select class="form-select" name="fvec" id="exampleSelect1">';
        // 	// echo"<option value = '' ></option>";

        // while($row=mysqli_fetch_array($result))
        // {

        //   echo"<option value = '".$row['v_reg']."'>".$row['v_model']."</option>";
        // }

        // echo '</select>';


      ?>

    </div>



				    <div class="form-group row">
				   
				      <div class="col-sm-10">
				        
				    </div> 
 <div class="form-group">
				      <label for="exampleInputPassword1"> Car</label>
				      <input type="text"  class="form-control" id="exampleSelect1"  value="<?php echo $row['v_model']?>" required>
				      <input type="hidden" name="fvec" class="form-control" id="exampleSelect1"  value="<?php echo $row['v_reg']?>" required>
				    </div>
				  <div class="form-group">
				      <label for="exampleInputPassword1"> Pick Up Date</label>
				      <input type="date" name="fpdate" class="form-control" id="exampleInputPassword1"  placeholder="Please enter your registration number" required>
				    </div>

				     <div class="form-group">
				      <label for="exampleInputPassword1">  Return Date</label>
				      <input type="date" name="frdate" class="form-control" id="exampleInputPassword1" placeholder="Please enter your password"required>
				    </div>
				    

				 
				  </fieldset>
				  <br>
				  <button type="submit" class="btn btn-success">Book</button>
				    <button type="reset" class="btn btn-danger">Clear Form</button>
				</form>



			</div>


	</div>
		
</div>
</div>


   <br><br><br>


<?php include 'footermain.php';?>