<?php
$con=mysqli_connect("localhost","cl27-sch","admin@123");
// Check connection
if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error(); }

// ...some PHP code for database "my_db"...

// Change database to "test"
mysqli_select_db($con,"cl27-sch");

date_default_timezone_set("Europe/London");
include '../includes/common_functions.php';
?>
	
	