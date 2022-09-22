<?php 
    require_once 'includes/header.php';
    require_once 'includes/functions.php';

    $errors = "";

    if (isset($_POST['register'])) {

        $the_fname = $_POST['user_fname'];
        $the_lname = $_POST['user_lname'];
        $the_user_id = $_POST['user_id'];
        $the_email = $_POST['user_email'];
        $the_userphone = $_POST['user_phone'];
        $the_user_pass = $_POST['user_pass'];
        $the_confirm_pass = $_POST['confirm_pass'];

        $usernamevalidate = querydb("SELECT userid FROM users WHERE userid='$the_user_id'");
        
        $emailvalidate = querydb("SELECT email FROM users WHERE email='$the_email'");

        if (empty($the_user_id)) {
            $errors .= '<li>Username is required</li>';
            }elseif (mysqli_num_rows($usernamevalidate) > 0) {
                $errors .= '<li>Username already exist</li>';
        }
        if (empty($the_email)) {
            $errors .= '<li>Email is required</li>';
            }elseif (mysqli_num_rows($emailvalidate) > 0) {
                $errors .= '<li>Email already exist</li>';
        }

        if (empty($the_fname)) {
            $errors .= "<li>First name is required</li>";
        }
        if (empty($the_lname)) {
            $errors .= "<li>Last name is required</li>";
        }
        if (empty($the_userphone)) {
            $errors .= "<li>Phone Number is required</li>";
        }
        if (empty($the_user_pass)) {
            $errors .= "<li>Password is required</li>";
        }
        if ($the_user_pass != $the_confirm_pass) {
            $errors .= "<li>Password does not match</li>";
        }

        if (empty($errors)) {
            $password = md5($user_pass);
            $register_query = querydb("INSERT INTO USERS(fname, lname, userid, email, phone_number, password)
                                    VALUES ('$the_fname', '$the_lname', '$the_user_id', '$the_email', '$the_userphone', '$password')");
            $_SESSION['msg'] = '<div class="alert alert-success">Registration successful!</div>';
        }
        else{
            $_SESSION['msg'] = '<div class="alert alert-danger">We found the following error(s):<ul>'.$errors.'</ul></div>';
        }
    }

 ?>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" method="POST" action="">
                                <?php
                                    if (isset($_SESSION['msg'])) {
                                        echo $_SESSION['msg'];
                                        unset($_SESSION['msg']);
                                    }
                                    
                                  ?>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="user_fname"
                                            placeholder="First Name">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" name="user_lname"
                                            placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="user_id"
                                        placeholder="User ID">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" name="user_email"
                                        placeholder="Email Address">
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control form-control-user" name="user_phone"
                                        placeholder="Phone Number">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            name="user_pass" placeholder="Password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            name="confirm_pass" placeholder="Repeat Password">
                                    </div>
                                </div>
                                <button type="submit" name="register" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                                <hr>
                                <!-- <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a> -->
                            </form>
                            <hr>
                           <!--  <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div> -->
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>