<?php
    require_once('includes/functions.php');
	if (isset($_SESSION['user'])) {
		$user = $_SESSION['user'];

		$userquery = querydb("SELECT * FROM users WHERE userid='$user'");
		if (mysqli_num_rows($userquery) > 0) {
			$user_fetch = mysqli_fetch_assoc($userquery);
			
			$userid = $user_fetch['id'];
			$fname = $user_fetch['fname'];
			$lname = $user_fetch['lname'];
			$userphone = $user_fetch['phone_number'];
			$useremail = $user_fetch['email'];
			$userpass = $user_fetch['password'];
			$userpic = $user_fetch['profile_picture'];

		}
		else{
			header('location: login.php');
		}

		$vehicle_query = querydb("SELECT * FROM vehicles WHERE userid='$user'");
		$vehicle_count = mysqli_num_rows($vehicle_query);
		if ($vehicle_count > 0) {
			$vehicle_fetch = mysqli_fetch_assoc($vehicle_query);
			$engine_no_fetch = $vehicle_fetch['engine_no'];
			$vehiclepic = $vehicle_fetch['vehicle_img'];
		}
		

	}
	else{
		header('location: login.php');
	}





?>