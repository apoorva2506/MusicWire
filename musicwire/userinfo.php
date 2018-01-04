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
$user_id=$_GET['id'];
$user_id1=$_SESSION['login_id'];
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

$query = $connection -> prepare("SELECT username,uemailid,firstname, lastname FROM users WHERE uid=?");
$query->bind_param('s', $user_id);
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
<script>
function follow() {
   location.href ="follow.php?id=<?php echo $user_id; ?>"; 
                return false; 
}


function unfollow() {
	location.href ="unfollow.php?id=<?php echo $user_id; ?>"; 
}

</script>
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
						<h4></h4>
					
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
 							$query->bind_result($username,$uemailid,$firstname,$lastname);
							while ($query->fetch()) { ?>
					<div class="top-comment-right">
						<div class="right-comment">
							<h5> <?php echo $firstname .' ' . $lastname;  ?></h5>
							<center>
								<?php 
									$query2 = $connection -> prepare("SELECT * FROM follows WHERE uid1=? and uid2=?");
									$query2->bind_param('ii', $user_id1, $user_id);
									$query2->execute();
									$query2->store_result();
									$rows2 = $query2->num_rows; if ($rows2 >= 1) {
										 ?>
									<button type="button" class="btn btn-sm btn-success" onclick="unfollow()"> Following </button></center>
									<?php } else { ?>
									<button type="button" class="btn btn-sm btn-primary" onclick="follow()"> Follow </button></center>
									<?php } ?>

							<div class="clearfix"> </div>
							<p><table cellpadding="5" cellspacing="5">
							<tr><td width="30%">Username:</td><td width="70%"> <?php echo $username; ?></td> </tr>
							<tr><td width="30%">Email Id:</td><td> <?php echo $uemailid; ?></td> </tr>
						</table></p>
						</div>						
					</div>
							<div class="clearfix"> </div>
						<?php   } } else {
							$error = "Unable to fetch";
							}?>


						<div class="top-comment-right">
						<div class="right-comment">
							<br> <p><table cellpadding="5" cellspacing="5">
								<th><b> PLAYLISTS </b><br><br></th>
							<?php 
						$query = $connection -> prepare("SELECT distinct pid, ptitle FROM playlist WHERE uid=? and plabel='public'");
						$query->bind_param('i', $user_id);
						$query->execute();
						$query->store_result();
						$rows = $query->num_rows;
						if ($rows >= 1) {
 							$query->bind_result($pid,$ptitle);
							while ($query->fetch()) {
					?>
							<tr><td><a href="playlistinfo.php?id=<?php echo $pid; ?>"> <?php echo $ptitle ?> </a></td></tr>

							<div class="clearfix"> </div>
						<?php   } } else {
							$error = "Unable to fetch";
							}?>
							</table><br></p>

						</div>				
					</div>

					<div class="top-comment-right">
						<div class="right-comment">
							<br/> 
							<p><table cellpadding="5" cellspacing="5">
								<th><b> LIKED ARTISTS </b><br><br></th>
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

							<div class="clearfix"> </div>
						</div>
					</div>


						<div class="top-comment-right">
						<div class="right-comment">
							<br> <p><table cellpadding="5" cellspacing="5">
								<th><b> FOLLOWED USERS </b><br><br></th>
							<?php 
						$query = $connection -> prepare("SELECT distinct uid, firstName, lastName FROM users join follows on uid2=uid WHERE uid1=? and uid2!=?");
						$query->bind_param('ii', $user_id,$user_id);
						$query->execute();
						$query->store_result();
						$rows = $query->num_rows;
						if ($rows >= 1) {
 							$query->bind_result($uid1,$fname1,$lname1);
							while ($query->fetch()) {
					?>
							<tr><td><a href="userinfo.php?id=<?php echo $uid1; ?>"> <?php echo $fname1 . ' ' . $lname1; ?> </a></td></tr>

							<div class="clearfix"> </div>
						<?php   } } else {
							$error = "Unable to fetch";
							}?>
							</table><br></p>

						</div>	</div>		

							<div class="clearfix"> </div>
				
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
