<?php
session_start(); // Starting Session

$error=''; // Variable To Store Error Message
//if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$user = 'root';
$pwd = 'root';
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
// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);
//$username = mysql_real_escape_string($username);
//$password = mysql_real_escape_string($password);

// SQL query to fetch information of registerd users and finds user match.
$query = $connection -> prepare("select uid,firstName,password from users where username=?");
$query->bind_param('s', $username);
$query->execute();
$query->store_result();
$rows = $query->num_rows;
if ($rows >= 1) {
 	$query->bind_result($id, $first_name, $pwd);

   while ($query->fetch()) {
    if (password_verify($password, $pwd)) {
        $_SESSION['login_id']=$id; 
        $_SESSION['login_user']=$first_name; 
      echo "<html><script language='javascript'>parent.location = 'welcome.php'; </script></html>";
        //echo 'Password is valid!';
    } else {
        //echo 'Invalid password.';
      $error = "Username or Password is invalid";
      echo "<html><script language='javascript'>alert('Username or Password is invalid.'); parent.location = 'login.html'; </script></html>";
    }
	    //echo 'id: ' . $_SESSION['login_id'];
   }
//header('location: index.html'); // Redirecting To Other Page
} else {
$error = "Username or Password is invalid";
    //header("location: login.html");
      echo "<html><script language='javascript'>alert('Username or Password is invalid.'); parent.location = 'login.html'; </script></html>";

}
$query->close();
$connection -> close(); // Closing Connection
}
	/*echo '<script type="text/javascript">
           window.location = "index.html"
      </script>';*/

//}
?>