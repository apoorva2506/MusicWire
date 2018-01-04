<?php
session_start(); // Starting Session

$uid2=$_GET['id'];
$uid1=$_SESSION['login_id'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$user = 'sneha';
$pwd = 'sneha';
$db = 'MusicWire';
$host = 'localhost';
$port = 8889;
//echo "$user+$password+$db+$host+$port";
$connection = new mysqli($host, $user, $pwd, $db);
// check connection
if ($connection->connect_error) {
  trigger_error('Database connection failed: '  . $connection->connect_error, E_USER_ERROR);
}
//echo 'Connected successfully.<br/>';

    $dt = new DateTime();
	$ts = $dt->format('Y-m-d H:i:s');

		if (!($insert = $connection->prepare("INSERT INTO follows(uid1, uid2, followTS) VALUES(?,?,?)"))) {
		    echo "Prepare failed: (" . $connection->errno . ") " . $connection->error;
		}
		if (!$insert->bind_param('iis', $uid1, $uid2, $ts)) {
		    echo "Binding parameters failed: (" . $insert->errno . ") " . $insert->error;
		}

		if (!$insert->execute()) {
		    echo "Execute failed: (" . $insert->errno . ") " . $insert->error;
		}


		$insert->close();
		$connection -> close(); // Closing Connection
		//sleep(5);
		header("location: userinfo.php?id=$uid2");


    ?>