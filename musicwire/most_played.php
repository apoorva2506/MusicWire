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


$query = $connection -> prepare("SELECT distinct tid,ttitle,aname from ((select trackid, count(*) cnt from plays group by trackid order by cnt desc limit 10) a join track on a.trackid=track.tid) natural join artist");
//$query->bind_param('s', $_SESSION['login_id']);
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
function play(track) {
	//alert(track);
   location.href ="play.php?id="+track; 
                return false; 
}
function add_playlist(track) {
	//alert(track);
   location.href ="add_playlist.php?id="+track; 
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
	</div>
</div>
<!--//header-->
<!--content-->
	<div class="blog">
		<div class="container">
					<div class="blog-grid">
					<img class="img-responsive" src="images/newimg.jpeg" alt="" />
					<div class="lone-line">
						<h4>Most Played Tracks</h4>
					
					<div class="comment-top">
				<div class="story">
					<h4 ></h4>
				</div>
				<!----><br>
				<div class="comments-top-top">
					<div class="top-comment-left">
					</div>
					<div class="top-comment-right">
						<div class="right-comment">
							<div class="clearfix"> </div>
							<table>
								<?php 
							if ($rows >= 1) {
 							$query->bind_result($tid, $title, $artist);
							while ($query->fetch()) { ?>

							 <tr><td width="70%"> <h5><?php echo $title; ?> 
								 -  <?php echo $artist; ?>
								</h5></td>
							<td width="10%"><button type="button" class="btn btn-sm btn-info" onclick="play('<?php echo $tid;?>')"> Play </button></td>
						<td width="20%"><button type="button" class="btn btn-sm btn-warning" onclick="add_playlist('<?php echo $tid;?>')">Add to a Playlist</button></td></tr>
						<?php   }} else {
							$error = "Unable to fetch";
							} ?></table>
							<div class="clearfix"> </div>
						</div>
					</div>
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