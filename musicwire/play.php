<?php
session_start(); // Starting Session

$track=$_GET['id'];
$uid=$_SESSION['login_id'];

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

//insert
		if (!($insert = $connection->prepare("INSERT INTO plays(uid, trackid, playsTS) VALUES(?,?,?)"))) {
		    echo "Prepare failed: (" . $connection->errno . ") " . $connection->error;
		}
		if (!$insert->bind_param('iss', $uid, $track, $ts)) {
		    echo "Binding parameters failed: (" . $insert->errno . ") " . $insert->error;
		}

		if (!$insert->execute()) {
		    echo "Execute failed: (" . $insert->errno . ") " . $insert->error;
		}

		$insert->close();
		
/*
$query = $connection -> prepare("SELECT * FROM plays WHERE uid=? and trackid=?");
$query->bind_param('is', $uid, $track);
$query->execute();
$query->store_result();
$rows = $query->num_rows;

 if ($rows >= 1) {
//update
	if (!($update = $connection->prepare("UPDATE plays SET playsTS=? WHERE uid=? and trackid=?"))) {
		    echo "Prepare failed: (" . $connection->errno . ") " . $connection->error;
		}
		if (!$update->bind_param('sis', $ts, $uid, $track)) {
		    echo "Binding parameters failed: (" . $update->errno . ") " . $update->error;
		}

		if (!$update->execute()) {
		    echo "Execute failed: (" . $update->errno . ") " . $update->error;
		}

		$update->close();
 } else { 
//insert
		if (!($insert = $connection->prepare("INSERT INTO plays(uid, trackid, playsTS) VALUES(?,?,?)"))) {
		    echo "Prepare failed: (" . $connection->errno . ") " . $connection->error;
		}
		if (!$insert->bind_param('iss', $uid, $track, $ts)) {
		    echo "Binding parameters failed: (" . $insert->errno . ") " . $insert->error;
		}

		if (!$insert->execute()) {
		    echo "Execute failed: (" . $insert->errno . ") " . $insert->error;
		}

		$insert->close();

 }

		$query->close();
*/
		$connection -> close(); // Closing Connection
		//sleep(5);
		header("location: trackinfo.php?id=$track");


    ?>