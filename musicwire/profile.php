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

$query = $connection -> prepare("SELECT username,uemailid,lastname FROM users WHERE uid=?");
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
	</div>
</div>
<!--//header-->
<!--content-->
	<div class="blog">
		<div class="container">
				<div class="col-md-9">
					<div class="blog-grid">
					<div class="lone-line">
						<h4>Hi, <?php echo $user_name ?> !!!</h4>
					
					<div class="comment-top">
				<div class="story">
					<h4 ></h4>
				</div>
				<!---->
				<div class="comments-top-top">
					<div class="top-comment-left">
					</div>
						<?php 
							if ($rows >= 1) {
 							$query->bind_result($username,$uemailid,$lastname);
							while ($query->fetch()) { ?>
					<div class="top-comment-right">
						<div class="right-comment">
							<div class="clearfix"> </div>
							<p><table cellpadding="5" cellspacing="5">
							<tr><td width="30%">Username:</td><td width="70%"> <?php echo $username; ?></td> </tr>
							<tr><td width="30%">Name: </td><td><?php echo $user_name .' ' . $lastname;  ?></td> </tr>
							<tr><td width="30%">Email Id:</td><td> <?php echo $uemailid; ?></td> </tr>
							<tr><td width="30%"><a href="updateprofile.php">Update Details</a></td>
							<tr><td width="30%"><a href="changepwd.php">Change Password</a></td>
						</table></p>
						</div>						
					</div>
							<div class="clearfix"> </div>
						<?php   } } else {
							$error = "Unable to fetch";
							}?>
					<div class="top-comment-right">
						<div class="right-comment">
							<br/> 
							<p><table cellpadding="5" cellspacing="5">
								<th><b> ARTISTS I LIKE </b><br><br></th>
							<?php 
						$query = $connection -> prepare("SELECT distinct aid, aname FROM artist natural join likes WHERE uid=?");
						$query->bind_param('s', $user_id);
						$query->execute();
						$query->store_result();
						$rows = $query->num_rows;
						if ($rows >= 1) {
 							$query->bind_result($aid,$aname);
							while ($query->fetch()) {
					?>
							<tr><td> <a href="artistinfo.php?id=<?php echo $aid; ?>">  <?php echo $aname; ?> </a> </td></tr>
							<div class="clearfix"> </div>
						<?php   } } else {
								$error = "Unable to fetch";
								}?>
								</table><br></p>	


						</div>						
					</div>
					

							<div class="clearfix"> </div>


						<div class="top-comment-right">
						<div class="right-comment">
							<br> <p><table cellpadding="5" cellspacing="5">
								<th><b> USERS I FOLLOW </b><br><br></th>
							<?php 
						$query = $connection -> prepare("SELECT distinct uid, firstName, lastName FROM users join follows on uid2=uid WHERE uid1=?");
						$query->bind_param('s', $user_id);
						$query->execute();
						$query->store_result();
						$rows = $query->num_rows;
						if ($rows >= 1) {
 							$query->bind_result($uid,$fname,$lname);
							while ($query->fetch()) {
					?>
							<tr><td><a href="userinfo.php?id=<?php echo $uid; ?>"> <?php echo $fname . ' ' . $lname; ?> </a></td></tr>

							<div class="clearfix"> </div>
						<?php   } } else {
							$error = "Unable to fetch";
							}?>
							</table><br><u><a href="findfriends.php">Find more Friends</a></u></p>

						</div>						
					</div>
					
							<div class="clearfix"> </div>	
				</div>
				
				</div>
			<!---->
			</div>
			
			
					</div>
					</div>
				</div>
				
			<div class="clearfix"> </div>
			
		</div>
	</div>

<!--//content-->
<!--footer-->
<div class="footer">
	<div class="container">
		<h2><a href="index.html">Music Wire</a></h2>
		
					<ul>
						<li ><a href="welcome.php" >Home  </a> </li>
						<li ><a href="profile.php" >My Profile  </a> </li>
						<li><a href="browse.php"  >Browse</a></li>
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