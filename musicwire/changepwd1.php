<?php
session_start(); // Starting Session

$uid=$_SESSION['login_id'];
$pwd1=$_POST['pwd1'];
$pwd2=$_POST['pwd2'];
$pwd_hash = password_hash($pwd1, PASSWORD_DEFAULT);

if($pwd1=="") {
	echo "<html><script language='javascript'>alert('Please enter a password.'); parent.location = 'changepwd.php'; </script></html>";
}
elseif($pwd1!=$pwd2) {
	echo "<html><script language='javascript'>alert('Passwords do not match.'); parent.location = 'changepwd.php'; </script></html>";
}
else
{
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
	if (!($update = $connection->prepare("UPDATE users SET password=? WHERE uid=?"))) {
		    echo "Prepare failed: (" . $connection->errno . ") " . $connection->error;
		}
		if (!$update->bind_param('si', $pwd_hash, $uid)) {
		    echo "Binding parameters failed: (" . $update->errno . ") " . $update->error;
		}

		if (!$update->execute()) {
		    echo "Execute failed: (" . $update->errno . ") " . $update->error;
		}
			//$_SESSION['login_user']=$fname;

		$update->close();

		$connection -> close(); // Closing Connection
		//sleep(5);
		echo "<html><script language='javascript'>parent.location = 'profile.php'; </script></html>";

}

   ?>
