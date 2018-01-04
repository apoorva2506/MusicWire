<?php
session_start(); // Starting Session

$error=''; // Variable To Store Error Message
//if (isset($_POST['submit'])) {
if (empty($_SESSION['login_id'])) {
$error = "Invalid Session";
    header("location: invalid_session.php");
}
else
{
$user_id=$_SESSION['login_id'];
$user_name=$_SESSION['login_user'];
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

$query = $connection -> prepare("SELECT firstname,lastname,uemailid FROM users WHERE uid=?");
$query->bind_param('i', $user_id);
$query->execute();
$query->store_result();
$rows = $query->num_rows;
?>

<!DOCTYPE html>
<html>
<head>
<title>Music Wire</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<!--theme-style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Music Club Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--flexslider-->
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<!--//flexslider-->
</head>
<body>
<!--header-->
<div class="header header-main">
	<div class="container">
				<div class="header-top">
				<div class="logo">
					<h1><a href="welcome.php">Music Wire</a></h1>
				</div>
				<div class="top-nav">
					<span class="menu"><img src="images/menu.png" alt=""> </span>
					<ul>
						<li><a href="welcome.php" class="hvr-sweep-to-bottom color"><i class="glyphicon glyphicon-home"></i>Home </a></li>
						<li ><a href="profile.php" class="hvr-sweep-to-bottom color1"><i class="glyphicon glyphicon-picture"></i>My Profile  </a> </li>
						<li ><a href="browse.php" class="hvr-sweep-to-bottom color2"><i class="glyphicon glyphicon-picture"></i>Browse  </a> </li>
						<li><a href="logout.php" class="hvr-sweep-to-bottom color3"><i class="glyphicon glyphicon-home"></i>Logout </a></li>
					<div class="clearfix"> </div>
					</ul>
					<!--script-->
				<script>
					$("span.menu").click(function(){
						$(".top-nav ul").slideToggle(500, function(){
						});
					});
			</script>				
				</div>
			<div class="clearfix"> </div>
		</div>
			<!---->
	</div>
</div>
<!--//header-->
<!--content-->
			<div class="contact">
				<div class="container">
					<div class="contact-top ">
						<h3>Update Details</h3>
					</div>		
						<?php 
							if ($rows >= 1) {
 							$query->bind_result($firstname,$lastname,$uemailid);
							while ($query->fetch()) { ?>
		
					<div class="contact-grids">
						<div class="contact-form">
							<form action="updateprofile1.php" method="post">
								<div class="contact-bottom">
									<div class="col-md-4 in-contact">
										<span>First Name :</span>
										<input type="text" class="text" name="firstname" value="<?php echo($firstname);?>">
									</div>
								</div>

								<div class="clearfix"> </div>
								<div class="contact-bottom">
									<div class="col-md-4 in-contact">
										<span>Last Name :</span>
										<input type="text" class="text" name="lastname" value="<?php echo($lastname);?>">
									</div>
								</div>
								<div class="clearfix"> </div>

								<div class="contact-bottom">
									<div class="col-md-4 in-contact">
										<span>Email ID :</span>
										<input type="text" class="text" name="emailid" value="<?php echo($uemailid);?>">
									</div>
								</div>
								<div class="clearfix"> </div>
								<input type="submit" value="Update">
						<?php   } } else {
							$error = "Unable to fetch";
							}?>
							</form>
						</div>
						<br><br><br><br><br><br>
				</div>
			</div>
<!--//content-->
<!--footer-->
<div class="footer">
	<div class="container">
		<h2><a href="index.html">Music Club</a></h2>
		
					<ul>
						<li ><a href="index.html" >Home  </a> </li>
						<li ><a href="album.html" >Albums  </a> </li>
						<li><a href="blog.html"  >Blog</a></li>
						<li><a href="typo.html" >Events </a></li>
						<li><a href="mail.html" >Mail </a></li>
						<div class="clearfix"> </div>
					</ul>
					
	</div>
</div>
<!--//footer-->
</body>
</html>

<?php

$query->close();
$connection -> close(); // Closing Connection
}
?>