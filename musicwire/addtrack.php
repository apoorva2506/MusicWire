<?php
session_start(); // Starting Session

$tid=$_GET['tid'];
$pid=$_GET['pid'];
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
$query = $connection -> prepare("SELECT * FROM playlist_track WHERE pid=? and tid=?");
$query->bind_param('is', $pid, $tid);
$query->execute();
$query->store_result();
$rows = $query->num_rows;

		if (!$rows >= 1) {
           $dt = new DateTime();
      	   $ts = $dt->format('Y-m-d H:i:s');

      		if (!($insert = $connection->prepare("INSERT INTO playlist_track(pid, tid, playlistTS) VALUES(?,?,?)"))) {
      		    echo "Prepare failed: (" . $connection->errno . ") " . $connection->error;
      		}
      		if (!$insert->bind_param('iss', $pid, $tid, $ts)) {
      		    echo "Binding parameters failed: (" . $insert->errno . ") " . $insert->error;
      		}

      		if (!$insert->execute()) {
      		    echo "Execute failed: (" . $insert->errno . ") " . $insert->error;
      		}

      		$insert->close();
          echo "<html><script language='javascript'> ";
  }
  else {
    echo "<html><script language='javascript'>alert('Already added to the Playlist.');";
  }
    $query->close();
		$connection -> close(); // Closing Connection
		//sleep(5);
		echo "parent.location = 'playlistinfo.php?id=".$pid."'; </script></html>";


    ?>