<?php 
	require_once('includes/fetch.php');

    $page_title = "Profile Management";
    $errors = "";
	if (isset($_POST['update'])) {

        $userfname = $_POST['user_fname'];
        $userlname = $_POST['user_lname'];
        $user_id = $_POST['user_id'];
        $usermail = $_POST['user_email'];
        $userpnumber = $_POST['user_phone'];
        $profile_pic_name = $_FILES['profile_pic']['name'];
        $profile_pic_size = $_FILES['profile_pic']['size'];

        if($profile_pic_size > 0) {
            //Profile_pic Validation
            $exp = explode(".", $profile_pic_name);
            $extension = strtolower( end($exp) );
            $valid_ext = array("jpg", "jpeg", "png");

            if(!in_array($extension, $valid_ext) ) {
                $errors .= '<li>Invalid file extension! JPEG, JPG, and PNG is required.</li>';
            }
            if($profile_pic_size > 1000000) {
                $errors .= '<li>File is too big. Kindly upload file of 1mb and below.</li>';
            }

            $new_filename = uniqid() . "." . $extension;

            //Email and User ID validation
            if ($user_id != $user) {
                $errors .= '<li>Username already exist!</li>';
            }
            if ($usermail != $useremail) {
                $errors .= '<li>Email already exist!</li>';
            }

            if (empty($errors)) {
                $move_files = move_uploaded_file($_FILES["profile_pic"]["tmp_name"], "img/users/".$new_filename);
                if ($move_files) {
                    $update_query = querydb("UPDATE users 
                                         SET fname='$userfname', lname='$userlname', userid='$user_id', email='$usermail', phone_number='$userpnumber', profile_picture='$new_filename'
                                        WHERE userid='$userid'");
                }

                if($update_query){
                    $_SESSION['msg'] = '<div class="alert alert-success">Profile Updated successful!</div>';
                    header('location: profile.php');
                    exit;
                }
                else{
                    $_SESSION['msg'] = '<div class="alert alert-danger">Ooops Something went wrong, Try Again!</div>';
                }
                             
            }
            else{
                $_SESSION['msg'] = '<div class="alert alert-danger">We have found the following error(s):' .$errors.'</div>';
            }

        }
        else {

            //Email and User ID validation
            if ($user_id != $user) {
                $errors .= '<li>Username already exist!</li>';
            }
            if ($usermail != $useremail) {
                $errors .= '<li>Email already exist!</li>';
            }

            if (empty($errors)) {
                $update_query = querydb("UPDATE users 
                                     SET fname='$userfname', lname='$userlname', userid='$user_id', email='$usermail', phone_number='$userpnumber'
                                    WHERE userid='$userid'");
                
                if($update_query){
                    $_SESSION['msg'] = '<div class="alert alert-success">Profile Updated successful!</div>';
                    header('location: profile.php');
                    exit;
                }
                else{
                    $_SESSION['msg'] = '<div class="alert alert-danger">Ooops Something went wrong, Try Again!</div>';
                }

            }
            else{
                $_SESSION['msg'] = '<div class="alert alert-danger">We have found the following error(s):' .$errors.'</div>';
            }

        }

        

                
    } 

	require_once ('includes/header.php');
    require_once ('includes/nav.php');
    require_once ('includes/sidebar.php');
 ?>


<div class="container-fluid">
	<div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">Profile Settings</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form class="user" method="POST" action="" enctype="multipart/form-data">
                <?php
                    if (isset($_SESSION['msg'])) {
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                            
                 ?>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label>First Name</label>
                        <input type="text" class="form-control form-control-user" name="user_fname"
                            value="<?php echo $fname ?>">
                    </div>
                    <div class="col-sm-6">
                        <label>Last Name</label>
                        <input type="text" class="form-control form-control-user" name="user_lname"
                            value="<?php echo $lname ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label>User ID</label>
                    <input type="text" class="form-control form-control-user" name="user_id"
                        value="<?php echo $user ?>">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control form-control-user" name="user_email"
                        value="<?php echo $useremail ?>">
                </div>

                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="tel" class="form-control form-control-user" name="user_phone"
                        value="<?php echo $userphone ?>">
                </div>

                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label>Profile Picture</label>
                        <input type="file" class="form-control" name="profile_pic" <?php if($userpic == '') {echo 'required';} ?> >
                    </div>
                </div>

                <button type="submit" name="update" class="btn btn-primary btn-user btn-block">
                    Update Profile
                </button>

            </form>
        </div>
    </div>
	
</div>
</div>


 <?php require_once('includes/footer.php'); ?>