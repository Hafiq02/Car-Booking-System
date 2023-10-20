<?php 
include ('dbconnect.php');
include 'cbssession.php';
if(!session_id())
{
	session_start();
}
include 'headercustomer.php';





//get booking from url
if(isset($_GET['id']))
{

  $bid = $_GET['id'];

}

$sql = "SELECT * FROM tb_booking WHERE b_id='$bid'";
$result = mysqli_query($con, $sql);
$row=mysqli_fetch_array($result);
?>
<br>
<div class="container">
	<div class="row">
		<div class="col-sm-6">

			<div class="row">
				<div class="col-sm-6"><img class="img-thumbnail" src="img/FORGET-THE-REST.png"></div>
				<div class="col-sm-6">Honda Civic<br>Year 2020<br>RM400</div>
			</div>
			<br>
			<div class="row">
				<div class="col-sm-6"><img class="img-thumbnail" src="img/bezza.jpg"></div>
				<div class="col-sm-6">Perodua Bezza<br>Year 2022<br>RM100</div>
			</div>
			<br>
			<div class="row">
				<div class="col-sm-6"><img class="img-thumbnail" src="img/x70.jpg"></div>
				<div class="col-sm-6">Proton X70 <br>Year 2020<br>RM200</div>
			</div>
			
		</div>
			<div class="col-sm-6">
<br><br>
<form method= "POST" action="customermodifyprocess.php">
 <fieldset>
    <legend>Modify Form</legend>

     <label for="exampleSelect1">Booking ID: <?php echo $bid;?></label><br><br>



     <div class="form-group">
      <label for="exampleSelect1" class="form-label mt-4">Select Vehicle</label>

      <?php
       $sqlv = "SELECT * FROM tb_vehicle";
        $resultv = mysqli_query($con,$sqlv);

        echo '<select class="form-select" name="fvec" id="exampleSelect1">';

        while($rowv=mysqli_fetch_array($resultv))
        {
        		if($rowv['v_reg']==$row['b_vehicle'])
        		{
        			echo"<option selected= 'selected' value = '".$rowv['v_reg']."'>".$rowv['v_model']."</option>";

        		}
        		else
        		{
        			echo"<option value = '".$rowv['v_reg']."'>".$rowv['v_model']."</option>";

        		}


         // echo"<option value = '".$row['v_reg']."'>".$row['v_model']."</option>";
        }

        echo '</select>';


      ?>

    </div>



				    <div class="form-group row">
				   
				      <div class="col-sm-10">
				        
				    </div> 

				  <div class="form-group">
				      <label for="exampleInputPassword1"> Pick Up Date</label>
				      <input type="date" name="fpdate" class="form-control" id="exampleInputPassword1" value= "<?php echo $row['b_pdate']?>" required>
				    </div>

				     <div class="form-group">
				      <label for="exampleInputPassword1">  Return Date</label>
				      <input type="date" name="frdate" class="form-control" id="exampleInputPassword1"value= "<?php echo $row['b_rdate']?>"required>
				    </div>

				    <input type="hidden" name="fbid" value= "<?php echo $row['b_id']?>">
				    <br>
				 
				  </fieldset>
				  <br>
				  <button type="submit" class="btn btn-success">Modify</button>
				    <button type="reset" class="btn btn-danger">Reset</button>
				</form>



			</div>


	</div>
		
</div>


   <br><br><br>


<?php include 'footermain.php';?>