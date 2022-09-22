<?php 
    require_once('includes/fetch.php');

    if(isset($_POST['logout'])) {
        unset($_SESSION['user']);
        session_destroy();
        header('location:login.php');
    }

?>