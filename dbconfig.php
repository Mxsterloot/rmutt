
<?php

$servername = 'localhost';
$db_username = 'root';
$db_password = 'root';
$dbname = 'dps_db';

$conn = mysqli_connect($servername, $db_username, $db_password, $dbname);



if (!$conn) {
	die("Connection : failed (เชื่อมต่อฐานข้อมูล ไม่ สำเร็จ)" . mysqli_connect_error());
} else {
	echo "<script>";
	echo "console.log('Connection : OK (เชื่อมต่อฐานข้อมูลสำเร็จ)');";
	echo "</script>";
}

// mysqli_close($conn); // ปิดฐานข้อมูล
?>