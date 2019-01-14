 <?php
	
	$dbhost = 'localhost';
	$dbname   = 'u737249528_revpa';
	$dbuser = 'ashish';
	$dbpass = 'djmaza.com';
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
    mysqli_set_charset($conn,"utf8");
    $db_select = mysqli_select_db($conn, $dbname);
?>