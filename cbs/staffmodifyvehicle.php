<?php
include('dbconnect.php');
include 'cbssession.php';
if (!session_id()) {
    session_start();
}

if(isset($_GET['id'])){

  $bid=$_GET['id'];
}

include 'headerstaff.php';

?>

<div class="container">
    <div class="row">
        <div class="col-sm-6">Car List
           
            <?php
            $sql = "SELECT * FROM tb_vehicle";
            $result = mysqli_query($con, $sql);

            $sqla = "SELECT * FROM tb_vehicle WHERE v_reg='$bid'";
            $result1 = mysqli_query($con, $sqla);
            $row1 = mysqli_fetch_array($result1);

            while ($row = mysqli_fetch_array($result)) {
            ?>
                <div class="row">
                    <div class="col-sm-6">
                        <img class="img-thumbnail" src="<?php echo $row['v_img']; ?>">
                    </div>
                    <div class="col-sm-6">
                        <?php echo $row['v_model']; ?><br>
                        Year <?php echo $row['v_year']; ?><br>
                        RM<?php echo $row['v_price']; ?>
                    </div>
                </div>
                <br>
         <?php
            }
?>
    
         
        </div>

        <div class="col-sm-6">
            <div class="row">
                <div class="col-sm-6"></div>
                <form method="POST" action="staffmodifyvehicleprocess.php" enctype="multipart/form-data">
                    <fieldset>
                        <legend>Modify Vehicle Form</legend>
                       
                         
                        <div class="form-group">
                            
                            <input type=hidden name="v_reg" class="form-control" id="v_reg" value="<?php echo $row1['v_reg']; ?>" >
                        </div>
                       
                        <div class="form-group">
                            <label for="v_price" class="form-label mt-4">Vehicle Price</label>
                            <input type="text" name="v_price" class="form-control" id="v_price" value="<?php echo $row1['v_price']; ?>" >
                        </div>
                       <div class="form-group">
                            <label for="v_img" class="form-label mt-4">Vehicle Image</label>
                            <input class="form-control" name="v_img" type="file" id="formFile">
                        </div>
                        <br><br>
                        <button type="submit" class="btn btn-secondary" name="submit" onclick="return confirm('Are you sure you want to submit?');">Modify</button>

                        <button type="reset" class="btn btn-danger" onclick="return confirm('Are you sure you want to submit?');">Clear Form</button>
                    </fieldset>
                </form>
            </div>
        </div>

    </div>