<?php 
    require_once 'includes/functions.php';
    
    $page_title = "Login";
    $errors = "";

    if (isset($_POST['login'])) {
        $username = $_POST['user_id'];
        $password = $_POST['user_pass'];

        if (empty($username)) {
            $errors .= '<li>Username is required</li>'; 
        }
        if (empty($password)) {
            $errors .= '<li>Password is required</li>'; 
        }

        if (empty($errors)) {
            $userpass = md5($password);
            $loginquery = querydb("SELECT * FROM users WHERE userid = '$username' AND password = '$userpass'");
            if (mysqli_num_rows($loginquery) > 0) {
                mysqli_fetch_assoc($loginquery);
                $_SESSION['user'] = $username;
                header('location: dashboard.php');
            }
            else{
                $_SESSION['msg'] = '<div class="alert alert-danger">User ID or Password is incorrect!</div>';
            }
        }
        else{
            $_SESSION['msg'] = '<div class="alert alert-danger">We found the following error(s):<ul>'.$errors.'</ul></div>';
        }
    }

require_once 'includes/header.php';
?>


<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form method="post" class="user" action="">
                                        <?php
                                            if (isset($_SESSION['msg'])) {
                                                echo $_SESSION['msg'];
                                                unset($_SESSION['msg']);
                                            }
                                    
                                        ?>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                name="user_id" placeholder="Enter User ID...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                name="user_pass" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block" name="login">Login</button>
                                                                                
                                    </form>
                                    <hr>
                                    
                                    <div class="text-center">
                                        <a class="small" href="register.php">Create an Account!</a>
                                    </div>
                                </div>
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