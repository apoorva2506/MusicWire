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
$tid=$_GET['id'];
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

$query = $connection -> prepare("SELECT pId,ptitle FROM playlist WHERE uid=?");
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
<script>
function add(pid) {
  
	location.href = "addtrack.php?tid=<?php echo $tid?>&pid="+pid;
                return false; 

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
			<!---->
	</div>
</div>
<!--//header-->
<!--content-->
			<div class="contact">
				<div class="container">
					<div class="contact-top ">
						<h3>Add to Playlist</h3>
					</div>		
		
					<div class="contact-grids">
						<div class="contact-form">
							<form action="createplaylist.php" method="post">
								<div class="contact-bottom">
									<div class="col-md-4 in-contact">
										<span>Select Playlist:</span><br>
										<p><table cellpadding=5cellspacing=5>
										<?php
												if ($rows >= 1) {
					 							$query->bind_result($pid,$ptitle);
												while ($query->fetch()) { ?>
												<tr><td><?php echo $ptitle; ?></td>
												<td><button type="button" class="btn btn-sm btn-info" onclick="add(<?php echo $pid;?>)"> Add </button></td>
												<?php } } else {
												$error = "Unable to fetch";
												}
												?></tr></table></p>
									</div>
								</div>
						<br><br><br><br>
								<div class="clearfix"> </div>
								<div class="contact-bottom">
									<div class="col-md-4 in-contact">
									<br><br><span><h2>Create New Playlist</h2></span><br>
										<span>Playlist Name :</span>
										<input type="text" class="text" name="pname" value="">
									</div>
								</div>
								<div class="clearfix"> </div>

								<div class="contact-bottom">
									<div class="col-md-4 in-contact">
						<br>
										<span><input type="radio" id="label" name="label" value="private"> Private</span>
										<span><input type="radio" id="label" name="label" value="public"> Public</span>
									</div>
								</div>
								<div class="clearfix"> </div>
								<input type="submit" value="Create">
										<input type="hidden" class="text" name="tid" value="<?php echo($tid)?>">
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