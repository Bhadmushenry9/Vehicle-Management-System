<?php 
	require_once('includes/fetch.php');

    $page_title = "Vehicle Management";
    $errors = "";

	if (isset($_POST['add_vehicle'])) {
        $username = $user;
        $model = $_POST['model'];
        $color = $_POST['color'];
        $engine_no = $_POST['engine_no'];
        $vehicle_pic_name = $_FILES['vehicle_pic']['name'];
        $vehicle_pic_size = $_FILES['vehicle_pic']['size']; 


        $vehiclevalidate = querydb("SELECT engine_no FROM vehicles WHERE engine_no='$engine_no'");

        //Vehicle Image Validation
        
        //Vehicle_pic Validation
        $expd = explode(".", $vehicle_pic_name);
        $exten = strtolower( end($expd) );
        $valid_exts = array("jpg", "jpeg", "png");

        if(!in_array($exten, $valid_exts) ) {
            $errors .= '<li>Invalid file extension! JPEG, JPG, and PNG is required.</li>';
        }
        if($vehicle_pic_size > 1000000) {
            $errors .= '<li>File is too big. Kindly upload file of 1mb and below.</li>';
        }

        $new_vehiclename = uniqid() . "." . $exten;

            
        if (empty($model)) {
            $errors = '<li>Vehicle Model is required!</li>';
        }
        if(empty($color)) {
            $errors = '<li>Vehicle Color is required!</li>';
        }
        if (empty($engine_no)) {
            $errors = '<li>Engine_no is required!</li>';
        }elseif (mysqli_num_rows($vehiclevalidate) > 0){
            $errors = '<li">Engine_no Already exist!</li>';
        }

        if (empty($errors)) {
            $move_img = move_uploaded_file($_FILES["vehicle_pic"]["tmp_name"], "img/users/".$new_vehiclename);
            if ($move_img) {
                $insert_query = querydb("INSERT INTO vehicles(userid, model, color, engine_no, vehicle_img)
                                    VALUES ('$username', '$model', '$color', '$engine_no', '$new_vehiclename')");
            }
            if($insert_query){
                $_SESSION['msg'] = '<div class="alert alert-success">Vehicle Added successful!</div>';
                header('location: vehicle.php');
                exit;
            }
            else{
                $_SESSION['msg'] = '<div class="alert alert-danger">We have found the following error(s): <ul>' .$errors.' </ul> </div>';
            }

        }   
    }

    //Delete query
    if (isset($_POST['delete'])) {
        $vehicle_id = $_POST['vehicle_id'];
        $delete = querydb("DELETE FROM vehicles WHERE id = '$vehicle_id'");
        if($delete) {
            $_SESSION['delete'] = '<div class="alert alert-success">Record Deleted successfully!</div>';
            header('location: vehicle.php');
            exit;
        }
        else{
            $_SESSION['delete'] = '<div class="alert alert-danger">Oops! An error occured, Try Again Later</div>';
        }
    }

    //Vehicle Record Update
    if (isset($_POST['update_record'])) {
        $record_id =$_POST['record_id'];
        $model_update = $_POST['model_update'];
        $color_update = $_POST['color_update'];
        $engine_no_update = $_POST['engine_no_update'];


        $engine_no_validate = querydb("SELECT engine_no FROM vehicles WHERE engine_no='$engine_no_update'");


        if (empty($model_update)) {
            $errors = '<li>Vehicle Model is required!</li>';
        }
        if(empty($color_update)) {
            $errors = '<li>Vehicle Color is required!</li>';
        }
        if (empty($engine_no_update)) {
            $errors = '<li>Engine_no is required!</li>';
        }elseif ((mysqli_num_rows($engine_no_validate) > 0) AND ($engine_no_update != $engine_no_fetch)){
            $errors = '<li">Engine No Already exist!</li>';
        }
            
        if(empty($errors)){
            $update_record = querydb("UPDATE vehicles 
                                     SET color='$color_update', model='$model_update', engine_no='$engine_no_update'
                                    WHERE id='$record_id'");
        
        $_SESSION['msg'] = '<div class="alert alert-success">Vehicle Record Updated successfully!</div>';
        header('location: vehicle.php');
        exit;
        }
        else{
            $_SESSION['msg'] = '<div class="alert alert-danger">We have found the following error(s): <ul>' .$errors.' </ul> </div>';
        }

                
    }



	require_once ('includes/header.php');
    require_once ('includes/nav.php');
    require_once ('includes/sidebar.php');
 ?>


<div class="container-fluid">
	<div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">Add Vehicle</h1>
    </div>

	<form class="user" method="POST" action="" enctype="multipart/form-data">
		<?php
            if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            
        ?>
         <div class="form-group">
            <input type="text" class="form-control form-control-user" name="user_id"
                value="<?php echo $user ?>" hidden>
        </div>
		<div class="form-group">
            <label>Vehicle Model</label>
            <input type="text" class="form-control form-control-user" name="model"
                    placeholder="Enter Vehicle Model">
        </div>
        <div class="form-group">
            <label>Vehicle Color</label>
            <input type="text" class="form-control form-control-user" name="color"
                    placeholder="Enter Vehicle Color">
        </div>
        <div class="form-group">
            <label>Vehicle Engine No</label>
            <input type="text" class="form-control form-control-user" name="engine_no"
                placeholder="Enter Vehicle Engine No.">
        </div>
        <div class="form-group">
            <label>Upload Vehicle Image</label>
            <input type="file" class="form-control" name="vehicle_pic">
        </div>
        
        <button type="submit" name="add_vehicle" class="btn btn-primary btn-user btn-block">
            Add Vehicle
        </button>
	</form>
	
    <p>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">My Registered Vehicles</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <?php
                        if (isset($_SESSION['delete'])) {
                            echo $_SESSION['delete'];
                            unset($_SESSION['delete']);
                        }
            
                    ?>
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Color</th>
                            <th>Model</th>
                            <th>Engine_no</th>
                            <th>Vehicle Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>S/N</th>
                            <th>Color</th>
                            <th>Model</th>
                            <th>Engine_no</th>
                            <th>Vehicle Image</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        
                        <?php
                            $count = 1;
                            //TABLE QUERY
                            $tablequery = querydb("SELECT * FROM vehicles WHERE userid = '$user'");
                            if (mysqli_num_rows($tablequery) > 0) {
                                foreach ($tablequery as $row) {
                                    $show_vehicle = $row['vehicle_img'];
                                                     
                        ?>
                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        <td><?php echo $row['color']; ?></td>
                                        <td><?php echo $row['model']; ?></td>
                                        <td><?php echo $row['engine_no']; ?></td>
                                        <td><img class="img-profile" style="border: 1px solid #ddd; border-radius: 4px; padding: 5px; width: 150px"
                            src=<?php echo "img/users/".$show_vehicle; ?>></td>
                                        <td>
                                            <button class="btn btn-info" href="#" data-toggle="modal" data-target="#editmodal">Edit</button>
                                            <button class="btn btn-danger" href="#" data-toggle="modal" data-target="#deletemodal">Delete</button>
                                        </td>

                                        <!-- Edit Modal -->
                                        <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Delete Record?</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Cancel">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">Select "Update" to Update Selected Vehicle record.</div>
                                                    <div class="modal-footer">
                                                        <form action="" method="POST" enctype="multipart/form-data">
                                                            <div class="form-group">
                                                                <input type="hidden" name="record_id" value="<?php echo $row['id']; ?>">
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label>Color</label>
                                                                <input class="form-control form-control-user" type="text" name="color_update" value="<?php echo $row['color']; ?>">
                                                            </div>
                                                            <br>
                                                            <div class="form-group">
                                                                <label>Model</label>
                                                                <input class="form-control form-control-user" type="text" name="model_update" value="<?php echo $row['model']; ?>">
                                                            </div>
                                                            <br>
                                                            <div class="form-group">
                                                                <label>Engine No.</label>
                                                                <input class="form-control form-control-user" type="text" name="engine_no_update" value="<?php echo $row['engine_no']; ?>">
                                                            </div>
                                                            <br>
                                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                            <button class="btn btn-info" name="update_record" type="submit">Update Record</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Delete Record?</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Cancel">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">Select "Delete" if you are ready to delete the selected record.</div>
                                                    <div class="modal-footer">
                                                        <form action="" method="POST">
                                                            <input type="hidden" name="vehicle_id" value="<?php echo $row['id']; ?>">
                                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                            <button class="btn btn-danger" name="delete" type="submit">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                    <?php 
                                    $count++;
                                }
                                
                            ?>
                            
                            <?php } ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</p>
</div>
</div>




 <?php require_once('includes/footer.php'); ?>