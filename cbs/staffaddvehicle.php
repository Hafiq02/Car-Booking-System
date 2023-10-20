<?php
include('dbconnect.php');
include 'cbssession.php';
if (!session_id()) {
    session_start();
}

include 'headerstaff.php';

?>

<div class="container">
    <div class="row">
        <div class="col-sm-6">Car List
            <!-- Display existing vehicles here -->
            <?php
            $sql = "SELECT * FROM tb_vehicle";
            $result = mysqli_query($con, $sql);
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
                <form method="POST" action="staffaddvehicleprocess.php" enctype="multipart/form-data">
                    <fieldset>
                        <legend>Add Vehicle Form</legend>
                        <div class=" form-group">
                            <label for="v_reg" class="form-label mt-4">Vehicle Reg No.</label>
                            <input type="text" name="v_reg" class="form-control" id="v_reg" required>
                        </div>
                        <div class="form-group">
                            <label for="v_type" class="form-label mt-4">Vehicle Type</label>
                            <input type="text" name="v_type" class="form-control" id="v_type" required>
                        </div>
                        <div class="form-group">
                            <label for="v_model" class="form-label mt-4">Vehicle Model</label>
                            <input type="text" name="v_model" class="form-control" id="v_model" required>
                        </div>
                        <div class="form-group">
                            <label for="v_year" class="form-label mt-4">Vehicle Year</label>
                            <input type="text" name="v_year" class="form-control" id="v_year" required>
                        </div>
                        <div class="form-group">
                            <label for="v_price" class="form-label mt-4">Vehicle Price</label>
                            <input type="text" name="v_price" class="form-control" id="v_price" required>
                        </div>
                        <div class="form-group">
                            <label for="v_img" class="form-label mt-4">Vehicle Image</label>
                            <input class="form-control" name="v_img" type="file" id="formFile" required>
                        </div>
                        <br><br>
                        <button type="submit" class="btn btn-secondary" name="submit" onclick="return confirm('Are you sure you want to submit?');">Add</button>

                        <button type="reset" class="btn btn-danger" onclick="return confirm('Are you sure you want to submit?');">Clear Form</button>
                    </fieldset>
                </form>
            </div>
        </div>

    </div>