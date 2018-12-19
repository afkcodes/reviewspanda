<?php
$dbhost = 'localhost';
$dbuser = 'ashish';
$dbpass = 'djmaza.com';
$dbname = 'users_data';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
mysqli_set_charset($conn,"utf8");
$db_select = mysqli_select_db($conn, $dbname);
?>