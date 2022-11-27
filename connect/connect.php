<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
// login time setting.test

	$hostname = "localhost";
	$username = "root";
	$password = "12345678";
	$database = "stock_db";
	$conn =  new mysqli($hostname, $username, $password, $database) or trigger_error(mysql_error(),E_USER_ERROR);
	if ($conn->connect_error) {
 	 die("Connection failed: " . $conn->connect_error);
	}
	mysqli_query($conn, "SET NAMES UTF8");

?>