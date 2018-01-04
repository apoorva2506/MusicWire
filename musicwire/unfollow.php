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

    if (!($delete = $connection->prepare("DELETE FROM follows WHERE uid1=? and uid2=?"))) {
		    echo "Prepare failed: (" . $connection->errno . ") " . $connection->error;
		}
		if (!$delete->bind_param('ii', $uid1, $uid2)) {
		    echo "Binding parameters failed: (" . $delete->errno . ") " . $delete->error;
		}

		if (!$delete->execute()) {
		    echo "Execute failed: (" . $delete->errno . ") " . $delete->error;
		}

		$delete->close();
		$connection -> close(); // Closing Connection
		//sleep(5);
		header("location: userinfo.php?id=$uid2");


    ?>