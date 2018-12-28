 <?php
	
	$dbhost = 'localhost';
	$dbname   = 'id7713455_feature_data';
	$dbuser = 'id7713455_feature';
	$dbpass = '12345678';
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
    mysqli_set_charset($conn,"utf8");
    $db_select = mysqli_select_db($conn, $dbname);
?>