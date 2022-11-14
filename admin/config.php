<?php
$conn = mysqli_connect("localhost", "", "", "");
if (!$conn) {
	echo "Error: Unable to connect to MySQL." . PHP_EOL;
	echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
	echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
	exit;
}


// Set timezone
date_default_timezone_set('Asia/Ho_Chi_Minh');
// set char set
mysqli_set_charset($conn, 'utf8');


// $servername = "mysql-79235-0.cloudclusters.net";
// $username = "admin";
// $password = "dSQMbGFI";
// $dbname   = "thuongmaidientu";
// $dbServerPort = "18678";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname, $dbServerPort,);

// // Check connection
// if (!$conn) {
// 	echo "Error: Unable to connect to MySQL." . PHP_EOL;
// 	echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
// 	echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
// 	exit;
// }
// // Set timezone
// date_default_timezone_set('Asia/Ho_Chi_Minh');
// // set char set
// mysqli_set_charset($conn, 'utf8');