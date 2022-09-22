<?php 
	require_once('includes/fetch.php');

    $page_title = "Security";
    $errors = "";
	if (isset($_POST['change_pass'])) {

        $old_pass = $_POST['old_pass'];
        $new_pass = $_POST['new_pass'];
        $confirm_pass = $_POST['confirm_pass'];

        if (empty($old_pass)) {
            $errors .= '<li>Old Password is required before you can change your password.</li>';
        }
        if (empty($new_pass)) {
            $errors .= '<li>New Password is required.</li>';
        }
        if ($new_pass != $confirm_pass) {
            $errors .= '<li>Password does not match.</li>';
        }
        
        if (md5($old_pass) != $userpass){
            $errors .= '<li>Old Password is incorrect!</li>';
        }
        if (strlen($new_pass) < 8) {
            $errors .= '<li>Password Must be at least 8 characters!</li>';
        }
        

        if (empty($errors)) {
            $new_password = md5($new_pass);
            $update_query = querydb("UPDATE users 
            						 SET password='$new_password'
                                    WHERE userid='$userid'");
            $_SESSION['msg'] = '<div class="alert alert-success">Password Changed successfully!</div>';
        }
        else{
            $_SESSION['msg'] = '<div class="alert alert-danger">We have found the following error(s):' .$errors.'</div>';
        }

                
    } 

	require_once ('includes/header.php');
    require_once ('includes/nav.php');
    require_once ('includes/sidebar.php');
 ?>


<div class="container-fluid">
	<div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">Update Password</h1>
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
                <div class="form-group">
                    <label>Old Password</label>
                    <input type="password" class="form-control form-control-user" name="old_pass">
                </div>
                
                <div class="form-group">
                    <label>New Password</label>
                    <input type="password" class="form-control form-control-user" name="new_pass">
                </div>
                
                <div class="form-group">
                    <label>Confirm New Password</label>
                    <input type="password" class="form-control form-control-user" name="confirm_pass">
                </div>

                <button type="submit" name="change_pass" class="btn btn-primary btn-user btn-block">Change Password</button>

            </form>
        </div>
    </div>
	
</div>
</div>


 <?php require_once('includes/footer.php'); ?>