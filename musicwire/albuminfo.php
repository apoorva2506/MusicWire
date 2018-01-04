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
$albumid=$_GET['id'];
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

$query = $connection -> prepare("SELECT albumTitle,albumDate FROM album WHERE albumid=?");
$query->bind_param('s', $albumid);
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
				<div class="col-md-9">
					<div class="blog-grid">
					<div class="lone-line">
						<h4>Album Details</h4>
					
					<div class="comment-top">
				<div class="story">
					<h4 ></h4>
				</div>
				<!----><br>
				<div class="comments-top-top">
					<div class="top-comment-left">
					</div>
						<?php 
							if ($rows >= 1) {
 							$query->bind_result($albumTitle,$albumDate);
							while ($query->fetch()) { ?>
					<div class="top-comment-right">
						<div class="right-comment">
							<h5> <?php echo $albumTitle; ?></h5>
							<div class="clearfix"> </div>
							<br><table cellpadding="5" cellspacing="5"><tr><td width="45%">Release Date: </td><td><?php echo $albumDate;?></td></tr></table>
						</div>						
					</div>
						<?php   } } else {
							$error = "Unable to fetch";
							}?>
					<div class="top-comment-right">
						<div class="right-comment">
							<br><p><table cellpadding="5" cellspacing="5">
								<th> <b> LIST OF TRACKS </b><br><br></th>
							<?php 
								$query = $connection -> prepare("SELECT tid, ttitle,aname, aid FROM artist natural join track natural join album WHERE albumid=? order by tracknumber");
								$query->bind_param('s', $albumid);
								$query->execute();
								$query->store_result();
								$rows = $query->num_rows;
								if ($rows >= 1) {
		 							$query->bind_result($tid,$ttitle, $aname, $aid);
									while ($query->fetch()) {
							?>
								<tr><td width="50%"><b><?php echo $ttitle; ?> </b>
								- <?php echo $aname; ?> </td>
							<td width="15%"><button type="button" class="btn btn-sm btn-info" onclick="play('<?php echo $tid;?>')"> Play </button> </td>
							<td width="35%"><button type="button" class="btn btn-sm btn-warning" onclick="add_playlist('<?php echo $tid;?>')">Add to a Playlist</button></td></tr>
						<?php   } } else {
							$error = "Unable to fetch";
							}?>
						</table> </p>
						</div>						
					</div>
							<div class="clearfix"> </div>

				<div class="top-comment-right">
						<div class="right-comment">
							<br/> <p><table cellpadding="5" cellspacing="5">
								<th><b> RELATED ALBUMS </b><br><br></th>
					<?php 
						$query1 = $connection -> prepare("SELECT distinct albumid,albumtitle FROM track natural join album WHERE aid in (select distinct aid from track where albumid=?) and albumid!=? limit 10");
						$query1->bind_param('ss', $albumid, $albumid);
						$query1->execute();
						$query1->store_result();
						$rows1 = $query1->num_rows;
						if ($rows1 >= 1) {
 							$query1->bind_result($albumid1,$albumtitle1);
							while ($query1->fetch()) {
					?>

						 <tr width="50%"><td><b><a href="albuminfo.php?id=<?php echo $albumid1; ?>"> <?php echo $albumtitle1; ?> </a> </b> </td></tr>	
						<?php   } } else {
							$error = "Unable to fetch";
							}?>
						</table></p>
				</div>
			</div>
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
$query1->close();
$connection -> close(); // Closing Connection
}
?>