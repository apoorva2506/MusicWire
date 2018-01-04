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
$aid=$_GET['id'];
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

$query = $connection -> prepare("SELECT aname,adesc FROM artist WHERE aid=?");
$query->bind_param('s', $aid);
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
function like() {
   location.href ="like.php?id=<?php echo $aid; ?>"; 
                return false; 
}


function unlike() {
	location.href ="unlike.php?id=<?php echo $aid; ?>"; 
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
						<h4>Artist Details</h4>
					
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
 							$query->bind_result($aname,$adesc);
							while ($query->fetch()) { ?>
					<div class="top-comment-right">
						<div class="right-comment">
							<h5> <?php echo $aname; ?></h5>
							<center>
								<?php 
									$query2 = $connection -> prepare("SELECT * FROM likes WHERE aid=? and uid=?");
									$query2->bind_param('si', $aid, $uid);
									$query2->execute();
									$query2->store_result();
									$rows2 = $query2->num_rows; if ($rows2 >= 1) {
										 ?>
									<button type="button" class="btn btn-sm btn-success" onclick="unlike()"> Liked </button>
									<?php } else { ?>
									<button type="button" class="btn btn-sm btn-primary" onclick="like()"> Like </button>
									<?php } ?>
							</center>
							<div class="clearfix"> </div>
							<p><table cellpadding="5" cellspacing="5">
							<tr><td width="30%">Description:</td><td width="70%"> <?php echo $adesc; ?></td> </tr>
						</table></p>
						</div>						
					</div>
						<?php   } } else {
							$error = "Unable to fetch";
							}  ?>
					<div class="top-comment-right">
						<div class="right-comment">
							<br/> <p><b> LIST OF ALBUMS </b><br><br>
					<?php 
						$query1 = $connection -> prepare("SELECT distinct albumid, albumTitle FROM artist natural join track natural join album WHERE aid=?");
						$query1->bind_param('s', $aid);
						$query1->execute();
						$query1->store_result();
						$rows1 = $query1->num_rows;
						if ($rows1 >= 1) {
 							$query1->bind_result($albumid,$albumTitle);
							while ($query1->fetch()) {
					?>

							<b><a href="albuminfo.php?id=<?php echo $albumid; ?>"> <?php echo $albumTitle; ?> </a> </b> <br>
						<?php   } } else {
							$error = "Unable to fetch";
							}?> </p> 
						</div>						
					</div>

						<div class="top-comment-right">
						<div class="right-comment">
							<br/> <b> RELATED ARTISTS </b><br><br>

					<?php 
						$query1 = $connection -> prepare("SELECT distinct aid,aname FROM artist WHERE adesc REGEXP ? and aid!=? limit 10");
						$adesc1 = str_replace(' ', '|', $adesc);
						$adesc1 = "%" . $adesc1 . "%";
						$query1->bind_param('ss', $adesc1, $aid);
						$query1->execute();
						$query1->store_result();
						$rows1 = $query1->num_rows;
						if ($rows1 >= 1) {
 							$query1->bind_result($aid1,$aname1);
							while ($query1->fetch()) {
					?>

					
							<b><a href="artistinfo.php?id=<?php echo $aid1; ?>"> <?php echo $aname1; ?> </a> </b>  <br>
						<?php   } } else {
							$error = "Unable to fetch";
							}?>
							</p><br><br>
						</div>						
					</div>
				</div>
				
				</div><br><br>
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
$query1->close();
$query2->close();
$connection -> close(); // Closing Connection
}
?>