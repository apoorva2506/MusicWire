<?php
session_start(); // Starting Session

$uid=$_SESSION['login_id'];
$fname=$_POST['firstname'];
$lname=$_POST['lastname'];
$emailid=$_POST['emailid'];

if($fname=="") {
	echo "<html><script language='javascript'>alert('Please enter your First Name.'); parent.location = 'updateprofile.php'; </script></html>";
}
elseif($lname=="") {
	echo "<html><script language='javascript'>alert('Please enter your Last Name.'); parent.location = 'updateprofile.php'; </script></html>";
}
elseif ($emailid=="") {
	echo "<html><script language='javascript'>alert('Please enter your email id.'); parent.location = 'updateprofile.php'; </script></html>";
}
elseif(!filter_var($emailid, FILTER_VALIDATE_EMAIL)) {
	echo "<html><script language='javascript'>alert('Please enter a valid email id.'); parent.location = 'updateprofile.php'; </script></html>";
}
else {
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

//update
	if (!($update = $connection->prepare("UPDATE users SET firstname=?, lastname=?, uemailid=? WHERE uid=?"))) {
		    echo "Prepare failed: (" . $connection->errno . ") " . $connection->error;
		}
		if (!$update->bind_param('sssi', $fname, $lname, $emailid, $uid)) {
		    echo "Binding parameters failed: (" . $update->errno . ") " . $update->error;
		}

		if (!$update->execute()) {
		    echo "Execute failed: (" . $update->errno . ") " . $update->error;
		}
			$_SESSION['login_user']=$fname;

		$update->close();

		$connection -> close(); // Closing Connection
		//sleep(5);
		echo "<html><script language='javascript'>parent.location = 'profile.php'; </script></html>";
}

    ?>