<?php 
    session_start();
    // echo("{$_SESSION['u_name']}"."<br />");
    session_unset();
    session_destroy();
    header('location:index.php');

 ?>