<?php
// Define $username and $password
$email=$_POST['emailid'];
$username=$_POST['username'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$password=$_POST['password'];
$password1=$_POST['password1'];

if ($email=="") {
	echo "<html><script language='javascript'>alert('Please enter your email id.'); parent.location = 'register.html'; </script></html>";
}
elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	echo "<html><script language='javascript'>alert('Please enter a valid email id.'); parent.location = 'register.html'; </script></html>";
}
elseif($username=="") {
	echo "<html><script language='javascript'>alert('Please enter a username.'); parent.location = 'register.html'; </script></html>";
}
elseif($fname=="") {
	echo "<html><script language='javascript'>alert('Please enter your First Name.'); parent.location = 'register.html'; </script></html>";
}
elseif($lname=="") {
	echo "<html><script language='javascript'>alert('Please enter your Last Name.'); parent.location = 'register.html'; </script></html>";
}
elseif($password=="") {
	echo "<html><script language='javascript'>alert('Please enter a password.'); parent.location = 'register.html'; </script></html>";
}
elseif($password!=$password1) {
	echo "<html><script language='javascript'>alert('Passwords do not match.'); parent.location = 'register.html'; </script></html>";
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
// To protect MySQL injection for Security purpose
$email = stripslashes($email);
$username = stripslashes($username);
$fname = stripslashes($fname);
$lname = stripslashes($lname);
$password = stripslashes($password);
$password_hash = password_hash($password, PASSWORD_DEFAULT);
//$username = mysql_real_escape_string($username);
//$password = mysql_real_escape_string($password);

if (!($insert = $connection->prepare("INSERT INTO users(uemailid, username, firstname, lastname, password) VALUES(?,?,?,?,?)"))) {
    //echo "Prepare failed: (" . $connection->errno . ") " . $connection->error;
}
if (!$insert->bind_param('sssss', $email, $username, $fname, $lname, $password_hash)) {
    //echo "Binding parameters failed: (" . $insert->errno . ") " . $insert->error;
}

if (!$insert->execute()) {
    //echo "Execute failed: (" . $insert->errno . ") " . $insert->error;
}

 //echo "<h3>Sign Up successful!!!</h3>";


$insert->close();
$connection -> close(); // Closing Connection
    header("location: login.html");
	/*echo '<script type="text/javascript">
           window.location = "login.html"
      </script>';*/
 }
?>